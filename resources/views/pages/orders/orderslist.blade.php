@if(session()->has('message'))
@php
echo '<script>
setTimeout(function() {
    showNotificationMessage("top", "right", "'.session()->get('message').'", "success");
}, 1000);
</script>';
@endphp
@endif

@extends('layouts.app', [
'class' => '',
'elementActive' => 'orders'
])

@section('content')

@error('state')
@php
echo '<script>
setTimeout(function() {
    showNotificationMessage("top", "right", "'.$message.'", "danger");
}, 1000);
</script>';
@endphp
@enderror

@error('city')
@php
echo '<script>
setTimeout(function() {
    showNotificationMessage("top", "right", "'.$message.'", "danger");
}, 1000);
</script>';
@endphp
@enderror

@error('area')
@php
echo '<script>
setTimeout(function() {
    showNotificationMessage("top", "right", "'.$message.'", "danger");
}, 1000);
</script>';
@endphp
@enderror
@push('scripts')
<script>
$(document).ready(function() {
    $('#action-btn').click(function() {
        $('#demoModal').modal('show');
    });
});
</script>
@endpush




<div class="content">
    <div class="row">
        <div class="col-md-12">
            <span id="status-text"></span>

            <div class="form-group">

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
                                    <th scope="col">S.NO</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>

                            <tbody>


                                @push('scripts')
                                <script>
                                $(document).ready(function() {

                                    $('.statusSelect').change(function() {

                                        var selectedValue = $(this).val();
                                        var orderId = $(this).data('order-id');

                                        var token = "{{ csrf_token() }}";

                                        // console.log("Selected Option Value:", selectedValue);
                                        // console.log("Order ID:", orderId);


                                        $.ajax({
                                            url: '/updateorderstatus',
                                            type: 'POST',
                                            data: {
                                                _token: token,
                                                orderId: orderId,
                                                newStatus: selectedValue,
                                            },

                                            success: function(response) {
                                                // console.log(response);
                                                // $('#demoModal').modal('hide');

                                                var orderId = response.orderId;
                                                var newStatus = response.newStatus;

                                                var statusColumn = $(orderId +
                                                    ' .status-column');

                                                var status = statusColumn.text(newStatus);

                                                if (response.success) {
                                                    $('#status-text').html(
                                                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                                        response.message +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                                                    );
                                                } else {
                                                    $('#status-text').html(
                                                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                                        response.message +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                                                    );
                                                }

                                            },

                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    });
                                });
                                </script>
                                <script>
                                $(document).ready(function() {
                                    $('.statusSelect').change(function() {
                                        var selectedValue = $(this).val();
                                        $(this).attr('id', +selectedValue);
                                    });
                                });
                                </script>


                                @endpush




                                @foreach($orders as $order)
                                <tr>
                                    <td class="order_id">{{ $order->id }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td> {{ $order->brands }} </td>
                                    <td> {{ $order->quantity }} </td>
                                    <td> {{ $order->price }} </td>
                                    <td>
                                        @php
                                        $locationData = json_decode($order->location);
                                        @endphp

                                        Country: {{ $locationData->country }}<br>
                                        State: {{ $locationData->state }}<br>
                                        City: {{ $locationData->city }}<br>
                                        Area: {{ $locationData->area }}
                                    </td>
                                    <td>{{ $order->created_at->format('d-m-y') }} <br>
                                        {{ $order->created_at->format('h:i A') }}</td>

                                    <td class="status-column">
                                        <div class="modal-body status-bar">
                                            <div class="form-group">

                                                <select id="{{ $order->status }}" class="form-control statusSelect"
                                                    data-order-id="{{ $order->id }}">
                                                    <option class="opt-0" value="0" selected disabled>Select Status
                                                    </option>
                                                    <option class="opt-1" value="1"
                                                        {{ $order->status == 1 ? 'selected' : '' }}> Processing</option>
                                                    <option class="opt-2" value="2"
                                                        {{ $order->status == 2 ? 'selected' : '' }}> Cancelled</option>
                                                    <option class="opt-3" value="3"
                                                        {{ $order->status == 3 ? 'selected' : '' }}> Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @endsection


            @push('scripts')
            <script>
            function showNotificationMessage(from, align, message, status) {
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
            