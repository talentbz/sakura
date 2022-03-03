@extends('admin.layouts.master')
@section('title') User List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Vehicle Management @endslot
        @slot('title') Vehilce List @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th align="center" width="5%">Image</th>
                                <th align="center">Stock No</th>
                                <th align="center">Price</th>
                                <th align="center">Discounted Price</th>
                                <th align="center">USD Price</th>
                                <th align="center">Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                            <tr>
                                <td align="center">
                                    <img src="{{URL::asset('/uploads/vehicle')}}{{'/'}}{{$row->id}}{{'/thumb'}}{{'/'}}{{$row->image}}" alt="" width="80">
                                </td>
                                <td align="center">SM{{$row->stock_no}}</td>
                                <td align="center">¥ {{number_format($row->price)}}</td>
                                @if($row->sale_price)
                                    <td align="center">¥ {{number_format($row->sale_price)}}</td>
                                @else
                                    <td align="center"></td>
                                @endif
                                @if($row->sale_price)
                                    <td align="center">$ {{number_format(round($row->sale_price / $rate))}}</td>
                                @else
                                    <td align="center">$ {{number_format(round($row->price / $rate))}}</td>
                                @endif
                                <td align="center">{{date("Y-m-d", strtotime($row->created_at))}}</td>
                                <td align="center">
                                        <a href="{{route('admin.vehicle.edit', ['id' => $row->id])}}" class="text-success edit" ><i
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
        var delete_url = "{{route('admin.vehicle.delete')}}";
        var index_url = "{{route('admin.vehicle.index')}}";
    </script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/index.js') }}"></script>
@endsection