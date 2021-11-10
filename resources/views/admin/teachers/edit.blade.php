@extends('admin.template')
@section('title','تعديل معلومات المشرف')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">  المشرفون  </a></li>
    <li class="breadcrumb-item"><a > تعديل معلومات المشرف</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
            <form action="{{route('admin.update',$admin->id)}}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <label for="adminName" class="col-sm-2 col-form-label">الاسم الكامل</label>
                    <input id='adminName' name="name" type="text" class="form-control" placeholder="الاسم الكامل" value="{{$admin->name}}" required>
                    @error('name')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <label for="adminUsername" class="col-sm-2 col-form-label">الحساب</label>
                    <input id='adminUsername' name="user_name" type="text" class="form-control" placeholder="الحساب" value="{{$admin->user_name}}" required>
                    @error('user_name')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <label for="adminPassword" class="col-sm-2 col-form-label">كلمة المرور</label>
                    <input id='adminPassword' name="password" type="password" class="form-control" placeholder="كلمة المرور" required>
                    @error('password')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <label for="adminAddress" class="col-sm-2 col-form-label">العنوان</label>
                    <input id="adminAddress" name="address" type="text" class="form-control" placeholder="العنوان" value="{{$admin->address}}" required>
                    @error('address')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-4">
                    <label for="adminPhone" class="col-sm-2 col-form-label">الجوال</label>
                    <input id="adminPhone" name="phone" type="text" class="form-control" placeholder="الجوال" value="{{$admin->phone}}" required>
                    @error('phone')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="form-group mt-2 adminActive">
                        <input type="checkbox" name="active"
                               id="switcheryColor4"
                               value="1"
                               class="switch" data-color="success"
                               {{($admin->active=='1') ?'checked':''}}/>
                        <label for="switcheryColor4"
                               class="card-title ml-1 ">الحالة </label>
                    </div>
                </div>

                <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-edit auth-icon"></span> حفظ </button>

            </form>

        </div>

    </div>

@endsection
