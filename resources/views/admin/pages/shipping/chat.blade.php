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
                    <h4 class="card-title">Chat List</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="wrap-border chat-conversation">
                                <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                    <li class="active">
                                        <a href="#">
                                            <div class="media">
                                                <div class="align-self-center me-3">
                                                    <img src="{{ URL::asset('/uploads/vehicle/49/thumb/1-45.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt="">
                                                </div>

                                                <div class="media-body overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">SM1186</h5>
                                                </div>
                                                <div class="font-size-11">05 min</div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <div class="align-self-center me-3">
                                                    <img src="{{ URL::asset('/uploads/vehicle/49/thumb/1-45.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt="">
                                                </div>

                                                <div class="media-body overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">SM1187</h5>
                                                </div>
                                                <div class="font-size-11">05 min</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="wrap-border user-chat">
                                <div class="card">
                                    <div class="p-4 border-bottom ">
                                        <div class="row">
                                            <div class="col-md-4 col-9">
                                                <a href="#" class="font-size-15 mb-1">SM1186</a>
                                                <span class="badge badge-pill badge-soft-warning font-size-12">Pending</span>
                                            </div>
                                            <div class="col-md-8 col-3">
                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                    <li class="list-inline-item d-none d-sm-inline-block">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn dropdown-toggle" type="button">
                                                                <i class="bx bx-cog"></i>
                                                            </button>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="chat-conversation p-3">
                                            <ul class="list-unstyled mb-0" data-simplebar style="max-height: 486px;">
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">User 1</div>
                                                            <p>
                                                                Hello!
                                                            </p>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:00
                                                            </p>
                                                        </div>

                                                    </div>
                                                </li>

                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Admin</div>
                                                            <p>
                                                                Hi, How are you? What about our next meeting?
                                                            </p>

                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:02
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-3 chat-input-section">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="position-relative">
                                                            <textarea class="form-control" placeholder="Enter Message..." rows="7"></textarea>
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
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/admin/pages/shipping/chat.js') }}"></script>
@endsection