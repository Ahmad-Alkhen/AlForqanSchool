@extends('admin.template')
@section('title','الطلاب في الصفوف')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.registerStd.index')}}"> الطلاب في الصفوف</a></li>
@endsection

@section('content-template')
    <div class="card">
        <div class="input-group mb-3">
            <label for="adminName" class="col-sm-2 col-form-label">اسم الصف</label>
            <select id='select_register' onchange="select_register()" name="register_id" class="select2 form-control" required>
                <option value="" disabled selected> اختر الصف المناسب </option>
                @isset($registers)
                    @foreach($registers as $register)
                        <option value="{{$register->id}}">{{$register->name}} </option>
                    @endforeach
                @endisset

            </select>
            @error('register_id')
            <div class="alert alert-danger error_mes">{{ $message }}</div>
            @enderror
        </div>
        <table class="table table-striped table-hover " id="">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الطالب</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody id="tbody_regStd">

            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function select_register() {
            // alert( this.value );
            // var id = $('.booking-option').val();
            var registerId = $('#select_register').find(":selected").val();
       //  alert(registerId)
          $.ajax({
                    type: "POST",
                    url: "{{route('admin.registerStd.change')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'registerId': registerId
                },
                success: function (response) {

                    $('#tbody_regStd').html(response)


                }
        });
        }
    </script>

@endsection
