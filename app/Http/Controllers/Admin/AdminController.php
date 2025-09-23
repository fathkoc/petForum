<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReport;

class AdminController extends Controller
{
    public function dashboard()
    {
    
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        
        if (!Auth::user()->is_admin) {
            abort(403, 'Bu alana erişim izniniz yok.');
        }

        return view('admin.dashboard');
    }

    public function getUsers(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (!Auth::user()->is_admin) {
            abort(403, 'Bu alana erişim izniniz yok.');
        }

        $query = User::with('rank')->where('deleted', 0); 

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%'.$request->email.'%');
        }

        $users = $query->paginate(15)->withQueryString();
        
        return view('admin.users', compact('users'));
    }


    public function getTopics(Request $request)
    {
        $query = Topic::query();
        
        $query->where('deleted', '=', 0);

        if ($request->filled('category')) {
        $query->where('category_id', $request->category); // category_id varsa
         
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'asc') {
                $query->orderBy('id', 'asc');
            } elseif ($sort === 'desc') {
                $query->orderBy('id', 'desc');
            } 
        } else {
            $query->orderBy('id', 'desc');
        }

        
        $topics = $query->paginate(10);
        $categories = Category::where('deleted', 0)->get();

        return view('admin.topic', compact('topics', 'categories'));
    }

    public function destroy($id)
    {
            $topic = Topic::findOrFail($id);
            
            $topic->update(['deleted' => 1]);

            return redirect()->route('admin.topics')
                            ->with('success', 'Kayıt başarıyla silindi.');
    }

    public function show($id)
    {
        $topic = Topic::with(['user', 'comments.user'])
            ->where('id', $id)
            ->where('deleted', 0)
            ->firstOrFail();

            
        return view('admin.topicShow', compact('topic'));
    }

      public function destroyComment($id)
    { 
        $comment = Comment::findOrFail($id);
        $comment->update(['deleted' => 1]);

        return back()->with('success', 'Yorum başarıyla silindi.');
    }

    public function showUser($id)
    {
        $user = User::with('rank')->findOrFail($id);

        return view('admin.userShow', compact('user'));
    }

  
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['deleted' => 1]);

        return redirect()->route('admin.users')
                         ->with('success', 'Kullanıcı başarıyla silindi.');
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

        return redirect()
            ->route('admin.users')
            ->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    public function report()
    {
        $reports = \App\Models\TopicReport::with(['topic', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10); 

        return view('admin.report', compact('reports'));
    }

    public function reportComment()
    {
        $reports = CommentReport::with([
        'comment.user',     // yorumu yazan
        'comment.topic',    // konu
        'user'              // şikayet eden
    ])
        ->whereHas('comment', fn($q) => $q->where('deleted', 0)) // <— sadece silinmemiş yorumlar
        ->latest()
        ->paginate(20);

        return view('admin.commentReport', compact('reports'));
    }

    public function softDeleteComment(Request $request, Comment $comment)
    {
        // yetki kontrolü istersen:
        // $this->authorize('delete', $comment);

        if ((int) $comment->deleted === 1) {
            return back()->with('info', 'Yorum zaten silinmiş.');
        }

        $comment->update(['deleted' => 1]);

        // (Opsiyonel) Raporları "çözüldü" işaretlemek istersen burada güncelleyebilirsin.
        // $comment->reports()->update(['status' => 'resolved', 'handled_by' => $request->user()->id]);

        return back()->with('success', 'Yorum silindi (soft delete).');
    }
}
