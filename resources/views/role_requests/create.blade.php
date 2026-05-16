@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg text-grey-900">Запрос на повышение прав:</h3>

        <form action="{{route('role_requests.store')}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-4">
            <label for="requested_role" class="font-medium text-red-700 rounded-md block mt-1">Роль:</label>
            <select name="requested_role" id="requested_role" class="border-black-300">
                <option value="author">Author(creating new Tasks)</option>
                <option value="editor">Editor(edit all Tasks)</option>
            </select>
        </div>
        </form>
    </div>
