@extends('admin.template')
@section('title','الطلاب')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}"> الطلاب</a></li>
@endsection

@section('content-template')
    <div class="card">
        <table class="table table-striped table-hover" id="students-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الطالب</th>
                <th scope="col">الحساب</th>
                <th scope="col">العنوان</th>
                <th scope="col">الهاتف</th>
                <th scope="col">الميلاد</th>
                <th scope="col">الحالة</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($users)
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->active==1? 'نشط' :'غير نشط'}}</td>
                        <td>
                            <a onclick="return confirm('هل تريد تأكيد الحذف؟')" href="{{route('admin.user.delete',$user->id)}}" title="حذف" > <i class="feather icon-x-circle"></i></a>
                            <a href="{{route('admin.user.edit',$user->id)}}" title="تعديل"> <i class="feather icon-edit"></i></a>
                        </td>

                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

@endsection
