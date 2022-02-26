@extends('admin.layouts.master')
@section('title') Add News @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/admin/pages/news/create.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') News Management @endslot
        @slot('title') Add News @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
        <div class="detail-wrapper">
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Create News</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <div class="col-md-8">
                                            <label class="form-label">News Title</label>
                                            <input type="text" class="form-control"  placeholder="News Title" name="news_title" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">News Date</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                                    data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                                                    data-provide="datepicker" data-date-autoclose="true" name="news_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">News Contents</label>
                                        <div>
                                            <textarea id="elm1" name="news_contents" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <label class="col-form-label">News Photo</label>
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
        var create_url = "{{route('')}}"
    </script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.js') }}"></script>
    <!--tinymce js-->
    <script src="{{URL::asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('assets/js/pages/form-editor.init.js')}}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/news/create.js') }}"></script>
@endsection