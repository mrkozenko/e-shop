@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col">


                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <h1>Історія ваших замовлень</h1>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <! LOOP FOR ORDERS -->
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
                                                <h1 class="text-start">Статус замовлення: {{$order->status}}</h1><h1 class="text-end">Загальна сума - {{$order->summa}} UAH</h1>
                                                </div>
                                                </div>
                                        </div>
                                    </div>

                                    @endforeach

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
