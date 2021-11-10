@extends('admin.template')
@section('title','تغيير كلمة المرور')
@section('route-list')
    <li class="breadcrumb-item"><a href=""> تغيير كلمة المرور</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.account.password.update')}}" method="post">
             @csrf
            <div class="input-group mb-3">
                <label for="passwordOld" class="col-sm-2 col-form-label">كلمة المرور القديمة</label>
                <input id='passwordOld' name="passwordOld" type="text" class="form-control" placeholder="كلمة المرور القديمة" required>
                @error('passwordOld')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label for="passwordNew" class="col-sm-2 col-form-label">كلمة المرور الجديدة</label>
                <input id='passwordNew' name="passwordNew" type="text" class="form-control" placeholder="كلمة المرور الجديدة" required>
                @error('passwordNew')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label for="passwordConfirm" class="col-sm-2 col-form-label">تأكيد كلمة المرور </label>
                <input id='passwordConfirm' name="passwordConfirm" type="text" class="form-control" placeholder="تأكيد كلمة المرور" required>
                @error('passwordConfirm')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary shadow-2 mb-4">  <span class="fa fa-edit">&nbsp; </span> تعديل </button>

         </form>

        </div>

    </div>

@endsection
