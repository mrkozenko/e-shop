
@extends('layouts.app')

@section('custom_js')
    <script>
        $(document).ready(function ()
        {

        })
        function addToCart(id_par)
        {
            let item= $('#cart_count').val;

            let total_qt= parseInt($('#cart_count').text());
            total_qt+=1
            $('#cart_count').text(total_qt);
            console.log(total_qt);
           $.ajax({url:"{{route('addToCart')}}",
               type:"POST",
               data:{
                        id:id_par
                   },
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: (data) => {
                    console.log("good");
                   console.log(data)
               },
               error: (data) => {
               console.log("bad");
                   console.log(data)
               }



           });
        }
    </script>
@endsection
@section('content')
    <div class="container d-flex">
        <aside class="col-sm-2 border-right z-index-1  sticky-top">
         <h2>Категорії</h2>
            <div class="btn-group-vertical sticky-top  z-index-1" role="group" aria-label="First group">
            @foreach ($categories as $category)
                <a href="{{route('categories', $category->id)}}" class="btn btn-success">{{$category->title}}</a>
            @endforeach

        </div>
        </aside>
        <aside class="col-sm-10 border-left">
            <div class="container">
                @if($items->count()>0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($items as $item)
            <div class="col">
                <div class="card h-80 w-40">
                    @if(!$item->images()->where('item_id', $item->id)->get()->isEmpty())
                    <img src="{{ asset('images/'.$item->images()->where('item_id', $item->id)->get()[0]->img)}}" class="card-img-top" height="250" width="10"/>
                    @else
                        <img src="{{ asset('images/no_photo.png')}}" class="card-img-top" height="250" width="10"/>
                    @endif
                        <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p> {{$item->price}} UAH</p>
                        <p class="card-text">
                            {{$item->description}}
                        </p>
                        <a href="{{route('details', $item)}}" class="btn btn-success">Детальніше</a>

                        <button  class="btn btn-success cart_button" onClick="addToCart({{$item->id}})"  name="{{$item->id}}">Додати до кошику</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
                @else
                    <h1>Товари відсутні</h1>
                @endif
        </div>
        </aside>
    </div>

@stop

