@if (session()->has('message'))
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
    'elementActive' => 'apartmentname',
])

@section('content')
    @error('city')
        @php
            echo '<script>
                setTimeout(function() {
                    showNotificationMessage("top", "right", "'.$message.'", "danger");
                }, 1000);
            </script>';
        @endphp
    @enderror

    <style>
        section.apartment {
            margin-top: 11rem;
        }


        .btn-info {
            /* float: right;
            margin-top: -4rem;
            margin-right: 20px; */
            width:100%;
        }
        .submitbutton
        {
            margin-top:4rem;
        }
    </style>

    <section class="apartment">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <form class="col-md-12" action="{{ route('get_apartments_insert') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Apartment</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="state" id="state" class="form-control"
                                                placeholder="Select State">
                                                <option value="">Select State</option>
                                                @forelse($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="city" id="city" class="form-control"
                                                placeholder="Select City">
                                                <option value="">Select City</option>
                                                <option value=""></option>                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="apartmentname" id="apartmentname" class="form-control"
                                                placeholder="Apartment Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="submitbutton">
                                            <button type="submit" class="btn btn-info" style="margin:0px;">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

              
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        let state_id = '';
        
        $("#state").change(function() {
            var state_id = $(this).val();
            $.ajax({
                url: "{{ route('get_cities') }}",
                method: 'post',
                data: {
                    state_id: state_id,
                },
                success: function(response) {
                    let cityData=JSON.stringify(response);
                    let jsonObjectCity = JSON.parse(cityData);
                    let jsonCitydata=jsonObjectCity.data;
                    var select = $('#city');
                        select.empty();
                        select.append($('<option>', {
                            value: 'default',
                            text: 'Select an option'
                        }));

                        for (var i = 0; i < jsonCitydata.length; i++) {
                            select.append($('<option>', {
                                value: jsonCitydata[i].id, 
                                text: jsonCitydata[i].name 
                            }));
                        }

                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $("#city").change(function() {
            let city_id=$("#city").val();
            let apartment_Name=$("#apartmentname").val();
            $.ajax({
                url:"{{ route('get_apartments_insert') }}",
                method:'post',
                data:{
                    city_id:city_id,
                    apartment_Name:apartment_Name,
                },
                sucess:function(response)
                {
                    console.log(response);
                },
                error:function()
                {},

            })
        });

        function showNotificationMessage(from, align, message, status) {
            alert(message);
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
