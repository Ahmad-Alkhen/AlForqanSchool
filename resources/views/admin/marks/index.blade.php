@extends('admin.template')
@section('title','العلامات')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.mark.index')}}"> العلامات</a></li>
@endsection

@section('content-template')
    <div class="card">

        <div class="input-group mb-3">
            <label for="select_register_id" class="col-sm-2 col-form-label">اسم السجل</label>
            <select onchange="get_students()" id="select_register_id" name="register_id" class="select2 form-control" required>
                <option value="" disabled selected> اختر السجل  </option>
                @isset($registers)
                    @foreach($registers as $register)
                        <option value="{{$register->id}}">{{$register->name}} </option>
                    @endforeach
                @endisset

            </select>
        </div>

        <div class="input-group mb-3">
            <label for="select_subject_id" class="col-sm-2 col-form-label">المادة</label>
            <select onchange="get_students()" id="select_subject_id" name="subject_id" class="select2 form-control" required>
                <option value="" disabled selected> اختر المادة  </option>
                @isset($subjects)
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}} </option>
                    @endforeach
                @endisset
            </select>
        </div>


        <table class="table table-striped table-hover " id="marks-table">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col"> الطالب</th>
                <th colspan="2"> الفصل الأول</th>
                <th colspan="2">  الفصل الثاني</th>

            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">الشفهي</th>
                <th scope="col">الوظايف</th>
                <th scope="col">الشفهي</th>
                <th scope="col">الوظايف</th>
            </tr>
            </thead>
            <tbody id="tbody_show_student">

            </tbody>
        </table>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function get_students() {
        // alert( this.value );

        var registerId = $('#select_register_id').find(":selected").val();
        var subjectId = $('#select_subject_id').find(":selected").val();

        if (registerId !== "" && subjectId !== ""){
            $.ajax({
                type: "POST",
                url: "{{route('admin.mark.show_Student')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'registerId': registerId,
                    'subjectId': subjectId,
                },
                success: function (response) {
                    $('#tbody_show_student').html(response)

                }
            });
        }
    }
</script>
