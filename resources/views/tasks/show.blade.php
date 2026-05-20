<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Задача: {{ $task->title }}</title>
    <style>
        .task-show {
            display: flex;
            width: 600px;
            min-height: 500px;
            gap: 15px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 40px auto;
            border: 2px solid gold;
            padding: 25px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .task-show h2 { margin: 0 0 10px; text-align: center; }

        .info-row { width: 100%; margin: 8px 0; }
        .info-row strong { display: block; margin-bottom: 4px; color: #333; font-size: 0.95em; }
        .info-row p { margin: 0; padding: 10px; background: #f9f9f9; border-left: 4px solid gold; line-height: 1.4; }

        .actions { margin-top: 25px; display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; }
        .btn { padding: 10px 18px; text-decoration: none; border: none; cursor: pointer; font-size: 14px; border-radius: 4px; color: #fff; transition: opacity 0.2s; }
        .btn:hover { opacity: 0.85; }
        .btn-back { background: #007bff; }
        .btn-edit { background: #28a745; }
        .btn-delete { background: #dc3545; }
    </style>
</head>
<body>
<div class="task-show">
    <h2>{{ $task->title }}</h2>

    <div class="info-row">
        <strong>Описание:</strong>
        <p>{{ $task->description }}</p>
    </div>

    <div class="info-row">
        <strong>Статус:</strong>
        <p>{{ ucfirst($task->status) }}</p>
    </div>

    <div class="info-row">
        <strong>Дата сдачи:</strong>
        <p>{{ $task->due_date }}</p>
    </div>

    <div class="info-row">
        <strong>Приоритет:</strong>
        <p>{{ $task->priority }}</p>
    </div>

    <div class="info-row">
        <strong>Ответственные люди:</strong>
        <p>{{ $task->performing_people }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('tasks.index') }}" class="btn btn-back">Назад к списку</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-edit">Редактировать</a>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-delete" type="submit">Удалить</button>
        </form>
    </div>
</div>
</body>
</html>
