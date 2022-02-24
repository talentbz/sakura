@extends('front.layouts.index')
@section('title') Contact Us @endsection
@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <link href="{{ URL::asset('/assets/frontend/pages/contact/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="contact-details">
        <div class="row">
            <div class="col-md-6">
                <form class="custom-validation" action="{{route('front.contact.email')}}" method="post">
                    @csrf
                    <div class="list-margin">
                        <label class="form-label">Subject*</label>
                        <input type="text" class="form-control" name="subject" required />
                    </div>
                    <div class="list-margin row">
                        <div class="col-md-6">
                            <label class="form-label">Name*</label>
                            <input type="text" class="form-control" name="name" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email*</label>
                            <input type="email" class="form-control" parsley-type="email" name="email" required />
                        </div>
                    </div>
                    <div class="list-margin row">
                        <div class="col-md-6">
                            <label class="form-label">Telephone*</label>
                            <input data-parsley-type="number" type="text" class="form-control" name="phone" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country*</label>
                            <select class="form-select select-category" name="country" required>
                                <option value="">select</option>
                                @foreach($country as $row)
                                    <option value="{{$row}}">{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="list-margin row">
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address*</label>
                            <input type="text" class="form-control" name="address" required />
                        </div>
                    </div>
                    <div class="list-margin">
                        <label class="form-label">Comment</label>
                        <div>
                            <textarea required class="form-control" rows="3" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="list-margin contact-submit">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Office Address</h4>
                <p>Ibaraki Ken, Tsukuba Shi, Gakuen Minami, 3 – 48 – 48,<br> 〒 305 – 0818</p>
                <h4>Phone Number</h4>
                <a href="tel: +81298683668">Office: +81-29-868-3668</a><br>
                <a href="tel: +819093450908">Mobile: +81-90-9345-0908</a>
                <h4>Fax</h4>
                <a href="tel:+81298683669">+81-29-868-3669</a>
                <h4>Email Address</h4>
                <a href="mailto:info@sakuramotors.com">info@sakuramotors.com</a><br>
                <a href="https://www.sakuramotors.com" target="_blank" rel="noopener noreferrer">www.sakuramotors.com</a>
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <!-- <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/contact/index.js')}}"></script> -->
@endsection