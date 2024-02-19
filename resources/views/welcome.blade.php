@extends('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
])

@section('content')
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header py-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 pt-5">
                            <!-- <h1>Balaji</h1> -->
                            <h1 class="@if(Auth::guest()) text-white @endif">{{ __('Welcome to Water App.') }}</h1>
                            <p class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                                {{ __('Worlds best water management application. 100% Easy to use and you can work very efficient. very safe and secure') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <h1>Drop A Can - Order Status</h1>
    <p>Order ID: {{ $order->id }}</p>
    
    @if($order->status == 1)
        <p>Order Status: Processing</p>
    @elseif($order->status == 2)
        <p>Order Status: Cancelled</p>
    @elseif($order->status == 3)
        <p>Order Status: Completed</p>
    @else
        <p>Order Status: Unknown</p>
    @endif

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
