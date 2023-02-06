@extends('admin.layouts.master')
@section('title') User List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Vehicle Management @endslot
        @slot('title') Rate @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="detail-wrapper">
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Rate</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-list mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label">USD Rate:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" data-parsley-type="number" class="form-control" value="{{$rate->rate}}" name="rate" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-list mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label">Inspection:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" data-parsley-type="number" class="form-control" value="{{$rate->inspection}}" name="inspection" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-list mb-3 row">
                                        <div class="col-md-4">
                                            <label class="col-form-label">Insurance:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" data-parsley-type="number" class="form-control" value="{{$rate->insurance}}" name="insurance" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var rate_url = "{{route('admin.vehicle.rate_post')}}"
</script>
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/pages/vehicle/rate.js') }}"></script>
@endsection