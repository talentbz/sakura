@extends('front.layouts.index')
@section('title') Mypage @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/user/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/user/mypage.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="registered-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">My Page</a></li>
            </ul>
        </div>
        <div class="registered-contents">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-contents">
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
                                        <input data-parsley-type="number" type="text" class="form-control" name="phone" value="{{$user->phone}}" required />
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
                                        <input type="text" class="form-control" name="address" value="{{$user->address}}" required />
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
    </div>
</div>
@endsection
@section('script')
    <script>
        edt_url = "{{route('front.user.mypage_post')}}";
        list_url = "{{route('front.user.mypage')}}"
    </script>
        <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/user/mypage.js') }}"></script>
@endsection