@extends('layouts.frontend')
@section('meta')
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Checkout | Dama" />
<meta property="og:description" content="Free shipping on millions of items. Get the best of Shopping and Entertainment with Dama. Enjoy low prices and great deals on the largest selection of everyday essentials and other products technology, electronics,  video games, and more" />
<meta property="og:image" content="{{ asset('frontend/images/banner-sale.jpg') }}" />
@endsection

@section('title')
<title> Checkout | Dama</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}" />
@endsection

@section('content')
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Shopping Cart</li>
        </ul>
    </div>
    <!-- End container -->
</div>
<div class="main-content space-80 check-out">
    <form class="form-horizontal" method="post" action="{{route('checkout')}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <!-- End checkout header -->
            <div class="contact-form check-out space-50">
                <div class="col-md-8 padding-left-0">
                    <div class="title-ver3">
                        <h3><span>B</span>illing info</h3>
                    </div>
                    <!-- End title-product -->

                    <div class="form-group col-md-6">
                        <label class=" control-label" for="inputfname">Your Name*</label>
                        @if ($errors->first('fullname'))
                        <p class="text-danger"> {{ $errors->first('fullname') }} </p>
                        @endif
                        <input type="text" name="fullname" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter full name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class=" control-label" for="inputlname">Address*</label>
                        @if ($errors->first('address'))
                        <p class="text-danger"> {{ $errors->first('address') }} </p>
                        @endif
                        <input type="text" class="form-control" id="website" placeholder="address" name="address" value="{{Auth::user()->address}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class=" control-label" for="inputemail">Email*</label>
                        @if ($errors->first('email'))
                        <p class="text-danger"> {{ $errors->first('email') }} </p>
                        @endif
                        <input type="email" name="email" class="form-control" id="eMail" placeholder="Enter email ID" value="{{Auth::user()->email }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class=" control-label" for="inputcompany">Phone *</label>
                        @if ($errors->first('phone'))
                        <p class="text-danger"> {{ $errors->first('phone') }} </p>
                        @endif
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="{{Auth::user()->phone}}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label class=" control-label" for="inputfname1">Note</label>
                        @if ($errors->first('phone'))
                        <p class="text-danger"> {{ $errors->first('note') }} </p>
                        @endif
                        <textarea type="text" name="note" id="note" class="form-control" value=""></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn link-button">Place Order</button>
                        <span class="ship-adress">Ship to different address</span>
                    </div>
                    <input name="total" value="{{ Cart::total() }}" type="hidden" />

                    <div class="billing-info-menu" style="display: none;">
                       
                    </div>

                    <!-- End Billing info menu -->
                </div>
                <!-- End col-md-6 -->
                <div class="col-md-4 padding-right-0">
                    <div class="payment-order">
                        <div class="title-ver3">
                            <h3><span>y</span>our order</h3>
                        </div>
                        <div class="you-order">
                            <div class="order text-price">
                                @foreach ($cart_items as $cart_item )
                                <ul>
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="{{ get_image($cart_item->options['image'], App\Models\Product::IMAGE_SIZE['small']) }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $cart_item->name }}</div>
                                            <div class="col-xs-12"><small>Quantity: <span>{{ $cart_item->qty }}</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h4><span>$</span>{{ $cart_item->price }}</h4>
                                        </div>
                                    </div>
                                </ul>
                                @endforeach
                                <ul>
                                    <li><span class="text">Subtotal</span><span class="number">$0.00</span></li>
                                    <li><span class="text">Shipping</span><span class="number">${{ Cart::total() }}</span></li>
                                    <li><span class="text totals">Totals Cart</span><span class="number totals"> ${{ Cart::total() }}</span></li>
                                </ul>
                            </div>
                            <div class="payment">
                                <ul class="tabs">
                                    <li>
                                        <input type="radio" class="btn-check" name="payment" autocomplete="off" value="1" checked>

                                        <h3>COD</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="payment" autocomplete="off" value="2">
                                        <h3>Paypal</h3>
                                        <img src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_200x51.png' alt='payment PayPal' />
                                    </li>

                                    <li>
                                        <input type="radio" class="btn-check" name="payment" autocomplete="off" value="3">
                                        <h3>VNPay</h3>
                                        <img src="{{asset('frontend/images/logoVnpay.png')}}" alt='payment vnpay' />
                                        
                                    </li>
                                </ul>
                            </div>
                            <!-- End order -->
                        </div>
                        <!-- End payment-order -->

                    </div>
                    <!-- End col-md-6 -->
                </div>
                <!-- End contact-form -->
            </div>
            <!-- End conainer -->
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset ('ckeditor/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#note'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
