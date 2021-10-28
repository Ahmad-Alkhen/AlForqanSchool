@extends('admin.template')
@section('title','إضافة نقاط')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.point.index')}}">  النقاط  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.point.create')}}"> إضافة نقاط</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.point.store')}}" method="post">
             @csrf

             <div class="input-group mb-3">
                 <label for="uesr_name" class="col-sm-2 col-form-label">اسم الطالب</label>
                 <select id="uesr_name" name="user_id" class="select2 form-control" required>
                     <option value="" disabled selected> اختر اسم الطالب </option>
                     @isset($users)
                         @foreach($users as $user)
                             <option value="{{$user->id}}">{{$user->name}} </option>
                         @endforeach
                     @endisset
                 </select>

                 @error('user_id')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>
             <div class="input-group mb-3">
                     <label for="register_id" class="col-sm-2 col-form-label">الصف</label>
                     <select id="register_id" name="register_id" class="select2 form-control" required>
                         <option value="" disabled selected> اختر اسم الصف </option>
                         @isset($registers)
                             @foreach($registers as $register)
                                 <option value="{{$register->id}}">{{$register->name}} </option>
                             @endforeach
                         @endisset
                     </select>
                 @error('register_id')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>
             <div class="input-group mb-3">
                 <label for="points" class="col-sm-2 col-form-label">النقاط</label>
                 <input id='points' name="points" type="number" class="form-control" placeholder="0" required>
                 @error('points')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>
             <div class="input-group mb-3">
                 <label for="points" class="col-sm-2 col-form-label">معلومات إضافية</label>
                 <input id='points' name="info" type="text" class="form-control" placeholder="معلومات إضافية" >
                 @error('info')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>

            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
