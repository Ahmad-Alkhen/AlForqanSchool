<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="{{route('admin.dash')}}" class="b-brand">
            <div class="b-bg">
                <i class="fa fa-university"></i>
            </div>
            <span class="b-title"> ثانوية الفرقان </span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="fa fa-university icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <div class="col-6">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dash')}}"><i class="feather icon-home"></i></a></li>
                                @yield('route-list')

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
        <ul class="navbar-nav ml-auto">
            <li class="nav-full-screen"><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>

            <li>
                <div class="dropdown ">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification dropdown_notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">الإشعارات </h6>
                            <div class="float-right">
                                <a href="{{route('admin.notification.asread')}}" class="m-r-10">مقروءة</a>
                                <a href="javascript:">مسح الكل</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
                                  @isset($notifications)
                                @foreach($notifications as $notification)
                                      <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="{{asset('assets/images/user/avatar-1.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>{{$notification->admin->name}}</strong></p>
                                        <p>{{$notification->event}}</p>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                            @endisset
                             @endif
                        </ul>
                        <div class="noti-footer">
                            <a href="javascript:">إظهار الكل</a>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{asset('assets/images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->name }}</span>
                            <a href="{{route('admin.logout')}}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a  class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                            <li><a  class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a  class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        </div>
    </div>
</header>
