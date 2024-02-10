
<style>
    .col-form-label
    {
        font-weight:bold;
    }
</style>
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

@error('name')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

@error('price')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

@error('quantity')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

@error('brands')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror
@error('description')
    @php
        echo '<script>setTimeout(function () {showNotificationMessage("top","right","'.$message.'","danger");}, 1000);</script>';
    @endphp
@enderror

    <div class="content">
        <div class="row">
                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <a  href="products/productsAdd"><button type="submit" class="btn btn-info" style="margin:0px;float:right;">Add</button></a>
                    </div>
                </div> --}}
        </div>
        <div class="">

        <form class="col-md-12" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf                                      
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Products UPDATE</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">Products Name</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{$product->name}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">Products Price</label>
                                <input type="text" name="price" class="form-control" placeholder="" value="{{$product->price}}">
                                
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">Products Quantity</label>
                                <input type="num" name="quantity" class="form-control" placeholder="" value="{{$product->quantity}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">Products Brands</label>
                                <input type="text" name="brands" class="form-control" placeholder="" value="{{$product->brands}}">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">Products Description</label>
                                <textarea class="form-control" name="description" >
                                    {{ $product->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" style="margin:0px;">Update</button>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </form>
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