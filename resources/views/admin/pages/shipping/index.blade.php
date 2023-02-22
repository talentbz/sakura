@extends('admin.layouts.master')
@section('title') Shipping List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/shipping/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
        @slot('li_1') Shipping Management @endslot
        @slot('title') Shipping List @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipping List</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user as $key=>$row)
                            <tr>
                                <td align="center">
                                    @if($row->avatar)
                                        <img src="{{URL::asset('/uploads/avatar')}}{{'/'}}{{$row->id}}{{'/'}}{{$row->avatar}}" class="rounded-circle" width='30' alt="">
                                    @else
                                        <img src="{{ Avatar::create($row->name)->toBase64() }}" width='30' alt="">   
                                    @endif
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->country}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->phone}}</td>
                                <td align="center">
                                        @if($row->comment_status == 1)
                                        <a href="{{route('admin.shipping.chat', ['user_id' => $row->id])}}" class="text-success edit" ><i
                                                class="bx bx-chat font-size-18"></i></a>
                                        @endif
                                        <!-- <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{$row->id}}" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i
                                                class="mdi mdi-delete font-size-18"></i></a> -->
                                </td> 
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="7">There are no any data.</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light delete_button">Delete</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script>
        var list_url = "{{route('admin.shipping.index')}}"
        var delete_url = "{{route('admin.shipping.delete')}}"
    </script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/shipping/index.js') }}"></script>
@endsection