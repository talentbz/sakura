@extends('admin.layouts.master')
@section('title') Inquiery List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/inquiery/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Inquiery Management @endslot
        @slot('title') Inquiery List @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th align="center">Vehicle Name</th>
                                <th align="center">User Name</th>
                                <th align="center">Country</th>
                                <th align="center">Email</th>
                                <th align="center">Contact No</th>
                                <th align="center">Status</th>
                                <th align="center">Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inquery as $row)
                            <tr>
                                <td align="center">
                                    <a href="{{$row->site_url}}">{{$row->vehicle_name}}</a>
                                </td>
                                <td align="center">{{$row->inqu_name}}</td>
                                <td align="center">{{$row->inqu_country}}</td>
                                <td align="center">{{$row->inqu_email}}</td>
                                <td align="center">{{$row->inqu_mobile}}</td>
                                <td align="center"><span class="badge rounded-pill badge-soft-warning font-size-11">Unregister</span></td>
                                <td align="center">{{date("Y-m-d", strtotime($row->created_at))}}</td>
                                <td align="center">
                                        <a href="{{route('admin.inquiry.detail', ['id' => $row->id])}}" class="text-success edit" ><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{$row->id}}" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="13">There are no any data.</p>
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
    var list_url = "{{route('admin.news.index')}}"
    var delete_url = "{{route('admin.news.delete')}}"
</script>
<script src="{{ URL::asset('/assets/admin/pages/news/index.js') }}"></script>
@endsection