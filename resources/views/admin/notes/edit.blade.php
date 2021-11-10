@extends('admin.template')
@section('title','تعديل الملاحظة')
@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.note.index')}}">  الملاحظة  </a></li>
    <li class="breadcrumb-item"><a > تعديل ملاحظة الطالب </a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="card-body text-center">
            <form action="{{route('admin.note.update',$note->id)}}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <label for="note_student" class="col-sm-2 col-form-label">اسم الطالب</label>
                    <select id="note_student" name="user_id" class="select2 form-control" required>
                        <option value="" disabled selected> اختر الطالب  </option>
                        @isset($users)
                            @foreach($users as $user)
                                <option value="{{$user->id}}"  @if(isset($note->user->id)){{($user->id==$note->user->id)?'selected':'' }}@endif>{{$user->name}} </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('user_id')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <label for="note_text" class="col-sm-2 col-form-label">الملاحظة</label>
                    <textarea id='note_text' name="note" type="text" class="form-control" placeholder="الملاحظة" required>{{$note->note}} </textarea>
                    @error('note')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror
                </div>


                <button class="btn btn-primary shadow-2 mb-4">  <span class="feather icon-edit auth-icon"></span> تعديل </button>

            </form>

        </div>

    </div>

@endsection
