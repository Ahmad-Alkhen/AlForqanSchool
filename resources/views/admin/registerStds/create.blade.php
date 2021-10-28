@extends('admin.template')
@section('title','إضافة طلاب إلى الصف')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.register.index')}}">  الطلاب في الصفوف  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.register.create')}}"> إضافة طلاب إلى الصف</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.registerStd.store')}}" method="post">
             @csrf

            <div class=" input-group mb-3">
                <div class="col-3">
                    <label for="adminName" class=" col-form-label">اسم الصف</label>
                </div>
                <div class="col-9">
                    <select name="register_id" class=" select2 form-control" required>
                        <option value="" disabled selected> اختر الصف المناسب </option>
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
            </div>

            <div class="  input-group mb-3">
                    <div class="col-3">
                         <label for="adminName" class=" col-form-label">الطلاب</label>
                    </div>
                    <div class="col-9">
                        <select id="select-student" name="user_id[]" class="select2 form-control"  multiple>
                            <optgroup label="اسم الطالب ">
                                @isset($users)
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} </option>
                                    @endforeach
                                @endisset
                            </optgroup>
                        </select>
                        @error('user_id')
                         <div class="alert alert-danger error_mes">{{ $message }}</div>
                        @enderror
                    </div>
             </div>

            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
