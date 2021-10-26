@extends('admin.layout')
@section('title','dashboard')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <!--[ Recent Users ] start-->
                            <!--    <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Recent Users</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{asset('assets/images/user/avatar-1.jpg')}}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Isabella Christensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>11 MAY 12:56</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Mathilde Andersen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{asset('assets/images/user/avatar-3.jpg')}}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Karla Sorensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>9 MAY 17:38</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{asset('assets/images/user/avatar-1.jpg')}}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Ida Jorgensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted f-w-300"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>19 MAY 12:56</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Albert Andersen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply dummy…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>21 July 12:56</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--[ Recent Users ] end-->

                                <!-- [ statistics year chart ] start -->
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-users f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{$admins }}</h3>
                                                    <span class="d-block text-uppercase"> مشرف</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="fa fa-users f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{$users }}</h3>
                                                    <span class="d-block text-uppercase">طلاب</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="fa fa-book f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{$subjects }}</h3>
                                                    <span class="d-block text-uppercase">مواد</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="fa fa-sticky-note f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{$notes }}</h3>
                                                    <span class="d-block text-uppercase">ملاحظات</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ statistics year chart ] end -->


                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
