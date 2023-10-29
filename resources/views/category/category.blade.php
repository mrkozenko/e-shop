@extends('layouts.admin_app')
@section('content')
    <div class="container">
    <h1>Категорії</h1>
        <a href="{{route('show_add_category')}}"><h3>Додати категорію</h3></a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Ідентифікатор</th>
        <th scope="col">Назва</th>
        <th scope="col">Редагування</th>
        <th scope="col">Видалення</th>

    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->title}}</td>
        <td><a href="{{route('show_update',$category->id)}}">Редагувати</a></td>
        <td><a href="{{route('delete_category',$category->id)}}">Видалити</a></td>


    </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
