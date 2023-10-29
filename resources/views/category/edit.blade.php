@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <h1>Створення категорії</h1>
        <form method="POST" action="{{ route('update_category') }}">
            @csrf
            <div class="form-group">
                <label for="titlecategory">Ідентифікатор категорії</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="titlecategory" readonly value="{{$category->id}}">
                 <br>
                <label>Назва категорії</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="titlecategory" placeholder="Введіть назву категорії" value="{{$category->title}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Оновити</button>
        </form>


    </div>
@endsection
