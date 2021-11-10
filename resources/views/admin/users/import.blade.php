@extends('admin.template')
@section('title','إضافة طلاب')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">  الطلاب  </a></li>
    <li class="breadcrumb-item"><a href=""> إضافة طلاب</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
            <div class="mb-5">
                <h5 class="alert alert-warning "> <i> &#10003;</i>
                    لتحميل ملف نموذجي لرفع الطلاب انقر <a href="{{route('admin.user.download')}}">هنا</a></h5>
                <h6 class="alert alert-warning">ملاحظة جميع الحقول مطلوبة </h6>
            </div>
         <form action="{{route('admin.user.upload')}}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="input-group mb-3">
                <label for="usersFile" class="col-sm-2 col-form-label">اخر الملف: </label>
                <input id='usersFile' name="import" type="file" class="form-control" placeholder="" required>
                @error('import')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary shadow-2 mb-4">  <span class="fa fa-users"></span> حفظ </button>
         </form>
            <h6 class="alert alert-warning">في حقل active  يتم وضع القيمة 0 لجعل الطالب غير مفعل والقيمة 1 لجعل الطالب مفعل  </h6>

        </div>

    </div>

@endsection
