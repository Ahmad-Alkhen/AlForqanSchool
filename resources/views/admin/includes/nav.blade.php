<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{route('admin.dash')}}" class="b-brand">
                <div class="b-bg">
               <!--     <i class="feather icon-trending-up"></i> -->
                    <i class="fas fa-car"></i>
                </div>
                <span class="b-title">AlFORQAN School</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Dashboard</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                    <a href="{{route('admin.dash')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Info</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">المشرفين</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{route('admin.index')}}" class="">جميع المشرفين</a></li>

                        <li class=""><a href="{{route('admin.create')}}" class="">إضافة مشرف</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">الطلاب</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{route('admin.user.index')}}" class="">جميع الطلاب</a></li>

                        <li class=""><a href="{{route('admin.user.create')}}" class="">إضافة طالب</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">السجلات</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{route('admin.register.index')}}" class="">جميع السجلات</a></li>

                        <li class=""><a href="{{route('admin.register.create')}}" class="">إضافة سجل</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">الطلاب في السجلات</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{route('admin.registerStd.index')}}" class="">جميع السجلات</a></li>

                        <li class=""><a href="{{route('admin.registerStd.create')}}" class="">إضافة سجل</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu nav-additional">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="fa fa-info-circle"></i></span><span class="pcoded-mtext">Version 1.0</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu nav-additional">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="fa fa-copyright"></i></span><span class="pcoded-mtext">Ahmad Alkhen</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu nav-additional">
                    <a  class="nav-link "><span class="pcoded-micon"><i class="fa fa-envelope"></i></span><span class="pcoded-mtext">ahmad.alkhen.sy@gmail.com</span></a>
                </li>


            </ul>
        </div>
    </div>
</nav>
