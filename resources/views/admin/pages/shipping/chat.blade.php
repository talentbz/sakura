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
                        <div class="col-md-2">
                            <div class="wrap-border chat-conversation">
                                <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                    @foreach($comments as $row)
                                    <li class="">
                                        <a href="{{route('admin.shipping.stockChat', ['user_id' => $row->user_id, 'vehicle_id' => $row->vehicle_id])}}">
                                            <div class="media">
                                                <div class="align-self-center me-3">
                                                    <img src="{{URL::asset('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb'}}{{'/'}}{{$row->image}}"
                                                        class="rounded-circle avatar-xs" alt="">
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
                                            <div class="col-md-4 col-9">
                                                <a href="{{$stock_info->site_url}}" target="_blank" class="font-size-15 mb-1">{{$stock_info->stock_id}}</a>
                                                <span class="badge badge-pill badge-soft-warning font-size-12">{{$stock_info->order_status}}</span>
                                            </div>
                                            <div class="col-md-8 col-3">
                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                    <li class="list-inline-item d-none d-sm-inline-block">
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" data-id="{{$stock_info->vehicle_id}}" class="btn nav-btn status" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                <i class="bx bx-cog"></i>
                                                            </a>
                                                        </div>
                                                    </li>

                                                </ul>
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
                                        <div class="chat-conversation  p-3" id="chat-scroll">
                                            <ul class="list-unstyled mb-0" data-simplebar style="max-height: 486px;">
                                                @foreach($customer_message as $row)
                                                    <li>
                                                        <div class="conversation-list">
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-header">
                                                                    <div class="conversation-name">{{$row->name}}</div>
                                                                    <p class="chat-time mb-0">{{$row->created_at->diffForHumans()}}</p>
                                                                </div>
                                                                <p class="chat-description">
                                                                    {!! nl2br(e($row->comments)) !!}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </li>
                                                    @foreach($reply as $r_row)
                                                        @if($r_row->comment_id == $row->id)
                                                        <li class="right">
                                                            <div class="conversation-list">
                                                                <div class="ctext-wrap">
                                                                    <div class="conversation-header">
                                                                        <div class="conversation-name">{{auth()->user()->name}}</div>
                                                                        <p class="chat-time mb-0">{{$r_row->created_at->diffForHumans()}}</p>
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
                                                <input type="hidden" name="comment_id" value="{{$latest_id}}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="position-relative">
                                                            <textarea class="form-control" placeholder="Enter Message..." name="reply" rows="7"></textarea>
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
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Change Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label">Order Satus:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select select-status">
                                @foreach($order_status as $row)
                                    <option value="{{$row}}" {{$stock_info->order_status == $row ? 'selected': ''}}>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light save_button">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script>
        create_url = "{{route('admin.shipping.reply')}}";
        change_status = "{{route('admin.shipping.change_status')}}";
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
    <script src="{{ URL::asset('/assets/admin/pages/shipping/chat.js') }}"></script>
@endsection