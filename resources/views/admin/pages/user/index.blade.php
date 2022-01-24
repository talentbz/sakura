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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Registered Users</h4>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Avatar</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>System Architect</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->country}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle " data-bs-toggle="dropdown"
                                            aria-expanded="false">Action<i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Details</a>
                                            <a class="dropdown-item" href="{{route('admin.user.change_password', $row->id)}}">Change Password</a>
                                            <a class="dropdown-item confirm_delete" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $row->id }}">Delete</a>
                                        </div>
                                    </div><!-- /btn-group -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="6">There are no any data.</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- delete modal content -->
    <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">User Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you delete seleted user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light delete-user">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script>
        var delete_url = "{{ route('admin.user.delete') }}";
    </script>
    <script src="{{ URL::asset('/assets/Admin/js/Hotel/user.js') }}"></script>
@endsection
