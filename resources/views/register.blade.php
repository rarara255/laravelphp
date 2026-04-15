<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>
    <style>
        .head{
            display: flex;
            width: 300px;
            height: 50px;
            flex-direction: column;
            align-items: center;
            margin-left: 42%;
        }
        .form{
            display: flex;
            width: 600px;
            height: 300px;
            gap: 3%;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            margin-left: 35%;
            border: 2px solid gold;
        }
        .formdiv{
            display: flex;
            width: 50px;
            height: 50px;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h1 class="head">Создать аккаунт</h1>
    <form method="post" class="form" action="{{ route('register.store') }}">
        @csrf
        <div class="formdiv">
            <label for="name">Имя пользователя:
                <input type="text" id="name" name="name" placeholder="Введите ваше имя">
            </label>
        </div>

        <div class="formdiv">
            <label for="email">Email:
                <input type="email" id="email" name="email" placeholder="example@mail.com">
            </label>
        </div>

        <div class="formdiv">
            <label for="password">Пароль:
                <input type="password" id="password" name="password" placeholder="Минимум 6 символов">
            </label>
        </div>

        <div class="formdiv">
            <label for="password_confirmation">Подтверждение пароля:
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">
            </label>
        </div>

        <button type="submit" class="register-btn">Зарегистрироваться</button>

    </form>
</body>
</html>
