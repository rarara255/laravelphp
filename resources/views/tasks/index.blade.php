@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tasks</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .task-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 20px 24px;
            margin-bottom: 20px;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .task-title {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
            margin: 0 0 8px 0;
        }

        .task-description {
            color: #555;
            font-size: 14px;
            margin: 0 0 8px 0;
        }

        .task-performers {
            color: #777;
            font-size: 13px;
            font-style: italic;
            margin: 0 0 16px 0;
        }

        .task-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        .btn:active {
            transform: scale(0.97);
        }

        .btn-info {
            background-color: #e0e7ff;
            color: #4f46e5;
        }

        .btn-info:hover {
            background-color: #c7d2fe;
            color: #3730a3;
        }

        .btn-danger {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .btn-danger:hover {
            background-color: #fecaca;
            color: #b91c1c;
        }

        hr {
            display: none; /* убираем стандартные линии, карточки сами задают разделение */
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Задачи</h2>

    @foreach($tasks as $task)
        <div class="task-card">
            <h4 class="task-title">{{ $task->title }}</h4>
            <p class="task-description">{{ Str::limit($task->description, 80) }}</p>
            <p class="task-performers">{{ $task->performing_people ?: 'Исполнители не указаны' }}</p>

            <div class="task-actions">
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="btn btn-info">
                    Подробнее
                </a>

                <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="post" onsubmit="return confirm('Удалить задачу?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
@endsection
