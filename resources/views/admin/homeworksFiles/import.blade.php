@extends('admin.template')
@section('title','إضافة ملف واجب ')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.homeworksFile.index')}}"> ملفات الواجبات المنزلية  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.homeworksFile.import')}}"> إضافة ملف واجب</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.homeworksFile.upload')}}" method="post" enctype="multipart/form-data">
             @csrf
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
                 <label for="homework_info" class="col-sm-2 col-form-label">اختر الملف</label>
                 <input id='homework_info' name="file" type="file" class="form-control" placeholder=" " required></input>
                 @error('file')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                 @enderror
             </div>


            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
