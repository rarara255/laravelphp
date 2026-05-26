@extends('layouts.app')

@section('content')
    <style>
        .admin-container{
            padding: 30px;
            font-family: "Droid Sans Mono Dotted";
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
                                <button type="submit" class="btn btn-approve" onclick="return confirm('Вы собираетесь подтвердить заявку')"> </button>
                            </form>

                            <form action="{{route('admin.role_requests.reject', $request)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-approve" onclick="return confirm('Вы собираетесь отклонить заявку')"> </button>
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
