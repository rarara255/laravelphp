@extends('layouts.app')

@section('content')
    <div class="col-md-4">
        <div class="card-body text-center">
            <h3>{{auth()->user()->name}}</h3>
            <p class="text-muted">{{auth()->user()->email}}</p>
            <span class="bg-primary mb-3 fs-6">Позиция в системе: {{strtoupper(auth()->user()->role)}}</span>
            <hr>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn bnt-outline-danger w-100" type="submit">Выйти из учётной записи</button>
            </form>

        </div>

    </div>
