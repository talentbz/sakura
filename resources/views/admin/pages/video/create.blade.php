@extends('admin.layouts.master')
@section('title') Add Video @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/news/video.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Video Management @endslot
        @slot('title') Add Video @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="detail-wrapper">
                    <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Video</h4>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <div class="mb-5">
                                            <label class="form-label">Embed Video URL</label>
                                            <textarea required class="form-control" rows="5" name="url" placeholder="youtube embed url"></textarea>
                                        </div>
                                        <div class="">
                                            <label class="form-label">Search Key</label>
                                            <input type="text" class="form-control"  placeholder="search key" name="search_key" required/>
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
    </div>
@endsection
@section('script')
    <script>
        var create_url = "{{route('admin.video.add_post')}}"
        var list_url = "{{route('admin.video.index')}}"
    </script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/video/create.js') }}"></script>
@endsection