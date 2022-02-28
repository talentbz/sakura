@extends('admin.layouts.master')
@section('title') Port List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/port/create.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Port Management @endslot
        @slot('title') Port List@endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <form id="myForm" class="custom-validation" method="get" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title mb-4">Create Review</h4> -->
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Select Country</label>
                                <select class="form-select select-category" required>
                                    <option value="">select</option>
                                    @foreach($country as $row)
                                        <option value="{{$row->id}}">{{$row->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.select-category').on("change", function (e) { 
                var id = $(e.currentTarget).val();
                edit_url = `{{route('admin.port.index')}}/edit/${id}`;
                console.log(edit_url)
                location.href = edit_url; 
            })
        })
    </script>
    <script src="{{ URL::asset('/assets/admin/pages/port/index.js') }}"></script>
@endsection