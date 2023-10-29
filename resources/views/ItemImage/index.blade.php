@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <h1>Зображення товарів</h1>
        <a href="{{route('addImage')}}"><h3>Додати зображення</h3></a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Ідентифікатор</th>
                <th scope="col">Назва файлу</th>
                <th scope="col">Контент</th>
                <th scope="col">Товар</th>
                <th scope="col">Редагування</th>
                <th scope="col">Видалення</th>

            </tr>
            </thead>
            <tbody>
            @foreach($images as $imageItem)
                <tr>
                    <th scope="row">{{$imageItem->id}}</th>
                    <td>{{$imageItem->img}}</td>
                    <td><img class="top-picture"
                             src="{{ asset('images/'.$imageItem->img)}}" height="100" width="100">
                            </td>
                    <td>{{$imageItem->item()->get()[0]->title}}</td>
                    <td><a href="{{route('update_img',$imageItem->id)}}">Редагувати</a></td>
                    <td><a href="{{route('deleteImage',$imageItem->id)}}">Видалити</a></td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
