@extends('admin.template')
@section('title','إضافة طالب')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">  الطلاب  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.user.create')}}"> إضافة طالب</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.user.store')}}" method="post">
             @csrf

            <div class="input-group mb-3">
                <label for="adminName" class="col-sm-2 col-form-label">الاسم الكامل</label>
                <input id='adminName' name="name" type="text" class="form-control" placeholder="الاسم الكامل" required>
                @error('name')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                 <label for="adminUsername" class="col-sm-2 col-form-label">الحساب</label>
                 <input id='adminUsername' name="user_name" type="text" class="form-control" placeholder="الحساب" required>
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
                <input id="adminAddress" name="address" type="text" class="form-control" placeholder="العنوان" required>
                @error('address')
                <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-4">
                <label for="adminPhone" class="col-sm-2 col-form-label">الهاتف</label>
                <input id="adminPhone" name="phone" type="text" class="form-control" placeholder="الهاتف" required>
                @error('phone')
                <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
             <div class="input-group mb-4">
                 <label for="adminPhone" class="col-sm-2 col-form-label">تاريخ الميلاد</label>
                 <input id="adminPhone" name="birthday" type="date" class="form-control"  required>
                 @error('birthday')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>
             <div class="input-group mb-3">
                 <div class="form-group mt-2 adminActive">
                     <input type="checkbox" name="active"
                            id="switcheryColor4"
                            value="1"
                            class="switch" data-color="success"
                            checked/>
                     <label for="switcheryColor4"
                            class="card-title ml-1 ">الحالة </label>
                 </div>
             </div>

            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-user-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
