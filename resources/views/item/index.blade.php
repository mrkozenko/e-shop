@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <h1>Товари</h1>
        <a href="{{route('create_item')}}"><h3>Додати товар</h3></a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Ідентифікатор</th>
                <th scope="col">Назва</th>
                <th scope="col">Вартість</th>
                <th scope="col">Кількість</th>
                <th scope="col">Категорія</th>
                <th scope="col">Опис</th>
                <th scope="col">Редагування</th>
                <th scope="col">Видалення</th>

            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <th scope="row">{{$item->title}}</th>
                    <th scope="row">{{$item->price}}</th>
                    <th scope="row">{{$item->count}}</th>
                    <th scope="row">{{$item->category()->get()[0]->title}} - [{{$item->category_id}}]</th>
                    <th scope="row">{{$item->description}}</th>


                    <td><a href="{{route('update_view',$item->id)}}">Редагувати</a></td>
                    <td><a href="{{route('delete_item',$item->id)}}">Видалити</a></td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
