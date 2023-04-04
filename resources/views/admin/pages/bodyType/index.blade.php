@extends('admin.layouts.master')

@section('title') vehicle type @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Category @endslot
        @slot('title') Vehicle Type @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th align="center">No</th>
                                <th align="center">Image</th>
                                <th align="center">Vehicle Type</th>
                                <th align="center">Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $key=>$row)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td align="center">
                                    @if($row->image)
                                        <img src="{{URL::asset('/uploads/body_type')}}{{'/'}}{{$row->image}}" width='50' alt="">   
                                    @endif
                                </td>
                                <td align="center">{{$row->vehicle_type}}</td>
                                <td align="center">{{date("Y-m-d", strtotime($row->created_at))}}</td>
                                <td align="center">
                                    <a href="{{route('admin.bodyType.edit', ['id' => $row->id])}}" class="text-success edit" ><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{$row->id}}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"><i
                                            class="mdi mdi-delete font-size-18"></i></a>
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Vehicl Type Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you delete seleted field?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light delete_button">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script>
        var delete_url = "{{route('admin.bodyType.delete')}}"
        var list_url = "{{route('admin.bodyType.index')}}"
    </script>
    
    <script src="{{ URL::asset('/assets/admin/pages/bodyType/index.js') }}"></script>
@endsection
