@extends('admin.layouts.master')
@section('title') Edit Port @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/port/edit.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Port Management @endslot
        @slot('title') Edit Port@endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <form id="myForm" class="custom-validation" method="get" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title mb-4">Create Review</h4> -->
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Select Country</label>
                                <select class="form-select select-category" required>
                                    @foreach($country as $row)
                                        <option value="{{$row}}" {{ $param == $row ? "selected" : "" }}>{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table id="myTable" class=" table order-list">
                                    <thead>
                                        <tr>
                                            <td>Port</td>
                                            <td>Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-4">
                                                <input type="text" name="port" class="form-control" required/>
                                            </td>
                                            <td class="col-sm-4">
                                                <input type="number" name="price"  class="form-control" required/>
                                            </td>
                                            <td class="col-sm-2"><a class="deleteRow"></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align: left;">
                                                <a href="#" id="addrow" ><i class="bx bx-plus"></i> Add Port</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/port/edit.js') }}"></script>
@endsection