@extends('admin.template')
@section('title','السجلات')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.register.index')}}"> السجلات</a></li>
@endsection

@section('content-template')
    @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
    <div class="card">
        <table class="table table-striped table-hover " id="customers-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">السجل</th>
                <th scope="col">المشرف</th>
                <th scope="col">التاريخ</th>
                <th scope="col">الحالة</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($registers)
                @foreach($registers as $register)
                    <tr>
                        <th scope="row">{{$register->id}}</th>
                        <td>{{$register->name}}</td>
                        <td>{{$register->admin->name}}</td>
                        <td>{{$register->date}}</td>
                        <td>{{$register->active==1? 'نشط' :'غير نشط'}}</td>
                        <td>
                            <a onclick="return confirm('هل تريد تأكيد الحذف؟')" href="{{route('admin.register.delete',$register->id)}}" title="حذف"> <i class="feather icon-x-circle"></i></a>
                            <a href="{{route('admin.register.edit',$register->id)}}" title="تعديل" > <i class="feather icon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

    @else
    <div class="card">
        <table class="table table-striped table-hover " id="customers-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">السجل</th>
                <th scope="col">التاريخ</th>
                <th scope="col">الحالة</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($registers)
                @foreach($registers as $register)
                    <tr>
                        <th scope="row">{{$register->id}}</th>
                        <td>{{$register->name}}</td>
                        <td>{{$register->date}}</td>
                        <td>{{$register->active==1? 'نشط' :'غير نشط'}}</td>
                        <td>
                            <a href="{{route('admin.register.delete',$register->id)}}" title="حذف"> <i class="feather icon-x-circle"></i></a>
                            <a href="{{route('admin.register.edit',$register->id)}}" title="تعديل" > <i class="feather icon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>
    @endif
@endsection
