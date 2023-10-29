@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <h2 class="card-header text-center">Форма створення товару</h2>

                    <div class="card-body">
                        <form method="POST" action="{{route('submit_create_item')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Назва</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control"  name="title"  required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Ціна</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control"  name="price"  required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="count" class="col-md-4 col-form-label text-md-end">Кількість</label>

                                <div class="col-md-6">
                                    <input id="count" type="number" class="form-control"  name="count"  required  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="categoru" class="col-md-4 col-form-label text-md-end">Категорія</label>

                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" id="category"  name="category">
                                        <option selected>Оберіть категорію</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Опис</label>

                                <div class="col-md-6">
                                    <textarea id="description"  rows="4" class="form-control"  name="description"  required  autofocus>
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">Вік</label>

                                <div class="col-md-6">
                                    <input id="age" type="text" class="form-control"  name="age"  required  autofocus>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Створити
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
