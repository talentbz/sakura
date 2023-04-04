@extends('admin.layouts.master')

@section('title') Edit Maker type @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/makerType/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Category @endslot
        @slot('title') Edit Maker Type @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="my-page">
                        <form id="myForm" class="custom-validation">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{ $data->image ? URL::asset('/uploads/maker_type').'/'.$data->image : asset('/assets/images/users/user-profile.jpg') }}" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" id="wizard-picture" name="file" class="" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">Maker Type</label>
                                    <input type="text" class="form-control" name="maker_type" value="{{$data->maker_type}}" required />
                                </div>
                                <div class="col-md-4 mt-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script>
        var update_url = "{{route('admin.makerType.edit_post')}}"
        var list_url = "{{route('admin.makerType.index')}}"
    </script>
    
    <script src="{{ URL::asset('/assets/admin/pages/makerType/edit.js') }}"></script>
@endsection
