@if(session()->has('message'))
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.session()->get('message').'","success");}, 1000);</script>';
    @endphp
@endif

@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'orders'
])

@section('content')

@error('state')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

@error('city')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

@error('area')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

    <div class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a  href="productsAdd"><button type="submit" class="btn btn-info" style="margin:0px;float:right; margin-bottom:20px;">Add Custom Orders</button></a>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">                         
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="row pad10">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">S NO</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>

                                   

                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td> {{ $order->brands }} </td>
                                            <td> {{ $order->quantity }} </td>
                                            <td> {{ $order->price }} </td>
                                            <td>{{ $order->location }}</td>

                                            <td><a href="#" class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-edit"></i></a></td>

                                        </tr>
                                        
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
    </div>
@endsection

@push('scripts')
    <script>
            function showNotificationMessage(from, align, message, status){
                color = status;
                    $.notify({
                    icon: "nc-icon nc-bell-55",
                    message: message

                    }, {
                    type: color,
                    timer: 8000,
                    placement: {
                        from: from,
                        align: align
                    }
                    });
            }
        
    </script>
@endpush