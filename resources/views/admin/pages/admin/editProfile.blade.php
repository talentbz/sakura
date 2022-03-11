@extends('admin.layouts.master')
@section('title') User List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/admin/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Admin Profile @endslot
        @slot('title') Edit Profile @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                <div class="my-page">
                    <form id="myForm" class="custom-validation">
                        @csrf
                        <div class="picture-container">
                            <div class="picture">
                                <img src="{{ isset(Auth::user()->avatar) ? asset('/uploads/avatar').'/'.(Auth::user()->id).'/'.(Auth::user()->avatar) : asset('/assets/images/users/user-profile.jpg') }}" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" name="file" class="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" parsley-type="email" name="email" value="{{$user->email}}" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telephone</label>
                                <input data-parsley-type="number" type="text" class="form-control" name="phone" value="{{$user->phone}}"  />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-select select-category" name="country" value="{{$user->country}}" required>
                                    @foreach($country as $row)
                                        <option value="{{$row}}" {{$user->country == $row ? 'selected':''}}>{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{$user->city}}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}"  />
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        update_url = "{{route('admin.update_profile')}}"
    </script>
    <script src="{{ URL::asset('/assets/admin/pages/admin/index.js') }}"></script>
@endsection