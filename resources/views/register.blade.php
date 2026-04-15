<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>

</head>
<body>
    <h1>Создать аккаунт</h1>
    <p>Зарегистрируйтесь, чтобы начать пользоваться сервисом</p>

    <form method="post" action="{{ route('register.store') }}">
        @csrf


        <label for="name">Имя пользователя</label>
        <input type="text" id="name" name="name" placeholder="Введите ваше имя">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@mail.com">

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" placeholder="Минимум 6 символов">

        <label for="password_confirmation">Подтверждение пароля</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">

        <button type="submit" class="register-btn">Зарегистрироваться</button>

    </form>
</body>
</html>
