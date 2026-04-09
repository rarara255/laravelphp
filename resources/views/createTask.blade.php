<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">

        <label>Название задачи
            <input name="title" type="text">
        </label>

        <label>Описание задачи
            <input name="description" type="text">
        </label>

        <label>Статус задачи
            <select name="group" >
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
            <input name="status" type="number">
        </label>

        <label>Ответственные люди
            <input name="performing_people" type="text">
        </label>

        <button class="btn submit-btn" type="submit">Сохранить данные!</button>

    </form>
</body>
</html>
