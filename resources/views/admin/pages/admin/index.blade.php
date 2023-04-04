@extends('admin.layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') SakuraMotors @endslot
        @slot('title') Dashboards @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Total Vehicles</p>
                                    <h5 class="mb-0">{{$vehicle->count}}</h5>
                                </div>

                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="bx bxs-car"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card blog-stats-wid">
                        <div class="card-body">

                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Total Users</p>
                                    <h5 class="mb-0">{{$user->count}}</h5>
                                </div>

                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card blog-stats-wid">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">News</p>
                                    <h5 class="mb-0">{{$news->count}}</h5>
                                </div>

                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="bx bx-detail"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card blog-stats-wid">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Customer Review</p>
                                    <h5 class="mb-0">{{$customer->count}}</h5>
                                </div>

                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="bx bxs-message-square-dots"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="col-xl-7">
            <!-- registered user chart -->
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-end">
                            <div class="input-group input-group-sm">
                                <select class="form-select form-select-sm select-year">
                                    @for($i=date('Y'); $i >= 2022 ; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <label class="input-group-text">Year</label>
                            </div>
                        </div>
                        <h4 class="card-title mb-4">User</h4>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-muted">
                                <div class="mb-4">
                                    <p>This month</p>
                                    <h4>{{($this_month_user && $this_month_user->total) ? $this_month_user->total : 0}}</h4>
                                    <div>
                                        @if($this_month_user && $this_month_user->total && $last_month_user && $last_month_user->total && $this_month_user->total/$last_month_user->total > 0)
                                            <span class="badge badge-soft-success font-size-12 me-1"> + {{round($this_month_user->total/$last_month_user->total, 2)}}% </span> 
                                        @endif
                                        
                                        From previous period</div>
                                </div>

                                <div>
                                    <a href="{{route('admin.user')}}" class="btn btn-primary waves-effect waves-light btn-sm">View Details <i
                                            class="mdi mdi-chevron-right ms-1"></i></a>
                                </div>

                                <div class="mt-4">
                                    <p class="mb-2">Last month</p>
                                    <h5>{{($last_month_user && $last_month_user->total) ? $last_month_user->total : 0}}</h5>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div id="line-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <!-- end col -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Vehicle Analytics</h4>
                    <div id="pie-chart" class="e-charts"></div>
                </div>
            </div>
        </div>
        

    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script>
        var vehicle_data = "{{$vehicle_data}}";
        var user_data = "{{$user_data}}";
        var get_user = "{{route('root')}}"
    </script>
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- echarts js -->
    <script src="{{ URL::asset('/assets/libs/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/dashboard/index.js') }}"></script>
@endsection
