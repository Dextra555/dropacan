@if(session()->has('message'))
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.session()->get('message').'","success");}, 1000);</script>';
    @endphp
@endif

@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'locations'
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
                <a  href="productsAdd"><button type="submit" class="btn btn-info" style="margin:0px;float:right; margin-bottom:20px;">Add</button></a>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">                         
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Products</h5>
                        </div>
                        <div class="card-body">
                            <div class="row pad10">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">S NO</th>
                                            <th scope="col">P.Name</th>
                                            <th scope="col">P.Price</th>
                                            <th scope="col">P.Quantity</th>
                                            <th scope="col">P.Brands</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td> {{ $product->price }} </td>
                                            <td> {{ $product->quantity }} </td>
                                            <td> {{ $product->brands }} </td>
                                            <td><a href="{{ route('product.delete', $product->id) }}" class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-edit"></i></a></td>

                                        </tr>
                                        @empty

                                        <p>No City found</p>

                                        @endforelse

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