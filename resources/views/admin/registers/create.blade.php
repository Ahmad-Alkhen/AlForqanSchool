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
                <div class="col-3">
                    <label for="adminName" class=" col-form-label">اسم السجل</label>
                </div>
                <div class="col-9">
                    <input id='adminName' name="name" type="text" class="form-control" placeholder="مثال : سابع أولى 2020" required>
                    @error('name')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
            </div>

             @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
             <div class=" input-group mb-3">
                 <div class="col-3">
                     <label for="adminName" class=" col-form-label">اسم المشرف</label>
                 </div>
                 <div class="col-9">
                     <select id="adminName" name="admin_id" class=" select2 form-control" required>
                         <option value="" disabled selected> اختر المشرف  </option>
                         @isset($admins)
                             @foreach($admins as $admin)
                                 <option value="{{$admin->id}}">{{$admin->name}} </option>
                             @endforeach
                         @endisset
                     </select>
                     @error('admin_id')
                     <div class="alert alert-danger error_mes">{{ $message }}</div>
                     @enderror
                 </div>
             </div>
             @endif

             <div class="input-group mb-3">
                 <div class="col-3">
                     <label for="adminUsername" class=" col-form-label">التاريخ</label>
                 </div>

                 <div class="col-9">
                     <input id='adminUsername' name="date" type="date" class="form-control" placeholder="" required value="{{date('Y-m-d')}}">
                     @error('date')
                     <div class="alert alert-danger error_mes">{{ $message }}</div>
                     @enderror
                 </div>
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
