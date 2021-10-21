@extends('admin.template')
@section('title','الملاحظات')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.note.index')}}"> الملاحظات</a></li>
@endsection

@section('content-template')
    <div class="card">
        <table class="table table-striped table-hover " id="customers-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الطالب</th>
                <th scope="col">الملاحظة</th>
                <th scope="col">التاريخ</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($notes)
                @foreach($notes as $note)
                    <tr>
                        <th scope="row">{{$note->id}}</th>
                        <td>{{$note->user->name}}</td>
                        <td>{{$note->note}}</td>
                        <td>{{$note->date}}</td>
                        <td>
                            <a href="{{route('admin.note.delete',$note->id)}}" title="حذف"> <i class="feather icon-x-circle"></i></a>
                            <a href="{{route('admin.note.edit',$note->id)}}" title="تعديل" > <i class="feather icon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

@endsection
