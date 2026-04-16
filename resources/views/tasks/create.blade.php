<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form{
            display: flex;
            width: 600px;
            height: 800px;
            gap: 3%;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            margin-left: 35%;
            border: 2px solid gold;

        }
    </style>
</head>
<body>
    <form method="post" class="form" action="{{ route('tasks.store') }}">
        @csrf
        <label>Название задачи
            <input name="title" type="text" placeholder="Краткое описание задачи">
        </label>

        <label>Описание задачи
            <input name="description" type="text" placeholder="Полное описание задачи">
        </label>

        <label>Статус задачи
            <select name="status" >
                <option selected disabled>Выбери статус задачи</option>
                <option value="completed">Completed</option>
                <option value="processing">Processing</option>
                <option value="done">Done</option>
            </select>
        </label>

        <label>Дата сдачи задачи
            <input name="due_date" type="date">
        </label>

        <label>Приоритет задачи
            <input name="priority" type="number">
        </label>

        <label>Ответственные люди
            <input name="performing_people" type="text" placeholder="Иванов Иван Иванович, Андреев Андрей Андреевич, ...">
        </label>

        <button class="btn submit-btn" type="submit">Сохранить данные!</button>

    </form>
</body>
</html>
