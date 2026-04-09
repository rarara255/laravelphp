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

        <label>Автор
            <input name="author" type="text">
        </label>

        <label>Email автора
            <input name="author_email" type="email">
        </label>

        <label>Содержание
            <input name="content" type="text">
        </label>

        <label>Тема
            <input name="theme" type="text">
        </label>

        <label>Промодерировано
            <input name="is_moderated" type="number">
        </label>

        <button class="btn submit-btn" type="submit">Сохранить данные!</button>

    </form>
</body>
</html>
