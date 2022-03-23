@extends('front.layouts.index')
@section('title') Mypage @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/user/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/user/chatroom.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="registered-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Chat Room</a></li>
            </ul>
        </div>
        <div class="registered-contents">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-contents">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="wrap-border chat-conversation">
                                    <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                        @foreach($comments as $row)
                                        <li class="chat-sidebar">
                                            <a href="{{route('front.user.chatdetail', ['id' => $row->vehicle_id])}}">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        <img src="{{URL::asset('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb'}}{{'/'}}{{$row->image}}"
                                                            class="" alt="">
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$row->stock_id}}</h5>
                                                    </div>
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">{{$row->order_status}}</span>
                                                    <!-- <div class="font-size-11">{{$row->created_at->diffForHumans()}}</div> -->
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection