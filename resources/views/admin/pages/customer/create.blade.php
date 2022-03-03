@extends('admin.layouts.master')
@section('title') Customer Create @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/admin/pages/customer/create.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Customer Voice @endslot
        @slot('title') Customer Review Create @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="detail-wrapper">
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Create Review</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <div class="col-md-4">
                                            <label class="form-label">Customer Name</label>
                                            <input type="text" class="form-control"  placeholder="Full Name" name="customer_name" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Country</label>
                                            <select class="form-select" name="country">
                                                <option value="">Select Country</option>
                                                @foreach($country as $row)
                                                    <option value="{{$row}}">{{$row}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Review Date</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                                    data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                                                    data-provide="datepicker" data-date-autoclose="true" name="register_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Review Title</label>
                                        <input type="text" class="form-control"  placeholder="I'm very happy" name="title" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Review Description</label>
                                        <div>
                                            <textarea  class="form-control" rows="5" placeholder="I'm very happy i received my car in..." name="description" required></textarea>
                                        </div>
                                    </div>
                                    <label class="form-label">Rate</label>
                                    <input type="number" name="rate" id="rating1" class="rating text-warning" required/>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <label class="col-form-label">Customer Photo</label>
                                            <div class="file-loading">
                                                <input id="input-24" name="file[]" type="file" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var add_post = "{{route('admin.customer.add_post')}}"
    var list_url = "{{route('admin.customer.index')}}"
</script>
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.js') }}"></script>
<script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
<script src="{{ URL::asset('/assets/admin/plugin/bootstrap4-rating-input/bootstrap4-rating-input.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/pages/customer/create.js') }}"></script>
@endsection