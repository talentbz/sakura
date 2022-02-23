@extends('admin.layouts.master')
@section('title') Customer List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/customer/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Customer Voice @endslot
        @slot('title') Customer List @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th align="center">Image</th>
                                <th align="center">Title</th>
                                <th align="center">Description</th>
                                <th align="center">Customer Name</th>
                                <th align="center">Country</th>
                                <th align="center">Review Date</th>
                                <th align="center">Rate</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($review as $row)
                            <tr>
                                <td align="center">
                                    <img src="{{URL::asset('/uploads/review')}}{{'/'}}{{$row->id}}{{'/'}}{{$row->image}}" alt="" width="80">
                                </td>
                                <td align="center">{{$row->title}}</td>
                                <td align="center">
                                    <p>{{$row->description}}</p>
                                </td>
                                <td align="center">{{$row->customer_name}}</td>
                                <td align="center">{{$row->country}}</td>
                                <td align="center">{{$row->register_date}}</td>
                                <td align="center">{{$row->rate}}</td>
                                <td align="center">
                                        <a href="#" class="text-success edit" ><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="#" class="text-danger confirm_delete" data-id="" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="8">There are no any data.</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
        var delete_url = "{{route('admin.vehicle.delete')}}";
    </script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/index.js') }}"></script>
@endsection