@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <h1>Створення категорії</h1>
        <form method="POST" action="{{ route('add_category') }}">
            @csrf
            <div class="form-group">
                <label for="titlecategory">Назва категорії</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="titlecategory" placeholder="Введіть назву категорії">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Створити</button>
        </form>


    </div>
@endsection
