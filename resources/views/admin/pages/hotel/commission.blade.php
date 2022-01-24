@extends('admin.layouts.master')

@section('title') User List @endsection
@section('css')
    
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Booking Managment @endslot
        @slot('title') Commission @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hotel Commision</h4>
                    <form class="custom-validation" id="hotel_commission" action="{{route('admin.hotel_commission')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input data-parsley-type="number" type="text" name="hotel_commission" class="form-control" required
                                placeholder="Enter only numbers"  value="{{$hotel_commission}}"/>
                        </div>
                        <div class="d-flex flex-wrap gap-2 float-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Flight Commision</h4>
                    <form class="custom-validation" id="flight_commission" action="{{route('admin.flight_commission')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input data-parsley-type="number" type="text" name="flight_commission" class="form-control" required
                                placeholder="Enter only numbers" value="{{$flight_commission}}"/>
                        </div>
                        <div class="d-flex flex-wrap gap-2 float-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Car Commision</h4>
                    <form class="custom-validation" id="car_commission" action="{{route('admin.car_commission')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input data-parsley-type="number" type="text" name="car_commission" class="form-control" required
                                placeholder="Enter only numbers" value="{{$car_commission}}" />
                        </div>
                        <div class="d-flex flex-wrap gap-2 float-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var hotel_commission = "{{route('admin.hotel_commission')}}";
    var flight_commission = "{{route('admin.flight_commission')}}";
    var car_commission = "{{route('admin.car_commission')}}";
</script>
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('/assets/Admin/js/Hotel/commission.js') }}"></script>
@endsection
