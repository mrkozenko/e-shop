@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <h2 class="card-header text-center">Форма редагування товару</h2>

                    <div class="card-body">
                        <form method="POST" action="{{route('submit_update_item')}}">
                            @csrf
                            <input id="title" type="text" value="{{$item->id}}" class="form-control"  name="id"  required hidden autofocus>

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Назва</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" value="{{$item->title}}" class="form-control"  name="title"  required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Ціна</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" value="{{$item->price}}" name="price"  required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="count" class="col-md-4 col-form-label text-md-end">Кількість</label>

                                <div class="col-md-6">
                                    <input id="count" type="number" class="form-control"  name="count" value="{{$item->count}}" required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="categoru" class="col-md-4 col-form-label text-md-end">Категорія</label>

                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" id="category"  name="category">
                                        <option selected>{{$item->category()->get()[0]->title}}</option>
                                        @foreach($categories as $category)
                                             @if($category->title!=$item->category()->get()[0]->title)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Опис</label>

                                <div class="col-md-6">
                                    <textarea id="description"   rows="4" class="form-control"  name="description"  required  autofocus>
                                   {{$item->description}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">Вік</label>

                                <div class="col-md-6">
                                    <input id="age" type="text" class="form-control" value="{{$item->age}}" name="age"  required  autofocus>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Оновити
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
