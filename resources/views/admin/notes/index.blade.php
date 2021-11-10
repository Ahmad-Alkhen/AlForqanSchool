@extends('admin.template')
@section('title','الملاحظات')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.note.index')}}"> الملاحظات</a></li>
@endsection

@section('content-template')
    <div class="card">
        <table class="table table-striped table-hover " id="notes-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الطالب</th>
                <th scope="col">الملاحظة</th>
                <th scope="col">التاريخ</th>
            @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
                <th scope="col">المشرف</th>
                <th scope="col">الحالة</th>
            @endif
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($notes)
                @foreach($notes as $note)
                    <tr>
                        <th scope="row">{{$note->id}}</th>
                        <td>@isset($note->user->name){{$note->user->name}}@endisset</td>
                        <td>{{$note->note}}</td>
                        <td>{{$note->date}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
                        <td>@if(isset($note->admin->name)){{$note->admin->name}}@endif</td>
                        <td id="{{'tdActive'.$note->id}}" >{{$note->active=='1'? 'مفعلة':'غير مفعلة'}}</td>
                    @endif
                        <td>
                            <a onclick="return confirm('هل تريد تأكيد الحذف؟')" href="{{route('admin.note.delete',$note->id)}}" title="حذف"> <i class="feather icon-x-circle"></i></a>
                            <a href="{{route('admin.note.edit',$note->id)}}" title="تعديل" > <i class="feather icon-edit"></i></a>
                        @if(\Illuminate\Support\Facades\Auth::user()->permission=='1')
                              <a  class="note_active"  data-id="{{$note->id}}"  title="تفعيل" > <i class="feather icon-check"></i></a>
                        @endif
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>


@endsection
