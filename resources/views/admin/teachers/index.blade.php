@extends('admin.template')
@section('title','المشرفين')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> المشرفين</a></li>
@endsection

@section('content-template')
    <div class="card">
        @livewire('admin.teacher')
    </div>


@endsection
