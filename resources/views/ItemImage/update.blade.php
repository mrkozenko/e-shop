@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="form-group">
            <form method="post" action="{{ route('updateImage') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="image">
                    <label><h4>Завантажити зображення</h4></label>
                    <input type="file" class="form-control" required name="image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <img class="top-picture" id="output"
                     src="{{ asset('images/'.$image->img)}}" height="100" width="100">
                <div class="image">
                    <label><h4>Ідентифікатор товару</h4></label>
                    <input type="text" class="form-control" value = '{{$image->item_id}}' required name="id">
                </div>


                <div class="post_button">
                    <button type="submit" class="btn btn-success">Оновити</button>
                </div>
            </form>
        </div>

    </div>
@endsection
