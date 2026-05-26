@extends('layouts.app')

@section('content')
    <style>
        .admin-container{
            padding: 30px;
            font-family: "Droid Sans Mono Dotted";
        }
        .btn{
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 10%;
        }

        .btn-view{
            background-color: cornflowerblue;
            color: ghostwhite;
            text-shadow: -1px 1px 2px black;
        }

        .btn-approve{
            background: green;
            color: whitesmoke;
            text-shadow: -1px 1px 2px gray;
        }

        .btn-reject{
            background: darkred;
            color: white;
            text-shadow: -1px 1px 2px dimgray;
        }

        .data-table{
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            font-size: 14px;
        }

    </style>


    <div class="admin-container">
        <h1>Управление заявками:</h1>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Текущая роль</th>
                    <th>Запрашиваемая роль</th>
{{--                    <th>Причина</th>--}}
                    <th>Дата подачи</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $request)
                    <tr>
                        <td>{{$request->id}}</td>
                        <td>
                            <strong>{{$request->user->name}}</strong>
                            <small>{{$request->user->email}}</small>
                            <small>{{$request->user->created_at}}</small>
                        </td>

                        <td>{{$request->user->role}}</td>
                        <td><span style="color:blue;">{{$request->requested_role}}</span></td>
{{--                        <td>{{$request->reason}}</td>--}}
                        <td>{{$request->created_at->format('d.m.Y H:i')}}</td>
                        <td>
                            <a href="{{route('admin.role_requests.show', $request)}}" class="btn btn-view">Просмотреть заявку</a>

                            <form action="{{route('admin.role_requests.approve', $request)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-approve" onclick="return confirm('Вы собираетесь подтвердить заявку')">Принять заявку</button>
                            </form>

                            <form action="{{route('admin.role_requests.reject', $request)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-reject" onclick="return confirm('Вы собираетесь отклонить заявку')">Отклонить заявку</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td style="text-align: center;">Новых заявок нет.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
