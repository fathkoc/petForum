<li>
  @if ($topic->user && $topic->user->image_path)
    <img src="{{ asset('storage/' . $topic->user->image_path) }}"
         alt="avatar" width="55" height="55"
         style="object-fit:cover;border-radius:50%;">
  @else
    <img src="{{ asset('storage/default/avatar.png') }}"
         alt="default avatar" width="55" height="55"
         style="object-fit:cover;border-radius:50%;">
  @endif

  @php
    // Sayıları güvenli şekilde hazırla (withCount varsa onu kullan, yoksa fallback)
    $commentsCount = $topic->replies_count
      ?? $topic->comments_count
      ?? ($topic->relationLoaded('comments')
          ? $topic->comments->where('deleted', 0)->count()
          : $topic->comments()->where('deleted', 0)->count());

    $likesCount = $topic->pati_count
      ?? $topic->likes_count
      ?? ($topic->relationLoaded('likes')
          ? $topic->likes->count()
          : $topic->likes()->count());
  @endphp

  <div class="soru-cevap-content">
    <span class="user">
      {{ $topic->user->name ?? 'Anonim' }} {{ $topic->user->lastname ?? '' }}
    </span>
    <span class="time">{{ \Carbon\Carbon::parse($topic->created_at)->format('d.m.Y H:i') }}</span>

    <div class="question d-flex flex-wrap align-items-center gap-2">
      <a href="{{ route('topic.detail', $topic->id) }}">
        {{ \Illuminate\Support\Str::limit($topic->title, 70) }}
      </a>

      <!-- Yorum sayısı -->
      <span class="badge rounded-pill bg-light border text-muted" title="Yorum">
        <i class="fa-regular fa-comments me-1"></i>{{ $commentsCount }}
      </span>
      <!-- Beğeni / Pati sayısı -->
      <span class="badge rounded-pill bg-light border text-muted" title="Beğeni">
        <i class="fa-solid fa-paw me-1"></i>{{ $likesCount }}
      </span>
    </div>

    <div class="homepage-section-question-answer-icon-alert">
      <div class="homepage-section-question-answer-icon-questionnaire">
        {{-- extra istatistikler buraya gelebilir --}}
      </div>
      <div class="homepage-section-question-answer-icon-camera">
        {{-- fotoğraf ikonu vb. --}}
      </div>
    </div>
  </div>
</li>
