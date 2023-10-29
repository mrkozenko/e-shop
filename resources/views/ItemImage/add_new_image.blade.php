@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="form-group">
        <form method="post" action="{{ route('storeImage') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="image">
                <label><h4>Завантажити зображення</h4></label>
                <input type="file" class="form-control" required name="image">
            </div>
            <div class="image">
                <label><h4>Ідентифікатор товару</h4></label>
                <input type="text" class="form-control" required name="id">
            </div>


            <div class="post_button">
                <button type="submit" class="btn btn-success">Зберегти</button>
            </div>
        </form>
            </div>

    </div>
@endsection
