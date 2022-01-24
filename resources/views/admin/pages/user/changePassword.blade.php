@extends('admin.layouts.master')
@section('title') User List @endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') User Management @endslot
        @slot('title') User List @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{route('admin.user.updatePassword')}}" method="post" class="custom-validation" role="form">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-title">Update Password</div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{route('admin.user')}}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$data->id}}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">Current Password</label>
                                                <input type="password" class="form-control" placeholder="current password" name="cpass" value="{{Request::old('cpass')}}" required>
                                                @error('cpass')
                                                <p class="text-danger mb-0">{{ convertUtf8($message) }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">New Password</label>
                                                <input type="password" id="pass2" class="form-control" required placeholder="Password" name="npass" value="{{Request::old('npass')}}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" class="form-control" required data-parsley-equalto="#pass2" name="cfpass"  placeholder="confirm password" value="{{Request::old('cfpass')}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection