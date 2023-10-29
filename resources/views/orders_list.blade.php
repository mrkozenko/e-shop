@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <h1>Замовлення</h1>
        @foreach($orders as $order)
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$order->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            Замовлення №{{$order->id}}
                            <br>Адреса замовлення: {{$order->address}}

                        </button>

                    </h2>
                    <div id="flush-collapseOne{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <! LOOP FOR Items in order -->
                            @foreach($order->OrderItems()->where('order_id',$order->id)->get() as $item)
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">


                                                <div class="ms-3">

                                                    <h5>{{$all_items->where('id',$item->item_id)->first()->title}}</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 50px;">
                                                    <h5 class="fw-normal mb-0">{{$item->count}}</h5>
                                                </div>
                                                <div style="width: 80px;">
                                                    <h5 class="mb-0">{{$all_items->where('id',$item->item_id)->first()->price}}</h5>
                                                </div>
                                                <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            <div class="row flex-column">
                                <h1 class="text-start">Статус замовлення: {{$order->status}}</h1><h1 class="text-start">Загальна сума - {{$order->summa}} UAH</h1>
                                @if($order->status!="Очікуйте на пошті")
                                <h1><a href="{{route('submit_order',$order->id)}}">Підтвердити замовлення</a></h1>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach



    </div>
@endsection
