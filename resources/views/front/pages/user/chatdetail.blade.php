@extends('front.layouts.index')
@section('title') Mypage @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/user/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/user/simplebar.css') }}" rel="stylesheet" type="text/css" />
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
                            <div class="col-md-2">
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
                                                        <span class="badge badge-pill badge-soft-warning font-size-12">{{$row->order_status}}</span>
                                                    </div>
                                                    <!-- <div class="font-size-11">{{$row->created_at->diffForHumans()}}</div> -->
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="wrap-border user-chat">
                                    <div class="card">
                                        <div class="p-1 border-bottom ">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{$stock_info->site_url}}" target="_blank" class="font-size-15 mb-1">{{$stock_info->stock_id}}</a>
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">{{$stock_info->order_status}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-1 border-bottom card-timeline">
                                            <div class="row">
                                                <ul class="bs4-order-tracking">
                                                    <li class="step">
                                                        <div><i class="fas fa-user"></i></div> Inquiry
                                                    </li>
                                                    <li class="step">
                                                        <div><i class="fas fa-bread-slice"></i></div> Invoice Issued
                                                    </li>
                                                    <li class="step">
                                                        <div><i class="fas fa-truck"></i></div> Payment Received
                                                    </li>
                                                    <li class="step ">
                                                        <div><i class="fas fa-birthday-cake"></i></div> Shipping
                                                    </li>
                                                    <li class="step ">
                                                        <div><i class="fas fa-birthday-cake"></i></div> Document
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="chat-conversation p-3" id="chat-scroll">
                                                <ul class="list-unstyled mb-0" data-simplebar style="max-height: 486px;">
                                                    @foreach($customer_message as $c_row)
                                                        <li class="right">
                                                            <div class="conversation-list">
                                                                <div class="ctext-wrap">
                                                                <div class="conversation-header">
                                                                    <div class="conversation-name">{{$c_row->name}}</div>
                                                                    <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> {{$c_row->created_at->diffForHumans()}}
                                                                    </p>
                                                                </div>
                                                                <p class="chat-description">
                                                                    {!! nl2br(e($c_row->comments)) !!}
                                                                </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @foreach($reply as $r_row)
                                                            @if($r_row->comment_id == $c_row->id)
                                                            <li>
                                                                <div class="conversation-list">
                                                                    <div class="ctext-wrap">
                                                                        <div class="conversation-header">
                                                                            <div class="conversation-name">Admin</div>
                                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> {{$r_row->created_at->diffForHumans()}}</p>
                                                                        </div>
                                                                        <p class="chat-description">
                                                                            {!! nl2br(e($r_row->reply)) !!}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="p-3 chat-input-section">
                                                <form action="" id="myForm">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$stock_info->user_id}}">
                                                    <input type="hidden" name="stock_id" value="{{$stock_info->stock_id}}">
                                                    <input type="hidden" name="vehicle_id" value="{{$stock_info->vehicle_id}}">
                                                    <input type="hidden" name="order_status" value="{{$stock_info->order_status}}">
                                                    <input type="hidden" name="site_url" value="{{$stock_info->site_url}}">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="position-relative">
                                                                <textarea class="form-control" placeholder="Enter Message..." name="comments" rows="7"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span
                                                                    class="d-none d-sm-inline-block me-2">Send</span> <i
                                                                    class="mdi mdi-send"></i></button>
                                                        </div>
                                                    </div>     
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        create_url = "{{route('front.user.comment_create')}}";
        order_status = '{{$stock_info->order_status}}';
        
        if(order_status == 'Inquiry'){
            $('.step').eq(0).addClass('active');
        } else if(order_status == 'Invoice Issued') {
            $('.step').eq(0).addClass('active');
            $('.step').eq(1).addClass('active');
        } else if(order_status == 'Payment Received') {
            $('.step').eq(0).addClass('active');
            $('.step').eq(1).addClass('active');
            $('.step').eq(2).addClass('active');
        } else if(order_status == 'Shipping') {
            $('.step').eq(0).addClass('active');
            $('.step').eq(1).addClass('active');
            $('.step').eq(2).addClass('active');
            $('.step').eq(3).addClass('active');
        } else {
            $('.step').eq(0).addClass('active');
            $('.step').eq(1).addClass('active');
            $('.step').eq(2).addClass('active');
            $('.step').eq(3).addClass('active');
            $('.step').eq(4).addClass('active');
        }
    </script>
    <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/user/chatroom.js') }}"></script>
@endsection