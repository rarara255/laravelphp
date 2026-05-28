@extends('layouts.app')

@section('content')
    <style>
        .admin-container { padding: 30px; font-family: "Droid Sans Mono Dotted"; }
        .data-table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; font-size: 14px; }
        .data-table th, .data-table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e0e0e0; vertical-align: middle; }
        .btn { padding: 6px 12px; cursor: pointer; border-radius: 10%; border: none; font-size: 14px; }
        .btn-view { background-color: cornflowerblue; color: ghostwhite; }
        .btn-approve { background: green; color: whitesmoke; }
        .btn-reject { background: darkred; color: white; }
        .comment-box { background: #f9f9f9; border: 1px solid #ddd; padding: 15px; margin-top: 20px; border-radius: 8px; }
        .comment-item { border-bottom: 1px dashed #ccc; padding: 8px 0; }
        .comment-item:last-child { border-bottom: none; }
    </style>

    <div class="admin-container">
        <h1>Заявка #{{ $roleRequest->id }}</h1>

        <table class="data-table">
            <tr>
                <th>Пользователь</th>
                <td>
                    <a href="{{ route('admin.users.show', $roleRequest->user) }}">
                        {{ $roleRequest->user->name }} ({{ $roleRequest->user->email }})
                    </a>
                </td>
            </tr>
            <tr><th>Текущая роль</th><td>{{ $roleRequest->user->role }}</td></tr>
            <tr><th>Запрашиваемая роль</th><td><strong style="color:blue;">{{ $roleRequest->requested_role }}</strong></td></tr>
            <tr><th>Причина</th><td>{{ $roleRequest->reason ?? '—' }}</td></tr>
            <tr>
                <th>Статус</th>
                <td>
                    @if($roleRequest->status === 'pending')
                        <span style="color:orange;">Ожидает рассмотрения</span>
                    @elseif($roleRequest->status === 'approved')
                        <span style="color:green;">Одобрена</span>
                    @else
                        <span style="color:red;">Отклонена</span>
                    @endif
                </td>
            </tr>
            <tr><th>Дата подачи</th><td>{{ $roleRequest->created_at->format('d.m.Y H:i') }}</td></tr>
        </table>

        @if($roleRequest->status === 'pending')
            <div style="margin-top:15px;">

                <form action="{{ route('admin.role_requests.comment', $roleRequest) }}" method="POST" style="margin-bottom:15px;">
                    @csrf
                    <textarea name="comment" rows="2" style="width:100%;" placeholder="Оставьте комментарий..." required></textarea>
                    <button type="submit" class="btn btn-view" style="margin-top:5px;">Отправить комментарий</button>
                </form>

                <div style="display:flex; gap:10px;">
                    <form action="{{ route('admin.role_requests.approve', $roleRequest) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-approve" onclick="return confirm('Одобрить заявку?')">Одобрить</button>
                    </form>
                    <form action="{{ route('admin.role_requests.reject', $roleRequest) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-reject" onclick="return confirm('Отклонить заявку?')">Отклонить</button>
                    </form>
                </div>
            </div>
        @endif

        @if($roleRequest->comments->count())
            <div class="comment-box">
                <h3>Комментарии администратора</h3>
                @foreach($roleRequest->comments as $comment)
                    <div class="comment-item">
                        <strong>{{ $comment->user->name }}</strong>
                        <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
