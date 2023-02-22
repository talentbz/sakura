@extends('admin.layouts.master')
@section('title') Inquiry List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/inquiry/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Inquiry Management @endslot
        @slot('title') Inquiry List @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th align="center">No</th>
                                <th align="center">Name</th>
                                <th align="center">Email</th>
                                <th align="center">Country</th>
                                <th align="center">Mobile</th>
                                <th align="center">Stock No</th>
                                <th align="center">Total Price</th>
                                <th align="center">Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inquery as $key=>$row)
                            <tr>
                                <td align="center">{{$key + 1}}</td>
                                <td align="center">{{$row->inqu_name}}</td>
                                <td align="center">{{$row->inqu_email}}</td>
                                <td align="center">{{$row->inqu_country}}</td>
                                <td align="center">{{$row->inqu_mobile}}</td>
                                <td align="center"><a href="{{$row->site_url}}">{{$row->stock_no}}</a></td>
                                <td align="center">{{$row->total_price}}</td>
                                <td align="center" data-order="{{$row->created_at}}" >{{date("Y-m-d", strtotime($row->created_at))}}</td>
                                <td align="center">
                                        <a href="javascript:void(0);" class="text-success edit" data-id="{{$row->id}}" data-bs-toggle="modal" data-bs-target="#detail"><i
                                                class="mdi mdi-eye font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{$row->id}}" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="9">There are no any data.</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="detail" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Inquiry Detais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table  class="table table-bordered dt-responsive  nowrap w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td class="table-light" scope="row">Name</td>
                                <td class="inqu-name"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Email</td>
                                <td class="inqu-email"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Comtact No</td>
                                <td class="inqu-phone"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Country</td>
                                <td class="inqu-country"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">City</td>
                                <td class="inqu-city"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Address</td>
                                <td class="inqu-address"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Vehicle Name</td>
                                <td class="inqu-vehicle" style="text-transform:uppercase;"><a href="" target="_blank"></a></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">FOB Price</td>
                                <td class="inqu-fprice"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Insurance</td>
                                <td class="inqu-insurance"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Inspection</td>
                                <td class="inqu-inspection"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Port Name</td>
                                <td class="inqu-port"></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Total Price	</td>
                                <td class="inqu-tprice"></td>
                            </tr>
                            <!-- <tr>
                                <td class="table-light" scope="row">Web Link</td>
                                <td class="inqu-link"><a href=""></a></td>
                            </tr> -->
                            <tr>
                                <td class="table-light" scope="row">Stock No</td>
                                <td class="inqu-stock"><a href="" target="_blank"></a></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">Comment</td>
                                <td class="inqu-comment"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    var list_url = "{{route('admin.inquiry.index')}}"
    var detail_url = "{{route('admin.inquiry.detail')}}"
    var delete_url = "{{route('admin.inquiry.delete')}}"
</script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/admin/pages/inquiry/index.js') }}"></script>
@endsection