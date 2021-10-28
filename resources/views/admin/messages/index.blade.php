@extends('admin.template')
@section('title','الرسائل')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.message.index')}}"> الرسائل</a></li>
@endsection

@section('content-template')
    <div class="card">

        <table class="table table-striped table-hover " id="message-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">المرسل</th>
                <th scope="col">الحساب المرسل </th>
                <th scope="col">الموضوع </th>
                <th scope="col">الرسالة </th>
                <th scope="col">التاريخ </th>
            </tr>
            </thead>
            <tbody>
            @isset($messages)
                @foreach($messages as $message)
                    <tr>
                        <th scope="row">{{$message->id}}</th>
                        <td>{{$message->sender}}</td>
                        <td>@if(isset($message->user->name)){{$message->user->name}} @endif</td>
                        <td>{{$message->subject}}</td>
                        <td class="message">{{$message->message}}</td>
                        <td>{{$message->date}}</td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

@endsection

