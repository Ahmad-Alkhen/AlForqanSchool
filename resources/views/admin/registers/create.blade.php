@extends('admin.template')
@section('title','إضافة سجل')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.register.index')}}">  السجلات  </a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.register.create')}}"> إضافة سجل</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
         <form action="{{route('admin.register.store')}}" method="post">
             @csrf

            <div class="input-group mb-3">
                <label for="adminName" class="col-sm-2 col-form-label">اسم السجل</label>
                <input id='adminName' name="name" type="text" class="form-control" placeholder="مثال : سابع أولى" required>
                @error('name')
                 <div class="alert alert-danger error_mes">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                 <label for="adminUsername" class="col-sm-2 col-form-label">التاريخ</label>
                 <input id='adminUsername' name="date" type="date" class="form-control" placeholder="" required value="{{date('Y-m-d')}}">
                 @error('date')
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

            <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-plus auth-icon"></span> حفظ </button>

         </form>

        </div>

    </div>

@endsection
