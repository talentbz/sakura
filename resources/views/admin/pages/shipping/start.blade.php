@extends('admin.layouts.master')
@section('title') Chat List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/pages/shipping/chat.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
        @slot('li_1') Shipping Management @endslot
        @slot('title') Chat List @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="wrap-border chat-conversation">
                                <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                    @foreach($comments as $row)
                                    <li class="{{Request::routeIs('admin.shipping.stockChat') ? 'active' : '' }}">
                                        <a href="{{route('admin.shipping.stockChat', ['user_id' => $row->user_id, 'vehicle_id' => $row->vehicle_id])}}">
                                            <div class="media">
                                                <div class="align-self-center me-3">
                                                    <img src="{{URL::asset('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb'}}{{'/'}}{{$row->image}}"
                                                        class="rounded-circle avatar-xs" alt="">
                                                </div>

                                                <div class="media-body overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">{{$row->stock_id}}</h5>
                                                </div>
                                                <div class="font-size-11">{{$row->created_at->diffForHumans()}}</div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="wrap-border user-chat">
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/admin/pages/shipping/chat.js') }}"></script>
@endsection