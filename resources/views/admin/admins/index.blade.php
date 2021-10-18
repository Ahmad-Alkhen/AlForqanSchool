@extends('admin.template')
@section('title','المشرفين')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> المشرفين</a></li>
@endsection

@section('content-template')
    <div class="card">
        <table class="table table-striped table-hover " id="customers-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th scope="col">الحساب</th>
                <th scope="col">العنوان</th>
                <th scope="col">الهاتف</th>
                <th scope="col">الحالة</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($admins)
                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{$admin->id}}</th>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->user_name}}</td>
                        <td>{{$admin->address}}</td>
                        <td>{{$admin->phone}}</td>
                        <td>{{$admin->active==1? 'نشط' :'غير نشط'}}</td>
                        <td><a href="{{route('admin.edit',$admin->id)}}" > <i class="feather icon-edit"></i></a>
                            <a href="{{route('admin.delete',$admin->id)}}" > <i class="feather icon-x-circle"></i></a>
                        </td>
                    </tr>ً
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

@endsection
