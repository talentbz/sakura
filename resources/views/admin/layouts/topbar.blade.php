<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('root')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('/assets/frontend/images/logo.png')}}" alt="" width="90">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('/assets/frontend/images/logo.png')}}" alt="" width="90">
                    </span>
                </a>
            </div>

            <!-- <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button> -->
    </div>

    <div class="d-flex">
        <div class="dropdown d-inline-block" id="notification"></div>
        <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                <i class="bx bx-fullscreen"></i>
            </button>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ isset(Auth::user()->avatar) ? asset('/uploads/avatar').'/'.(Auth::user()->id).'/'.(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                    alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="{{route('admin.edit_profile')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Edit Profile</span></a>
                <a class="dropdown-item d-block" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".change-password"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">@lang('translation.Settings')</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">@lang('translation.Logout')</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        
    </div>
</div>
</header>

<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" autocomplete="current_password"
                            placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="{{ Auth::user()->id }}"
                            type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function () {
        var notify_url = "{{route('admin.notification')}}";
        $.ajax({
                url: notify_url,
                method: 'get',
                dataType: 'json',
                success: function (res) {
                    result = res.notification;
                    notify = '';
                    console.log(result);
                    
                    if(result.length > 0){
                        notify += '<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                                        + '<i class="bx bx-bell bx-tada"></i>' +
                                        '<span class="badge bg-danger rounded-pill">'+ result.length+'</span>' +
                                    '</button>' 
                        notify += '<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">'
                            notify += '<div class="p-3">'+
                                        '<div class="row align-items-center">' + 
                                            '<div class="col">' +
                                                '<h6 class="m-0" key="t-notifications">Notifications</h6>'+
                                            '</div>' +
                                        '</div>' +
                                    '</div>'
                            notify += '<div data-simplebar="init" style="max-height: 300px;">'
                                    for(i=0; i<result.length; i++){
                                        notify += '<a href="'+ window.location.origin + '/admin/shipping/chat/' + result[i].user_id + '/'+ result[i].vehicle_id +'" class="text-reset notification-item" data-id="'+result[i].id+'">' +
                                                    '<div class="media">';
                                                    if(result['user_avatar']) {
                                                        notify += '<img src="'+ window.location.host +'/uploads/avatar/'+ result[i].user_id+ '/' + result[i].user_avatar+'" class="me-3 rounded-circle avatar-xs" alt="user-pic">'   
                                                    } else {
                                                        notify += '<img src="'+ result[i].name_avatar+'" class="me-3 rounded-circle avatar-xs" alt="user-pic">'   
                                                    }  
                                                    notify +=  '<div class="media-body">' +
                                                                    '<h6 class="mt-0 mb-1">'+ result[i].user_name +'</h6>' +
                                                                    '<div class="font-size-12 text-muted">' +
                                                                        '<p class="mb-1" key="t-occidental">'+ result[i].comments +'</p>' +
                                                                        '<p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">'+result[i].date+'</span></p>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                    '</div>' +
                                                '</a>'
                                    }
                        notify += '</div>'
                        // notify += '<div class="p-2 border-top d-grid">' +
                        //                 '<a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">' +
                        //                     '<i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More</span>' + 
                        //                 '</a>' +
                        //             '</div>'            
                    }
                    $('#notification').append(notify);
                },
                error: function (res){
                    console.log(res)
                },
        })
    })
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('admin.markNotification') }}", {
            method: 'get',
            data: {
                id
            }
        });
    }
    $(function() {
        $('body').on('click', '.notification-item', function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                //$(this).parents('div.simplebar-content').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
</script>
