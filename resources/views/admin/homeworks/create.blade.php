@extends('admin.template')
@section('title','إضافة واجب ')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.point.index')}}">  الواجبات المنزلية  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.point.create')}}"> إضافة واجب</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.homework.store')}}" method="post">
             @csrf
             <div class="input-group mb-3">
                     <label for="register_id" class="col-sm-2 col-form-label">السجل</label>
                     <select id="register_id" name="register_id" class="select2 form-control" required>
                         <option value="" disabled selected> اختر اسم السجل </option>
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
                 <label for="homework_info" class="col-sm-2 col-form-label">تفاصيل الواجب</label>
                 <textarea id='homework_info' name="info" type="text" class="form-control" placeholder="تفاصيل الواجب" required></textarea>
                 @error('points')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>


            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
