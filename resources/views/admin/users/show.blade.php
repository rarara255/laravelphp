@extends('layouts.app')

@section('content')
    <style>
        .admin-container { padding: 30px; font-family: "Droid Sans Mono Dotted"; }
        .info-card { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; padding: 20px; margin-bottom: 30px; }
        .history-item { border: 1px solid #eee; border-radius: 6px; padding: 12px; margin-bottom: 15px; }
        .comment-list { margin-top: 8px; padding-left: 20px; border-left: 3px solid #ddd; }
        .comment-list p { margin: 4px 0; font-size: 13px; color: #555; }
    </style>

    <div class="admin-container">
        <h1>Профиль пользователя</h1>

        <div class="info-card">
            <h2>{{ $user->name }}</h2>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Роль:</strong> {{ $user->role }}</p>
            <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
        </div>

        <h3>История заявок</h3>
        @forelse($user->requests as $request)
            <div class="history-item">
                <div style="display:flex; justify-content: space-between;">
                    <div>
                        <strong>Заявка #{{ $request->id }}</strong>
                        <small>({{ $request->created_at->format('d.m.Y H:i') }})</small>
                    </div>
                    <div>
                        @if($request->status === 'pending')
                            <span style="color:orange;">Ожидает</span>
                        @elseif($request->status === 'approved')
                            <span style="color:green;">Одобрена</span>
                        @else
                            <span style="color:red;">Отклонена</span>
                        @endif
                    </div>
                </div>
                <p><strong>Запрашиваемая роль:</strong> {{ $request->requested_role }}</p>
                @if($request->reason)
                    <p><strong>Причина:</strong> {{ $request->reason }}</p>
                @endif

                @if($request->comments->count())
                    <div class="comment-list">
                        <strong>Комментарии:</strong>
                        @foreach($request->comments as $comment)
                            <p>
                                <em>{{ $comment->user->name }}</em> ({{ $comment->created_at->format('d.m.Y H:i') }}):
                                {{ $comment->comment }}
                            </p>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <p>У пользователя пока нет заявок на смену роли.</p>
        @endforelse
    </div>
@endsection
