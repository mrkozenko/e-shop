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
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">

                <article class="gallery-wrap">
                    <div class="img-big-wrap">

                            @if(!$item->images()->where('item_id', $item->id)->get()->isEmpty())
                        <div> <a href="#"><img src="{{asset('images/'.$item->images()->where('item_id', $item->id)->get()[0]->img)}}" height="250" width="350"></a></div>
                        @else
                            <div> <a href="#"><img src="{{asset('images/no_photo.png')}}" height="250" width="350"></a></div>
                        @endif
                    </div>
                    <div class="row">
                        @if(!$item->images()->where('item_id', $item->id)->get()->isEmpty())

                                @foreach ($item->images()->where('item_id', $item->id)->get() as $image)
                                <div class="col-3 mt-1">

                                <img
                                    src="{{asset('images/'.$image->img)}}"
                                    data-mdb-img="{{asset('images/'.$image->img)}}"
                                    alt="Table Full of Spices"
                                    class="w-100 mb-2 mb-md-4 shadow-1-strong rounded"
                                />
                                </div>
                            @endforeach
                        @else
                            <div class="col-3 mt-1">

                                <img
                                    src="{{asset('images/no_photo.png')}}"
                                    data-mdb-img="{{asset('images/no_photo.png')}}"
                                    alt="Table Full of Spices"
                                    class="w-100 mb-2 mb-md-4 shadow-1-strong rounded"
                                />
                            </div>                        @endif

                    </div>




                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3">{{$item->title}}</h3>

                    <p class="price-detail-wrap">
	<span class="price h3 text-success">
		</span>	<span class="price h3 text-success"> {{$item->price}} UAH</span>
	</span>

                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                        <dt>Опис</dt>
                        <dd><p>{{$item->description}}</p></dd>
                    </dl>



                    <hr>
                    <div class="row">


                    </div> <!-- row.// -->

                    <a href="#" class="btn btn-lg btn-outline-primary text-uppercase" onClick="addToCart({{$item->id}})"  name="{{$item->id}}"> <i class="fas fa-shopping-cart"></i>Додати до кошика</a>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->
@stop
