@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">


                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Корзина</p>
                                        <p class="mb-0">Ви маєте {{$cart_items->count()}} товарів в кошику</p>
                                    </div>
                                    <div>
                                       </div>
                                </div>





                                @foreach($cart_items->toArray() as $item)
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <img
                                                        src="{{ asset('images/'.$item['attributes'][0])}}"
                                                        class="img-fluid rounded-3"  style="width: 65px;">
                                                </div>

                                                <div class="ms-3">
                                                    <h5>{{$item['name']}}</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 50px;">
                                                    <h5 class="fw-normal mb-0">{{$item['quantity']}}</h5>
                                                </div>
                                                <div style="width: 80px;">
                                                    <h5 class="mb-0">{{$item['price']}}</h5>
                                                </div>
                                                <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                                <a href="{{route('deleteFromCart',$item['id'])}}"> DELETE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-lg-5">

                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Відомості картки</h5>

                                        </div>



                                        <form action="{{url('addOrder')}}" method="post" class="mt-4">
                                            @csrf
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                                       placeholder="ПІБ Власника" />
                                                <label class="form-label" for="typeName">ПІБ Власника</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                                       placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                <label class="form-label" for="typeText">Номер картки</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="typeExp" class="form-control form-control-lg"
                                                               placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Термін дії</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="typeText" class="form-control form-control-lg"
                                                               placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv код</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Адреса доставки</h5>

                                            </div>

                                            <input type="text" id="typeName"  name="address" class="form-control form-control-lg" siez="17"
                                                   placeholder="Адреса доставки" />


                                        <hr class="my-4">



                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Загальна сума</p>
                                            <p class="mb-2">{{Cart::getSubTotal()}} UAH</p>
                                        </div>

                                        <button type="submit" class="btn btn-dark">
                                            <h5>Оплатити</h5>
                                        </button>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
