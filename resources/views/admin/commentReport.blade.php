@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📋 Gelen Şikayetler</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @if($reports->count())
        <div class="table-responsive">
           <table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Konu</th>
            <th>Şikayet Eden</th>
            <th>Yorum Yazan</th>
            <th>Yorum</th>
            <th>Tarih</th>
             <th>İşlem</th>  
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>

                <td>
                    <a href="{{ route('topic.detail', $report->comment->topic->id) }}" target="_blank">
                        {{ Str::limit($report->comment->topic->title, 50) }}
                    </a>
                </td>

                {{-- Şikayet eden kullanıcı --}}
                <td>{{ $report->user?->name ?? 'Anonim' }}</td>

                {{-- Yorumu yazan kişi --}}
                <td>{{ $report->comment->user?->name ?? 'Anonim' }}</td>

                {{-- Yorum içeriği --}}
                <td>{{ Str::limit($report->comment->content, 80) }}</td>

                <td>{{ $report->created_at->timezone('Europe/Istanbul')->format('d.m.Y H:i') }}</td>

                <td class="text-nowrap">
                    @if((int)$report->deleted === 1)
                        <span class="badge bg-secondary">Silinmiş</span>
                    @else
                        <form method="POST"
                              action="{{ route('comment.delete', $report->comment_id) }}"
                              class="d-inline"
                              onsubmit="return confirm('Bu yorumu silmek istediğinize emin misiniz?');">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                Sil
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        </div>

        {{-- sayfalama --}}
        <div class="mt-3">
            {{ $reports->links() }}
        </div>
    @else
        <div class="alert alert-info">Hiç şikayet bulunamadı.</div>
    @endif
</div>
@endsection
