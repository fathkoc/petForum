<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\User;
use App\Models\TopicImage;
use App\Models\TopicLike;
use App\Models\TopicReport;
use App\Models\CommentLike;
use App\Models\CommentReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
   public function index(Request $request)
    {
        $adoptionCatId = env('CATEGORY_SAHIPLENDIRME_ID', 1);

        $q = trim($request->get('q', ''));
        $categoryFilter = $request->get('category', 'all');

        // Sahiplendirme sayacı (ayrı bölüm için)
        $count = Topic::where('category_id', $adoptionCatId)
                    ->where('deleted', 0)
                    ->count();

        // Ana liste (sahiplendirme hariç)
        $topics = Topic::with(['user','category'])
            ->where('deleted', 0)
            ->where('category_id', '!=', $adoptionCatId)
            ->when($q, fn($query) => $query->where('title', 'like', "%{$q}%"))
            ->when($categoryFilter !== 'all' && !empty($categoryFilter),
                fn($query) => $query->where('category_id', $categoryFilter)
            )
            ->orderByDesc('id')
            ->paginate(5)
            ->onEachSide(2)
            ->withQueryString(); // <— filtreler sayfalarda korunur

        // Filtre dropdown için kategoriler (sahiplendirme hariç)
        $categories = Category::where('id', '!=', $adoptionCatId)
                            ->orderBy('name')
                            ->get();

        // Sahiplendirme kutucuğu (üstte gösteriyorsun)
        $sahiplendirmeTopics = Topic::with(['user','images'])
            ->where('category_id', $adoptionCatId)
            ->where('deleted', 0)
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('index', compact(
            'count', 'topics', 'sahiplendirmeTopics', 'categories', 'categoryFilter', 'q'
        ));
    }

   public function storeTopic(Request $request)
{
    $rules = [
        'category'  => 'required',
        'title'     => 'required|string|max:255',
        'content'   => 'required|string',
        'images'    => 'nullable|array',
        'images.*'  => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ];

    $messages = [
        'required'          => ':attribute alanı zorunludur.',
        'string'            => ':attribute metin olmalıdır.',
        'max.string'        => ':attribute en fazla :max karakter olabilir.',
        'image'             => ':attribute geçerli bir görsel olmalıdır.',
        'mimes'             => ':attribute yalnızca şu türlerde olmalıdır: :values.',
        'images.array'      => 'Görseller alanı bir liste olmalıdır.',
        'images.*.max'      => 'Her bir görsel en fazla :max KB (yaklaşık 2MB) olmalıdır.',
        'uploaded'          => ':attribute yüklenemedi. Dosya boyutu sunucu limitini aşıyor olabilir.',
        'images.*.uploaded' => 'Görsellerden biri yüklenemedi. Dosya ≈2MB sınırını aşıyor olabilir.',
    ];

    $attributes = [
        'category'  => 'Kategori',
        'title'     => 'Başlık',
        'content'   => 'İçerik',
        'images'    => 'Görseller',
        'images.*'  => 'Görsel',
        'phone'     => 'Telefon',
        'city'      => 'Şehir',
        'district'  => 'İlçe',
        'gender'    => 'Cinsiyet',
        'genus'     => 'Tür',
        'age'       => 'Yaş',
        'type'      => 'Tip',
        'animal'    => 'Hayvan',
    ];

    $validated = $request->validate($rules, $messages, $attributes);

    $topic = new Topic();
    $topic->category_id = $validated['category'];
    $topic->user_id = Auth::id();
    $topic->title = $validated['title'];
    $topic->content = $validated['content'];
    $topic->deleted = 0;

    $topic->phone = $request->input('phone');
    $topic->city = $request->input('city');
    $topic->gender = $request->input('gender');
    $topic->district = $request->input('district');
    $topic->genus = $request->input('genus');
    $topic->age = $request->input('age');
    $topic->type = $request->input('type');
    $topic->animal = $request->input('animal');
    $topic->save();

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('topics', 'public');
            TopicImage::create([
                'topic_id'   => $topic->id,
                'image_path' => $path,
                'deleted'    => 0,
            ]);
        }
    }

    return redirect()->route('topic.create', $topic->id)
        ->with('success', 'Sorunuz başarıyla eklendi!');
}

    public function showTopic()
    {

    $categorys = Category::where('deleted', 0)
                ->get();

    $iller = json_decode(file_get_contents(storage_path('app/data/iller.json')), true);
$ilceler = json_decode(file_get_contents(storage_path('app/data/ilceler.json')), true);


        return view('sor', compact('categorys', 'iller', 'ilceler'));    
    }

   public function showTopicDetail($id)
    {
        // Ana topic
        $topic = Topic::with(['user', 'images', 'comments.user'])
                    ->where('deleted', 0)
                    ->where('id', $id)
                    ->firstOrFail(); 

        // Benzer konular
        $similarTopics = Topic::where('deleted', 0)
                            ->where('id', '!=', $id)        // bu topic hariç
                            ->where('category_id', '!=', 1) // category_id 1 olmasın
                            ->inRandomOrder()               // random sırala
                            ->take(5)                       // 5 adet al
                            ->get();
        
        return view('soru-detay', compact('topic', 'similarTopics'));
    }



    public function storeComment(Request $request, $id)
{
    $topic = Topic::where('deleted', 0)->findOrFail($id);

    $validated = $request->validate([
        'content'   => 'required|string|max:2000',
        'images.*'  => 'nullable|image|max:4096',
    ]);

    // Güvenlik: misafir ise engelle (route zaten auth ise gerekmez)
    if (!Auth::check()) {
        return redirect()->route('login')->with('warning', 'Yorum yapmak için giriş yapın.');
    }

    DB::transaction(function () use ($request, $topic, $validated) {
        $comment = Comment::create([
            'topic_id' => $topic->id,
            'user_id'  => Auth::id(),
            'content'  => $validated['content'],
            'deleted'  => 0,
        ]);

        if ($request->hasFile('images')) {
            $first = $request->file('images')[0];
            $path  = $first->store('answers', 'public');
            $comment->image_path = $path;
            $comment->save();
        }

        // --- PUAN & RÜTBE ---
        /** Kaç puan? İstersen config/points.php dosyasına al:
         *   return ['comment' => 5];
         * ve $increment = config('points.comment', 5);
         */
        $increment = 5;

        $user = Auth::user();
        // Atomik arttırma:
        $user->increment('points', $increment);
        $user->refresh();                // güncel points’i al
        $user->updateUserRank();         // min_points’e göre rank_id güncelle
    });

    return back()->with('success', 'Cevabın başarıyla eklendi!');
}

    public function toggle($id)
    {
        $topic = Topic::where('deleted',0)->findOrFail($id);
        $userId = Auth::id();

        $existing = TopicLike::where('topic_id',$topic->id)
                             ->where('user_id',$userId)
                             ->first();

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            TopicLike::create(['topic_id'=>$topic->id,'user_id'=>$userId]);
            $liked = true;
        }

        $count = $topic->likes()->count();

        return response()->json([
            'liked' => $liked,
            'likes_count' => $count,
            'message' => $liked ? 'Beğenildi' : 'Beğeni kaldırıldı',
        ]);
    }

    public function storeReport(Request $request, $id)
    {
        $request->validate([
            'reason' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:2000',
        ]);

        $topic = Topic::where('deleted',0)->findOrFail($id);

        TopicReport::create([
            'topic_id' => $topic->id,
            'user_id'  => Auth::id(), 
            'reason'   => $request->reason,
            'description' => $request->description,
            'status'   => 'open',
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Şikayetiniz alındı. Teşekkürler.',
        ]);
    }

        public function me()
    {
        $user = Auth::user()->loadMissing('rank'); 
        
        return view('profile', compact('user'));
    }

      public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png,webp,gif',
                'max:4096',                 // 4 MB
                'dimensions:min_width=100,min_height=100',
            ],
        ], [
            'avatar.required' => 'Lütfen bir resim seçin.',
            'avatar.image' => 'Dosya bir görsel olmalıdır.',
            'avatar.mimes' => 'Sadece JPG, PNG, WEBP veya GIF yükleyebilirsiniz.',
            'avatar.max' => 'Görsel boyutu en fazla 4MB olmalıdır.',
            'avatar.dimensions' => 'Görsel minimum 100x100 piksel olmalıdır.',
        ]);

        $user = Auth::user();

        // Eski resmi sil (varsa ve public diskte duruyorsa)
        if ($user->image_path && Storage::disk('public')->exists($user->image_path)) {
            Storage::disk('public')->delete($user->image_path);
        }

        // Yeni resmi kaydet
        $path = $request->file('avatar')->store('avatars', 'public');

        // Kullanıcıya yaz
        $user->image_path = $path;
        $user->save();

        return back()->with('success', 'Profil fotoğrafın güncellendi.');
    }

    public function myTopic()
    {
        $query = Topic::query()
            ->where('user_id', Auth::id())
             ->where('deleted', 0)
            ->with(['category']) 
            ->withCount([
                'comments as replies_count' => fn($q) => $q->where('deleted', 0),
                'likes as pati_count',
            ])
            ->latest();

        if ($q = trim(request('q', ''))) {
            $query->where('title', 'like', "%{$q}%");
        }

        $topics = $query->paginate(5)->withQueryString();

        return view('profileTopic', compact('topics'));
    }


    public function softDelete(\App\Models\Topic $topic)
        {
            if ($topic->user_id !== \Illuminate\Support\Facades\Auth::id()) {
                abort(403);
            }

            $topic->update(['deleted' => 1]);

            return back()->with('success', 'Konu başarıyla silindi.');
        }

        
     public function adaption(Request $request)
    {
        $adoptionCatId = env('CATEGORY_SAHIPLENDIRME_ID', 1);

        $q     = trim($request->get('q', ''));
        $order = $request->get('order', 'new'); // new, old, replies, likes

        // Üstte göstereceğin toplam ilan sayısı (opsiyonel)
        $count = Topic::where('category_id', $adoptionCatId)
                    ->where('deleted', 0)
                    ->count();

        // SADECE sahiplendirme kategorisi
        $topics = Topic::with(['user','images'])
            ->withCount([
                'comments as replies_count' => fn($q2) => $q2->where('deleted', 0),
                'likes as pati_count',
            ])
            ->where('deleted', 0)
            ->where('category_id', $adoptionCatId)
            ->when($q !== '', fn($query) =>
                $query->where('title', 'like', "%{$q}%")
            );

        // Sıralama
        $order = in_array($order, ['new','old','replies','likes'], true) ? $order : 'new';
        switch ($order) {
            case 'old':
                $topics->orderBy('created_at', 'asc');
                break;
            case 'replies':
                $topics->orderByDesc('replies_count')->orderByDesc('id');
                break;
            case 'likes':
                $topics->orderByDesc('pati_count')->orderByDesc('id');
                break;
            default: // 'new'
                $topics->orderByDesc('created_at');
                break;
        }

        $topics = $topics->paginate(12)->onEachSide(1)->withQueryString();


        return view('adoption', compact('count','topics','q','order'));
    }

    public function toggleLikeComment(Request $request, Comment $comment)
    {
        $userId = $request->user()->id;
        
        $like = CommentLike::where('comment_id', $comment->id)
                        ->where('user_id', $userId)
                        ->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false, 'likes_count' => $comment->likes()->count()]);
        }

        CommentLike::create([
            'comment_id' => $comment->id,
            'user_id'    => $userId,
        ]);

            return redirect()->back();

    }

    public function reportComment(Request $request, Comment $comment)
    {
            CommentReport::updateOrCreate(
        [
            'comment_id' => $comment->id,
            'user_id'    => $request->user()->id,
        ]
    );


        return back()->with('success', 'Şikayetiniz alındı. Teşekkürler.');
    }

     public function updateUser(Request $request, $id)
    {
        
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'lastName'  => 'nullable|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'is_admin'  => 'required|boolean',
            'rank_id'   => 'nullable|exists:ranks,id',
            'points'    => 'nullable|integer|min:0',
        ]);

       
        $user->update($validated);

         return back()->with('success', 'Güncelleme Başarılı.');
    }


    public function updateTopic(Request $request, Topic $topic)
    {
       
        if (Auth::id() !== $topic->user_id && !optional(Auth::user())->is_admin) {
            abort(403, 'Bu konuyu güncelleme yetkiniz yok.');
        }
        
        $rules = [
            'category'        => ['required','integer','exists:categories,id'],
            'title'           => ['required','string','max:255'],
            'content'         => ['required','string'],
            'images'          => ['nullable','array'],
            'images.*'        => ['image','mimes:jpeg,png,jpg,gif','max:2048'], 
            'remove_images'   => ['nullable','array'],
            'remove_images.*' => ['integer','exists:topic_images,id'],
        ];

        $messages = [
            'required'            => ':attribute alanı zorunludur.',
            'string'              => ':attribute metin olmalıdır.',
            'max.string'          => ':attribute en fazla :max karakter olabilir.',
            'image'               => ':attribute geçerli bir görsel olmalıdır.',
            'mimes'               => ':attribute yalnızca şu türlerde olmalıdır: :values.',
            'images.array'        => 'Görseller alanı bir liste olmalıdır.',
            'images.*.max'        => 'Her bir görsel en fazla :max KB (yaklaşık 2MB) olmalıdır.',
            'exists'              => 'Seçilen :attribute geçerli değil.',
            'remove_images.*.exists' => 'Kaldırılacak görsellerden biri bulunamadı.',
            // PHP limitine takıldığında:
            'uploaded'            => ':attribute yüklenemedi. Dosya boyutu sunucu limitini aşıyor olabilir.',
            'images.*.uploaded'   => 'Görsellerden biri yüklenemedi. Sunucu limitini aşıyor olabilir.',
        ];

        $attributes = [
            'category'      => 'Kategori',
            'title'         => 'Başlık',
            'content'       => 'İçerik',
            'images'        => 'Görseller',
            'images.*'      => 'Görsel',
            'remove_images' => 'Kaldırılacak görseller',
            'remove_images.*' => 'Kaldırılacak görsel',
        ];

        $data = $request->validate($rules, $messages, $attributes);

        // Atomic işlem
        DB::transaction(function () use ($request, $topic, $data) {

            // Konu güncelle
            $topic->category_id = $data['category'];
            $topic->title       = $data['title'];
            $topic->content     = $data['content'];
            $topic->phone       = $request->input('phone');
            $topic->city        = $request->input('city');
            $topic->gender      = $request->input('gender');
            $topic->district    = $request->input('district');
            $topic->genus       = $request->input('genus');
            $topic->age         = $request->input('age');
            $topic->type        = $request->input('type');
            $topic->animal      = $request->input('animal');
            $topic->save();

            // Seçilen mevcut görselleri kaldır (checkbox name="remove_images[]")
            if (!empty($data['remove_images'])) {
                // Bu topic'e ait olanları sil
                $images = TopicImage::where('topic_id', $topic->id)
                            ->whereIn('id', $data['remove_images'])
                            ->get();

                foreach ($images as $img) {
                    if ($img->image_path && Storage::disk('public')->exists($img->image_path)) {
                        Storage::disk('public')->delete($img->image_path); 
                    }
                $img->deleted = 1; $img->save();
                }
            }

            // Yeni görselleri ekle
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if (!$image->isValid()) { continue; } 
                    $path = $image->store('topics', 'public');
                    TopicImage::create([
                        'topic_id'   => $topic->id,
                        'image_path' => $path,
                        'deleted'    => 0,
                    ]);
                }
            }
        });

        return redirect()
            ->route('topic.edit', $topic)
            ->with('success', 'Konu başarıyla güncellendi!');
    }

    public function updateComment(Request $request, $topicId, $commentId)
    {
        $topic = Topic::where('deleted', 0)->findOrFail($topicId);
        $comment = Comment::where('deleted', 0)
                        ->where('topic_id', $topic->id)
                        ->findOrFail($commentId);

    
        if (Auth::id() !== $comment->user_id && !optional(Auth::user())->is_admin) {
            abort(403, 'Bu yorumu güncelleme yetkiniz yok.');
        }

        // store ile benzer doğrulama
        $validated = $request->validate([
            'content'       => 'required|string|max:2000',
            'images.*'      => 'nullable|image|max:4096',
            'remove_image'  => 'nullable|boolean', // checkbox ile mevcut görseli kaldırmak için
        ]);

        // İçerik
        $comment->content = $validated['content'];

        // Mevcut görseli silme isteği geldiyse
        if ($request->boolean('remove_image') && $comment->image_path) {
            if (Storage::disk('public')->exists($comment->image_path)) {
                Storage::disk('public')->delete($comment->image_path);
            }
            $comment->image_path = null;
        }

        // Yeni görsel geldiyse (ilk dosyayı kullan)
        if ($request->hasFile('images')) {
            $first = $request->file('images')[0];

            // Eskiyi temizle
            if ($comment->image_path && Storage::disk('public')->exists($comment->image_path)) {
                Storage::disk('public')->delete($comment->image_path);
            }

            $path = $first->store('answers', 'public');
            $comment->image_path = $path;
        }

        $comment->save();

        return back()->with('success', 'Cevabın başarıyla güncellendi!');
    }

    public function editTopic(Topic $topic)
{
    $topic->load([
        'images' => fn ($q) => $q->where('deleted', 0)->orderBy('id'),
         'category', 
    ]);

    
    $categorys = Category::orderBy('name')->get(['id','name']);

    return view('editTopic', compact('topic','categorys'));
}

public function softDeleteComment(Request $request, Comment $comment)
    {
        // Yetki kontrolü: Yorumu sahibi veya admin silebilsin
        $user = $request->user();
        $isOwner = $comment->user_id === $user->id;
        $isAdmin = (bool) $user->is_admin;

        if (! $isOwner && ! $isAdmin) {
            return back()->with('error', 'Bu yorumu silme yetkiniz yok.');
        }

    
        if ((int) $comment->deleted === 1) {
            return back()->with('info', 'Yorum zaten silinmiş.');
        }

        $comment->update(['deleted' => 1]);

        return back()->with('success', 'Yorum silindi.');
    }




}
