@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card-header bg-green"> <h4>Регистрация нового пользователя</h4></div>

        <div class="card-body">
            <form method="post" action="{{route('login.post')}}">
                @csrf

                <div class="mb-3">
                    <label>Email:
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                    </label>
                </div>

                <div class="mb-3">
                    <label>Пароль:
                        <input type="password" name="password" class="form-control" required>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-200">Войти</button>
            </form>
        </div>


    </div>
