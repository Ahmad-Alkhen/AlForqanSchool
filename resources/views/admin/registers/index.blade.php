@extends('admin.template')
@section('title','السجلات')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.register.index')}}"> السجلات</a></li>
@endsection

@section('content-template')
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

@endsection
