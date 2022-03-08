@extends('admin.layouts.master')
@section('title') News List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/news/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') News Management @endslot
        @slot('title') News List @endslot
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
                                <th align="center">Author</th>
                                <th align="center">Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $row)
                            <tr>
                                <td align="center">
                                    <img src="{{URL::asset('/uploads/news')}}{{'/'}}{{$row->news_id}}{{'/'}}{{$row->image}}" alt="" width="80">
                                </td>
                                <td align="center">{{$row->title}}</td>
                                <td align="center">{{$row->user}}</td>
                                <td align="center">{{date("Y-m-d", strtotime($row->date))}}</td>
                                <td align="center">
                                        <a href="{{route('admin.news.edit', ['id' => $row->news_id])}}" class="text-success edit" ><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{$row->news_id}}" data-bs-toggle="modal"
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