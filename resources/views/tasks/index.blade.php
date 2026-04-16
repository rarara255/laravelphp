<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tasks</title>
</head>
<body>
    <h2>Задачи:</h2>
    @foreach($tasks as $task)
        <hr>
        <div class="task">
            <h4>{{$task->title}}</h4>
            <p>{{Str::limit($task->description, 5)}}</p>
            <p>{{$task->performing_people}}</p>
            <br>
            <button class="info-brn">
                <a href="{{route('tasks.show', ['id' => $task->id]) }}">Ознакомиться</a>
            </button>

            <form action="{{route("tasks.destroy", ['id'=>$task->id])}}" method="post" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button class="btn-delete" type="submit">Удалить</button>
            </form>
        </div>
        <hr>
        <br>
    @endforeach
</body>
</html>
