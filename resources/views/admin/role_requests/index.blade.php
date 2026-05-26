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
        /*.data-table thead {*/
        /*    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);*/
        /*    color: #fff;*/
        /*    font-weight: 600;*/
        /*    text-transform: uppercase;*/
        /*    font-size: 12px;*/
        /*    letter-spacing: 0.5px;*/
        /*}*/

        /*.data-table th,*/
        /*.data-table td {*/
        /*    padding: 12px 15px;*/
        /*    text-align: left;*/
        /*    border-bottom: 1px solid #e0e0e0;*/
        /*    vertical-align: middle;*/
        /*}*/

        /*.data-table th:last-child,*/
        /*.data-table td:last-child {*/
        /*    text-align: center;*/
        /*}*/

        /*.data-table tbody tr {*/
        /*    transition: background-color 0.2s ease;*/
        /*}*/

        /*.data-table tbody tr:hover {*/
        /*    background-color: #f8f9ff;*/
        /*}*/

        /*.data-table tbody tr:nth-child(even) {*/
        /*    background-color: #fafafa;*/
        /*}*/

        /*.data-table tbody tr:nth-child(even):hover {*/
        /*    background-color: #f0f4ff;*/
        /*}*/

        /*.data-table td small {*/
        /*    display: block;*/
        /*    color: #666;*/
        /*    font-size: 11px;*/
        /*    margin-top: 2px;*/
        /*}*/

        /*.data-table td strong {*/
        /*    color: #2c3e50;*/
        /*    font-size: 14px;*/
        /*}*/

        /*.data-table td:last-child {*/
        /*    display: flex;*/
        /*    gap: 6px;*/
        /*    justify-content: center;*/
        /*    flex-wrap: wrap;*/
        /*}*/

        /*.data-table td:last-child form {*/
        /*    display: inline-block;*/
        /*    margin: 0;*/
        /*}*/

        /*.data-table td:last-child .btn {*/
        /*    font-size: 12px;*/
        /*    padding: 5px 10px;*/
        /*    border: none;*/
        /*    min-width: 32px;*/
        /*    display: inline-flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/


        /*.data-table tbody tr:only-child td:empty,*/
        /*.data-table td:only-child {*/
        /*    text-align: center;*/
        /*    padding: 40px 20px;*/
        /*    color: #888;*/
        /*    font-style: italic;*/
        /*}*/
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
