@isset($students)

    @foreach($students as $student)
        <tr class="tbody_marks" data-id="{{$student->user->id}}">
            <th scope="row">{{$student->user->id}}</th>
            <td>{{$student->user->name}}</td>
            <td><input class="form-control recite1" type="number"
                       @if(isset($marks))
                       @foreach($marks as $mark)
                       @if($mark->user_id ==$student->user->id )
                        value="{{$mark->recite1}}"
                       @endif
                     @endforeach
                    @endif/>
            </td>
            <td><input class="form-control activity1" type="number"
                       @if(isset($marks))
                       @foreach($marks as $mark)
                       @if($mark->user_id ==$student->user->id )
                       value="{{$mark->activity1}}"
                    @endif
                    @endforeach
                    @endif/>
            </td>
            <td><input class="form-control recite2" type="number"
                       @if(isset($marks))
                       @foreach($marks as $mark)
                       @if($mark->user_id ==$student->user->id )
                       value="{{$mark->recite2}}"
                    @endif
                    @endforeach
                    @endif/>
            </td>
            <td><input class="form-control activity2" type="number"
                    @if(isset($marks))
                       @foreach($marks as $mark)
                       @if($mark->user_id ==$student->user->id )
                            value="{{$mark->activity2}}"
                        @endif
                        @endforeach
                    @endif/>
            </td>
        </tr>
    @endforeach
    @if(count($students))
        <tr class="tbody_marks">
            <th></th>
            <td></td>
            <td><button id="set_marks_recite1" class="btn btn-success">تحديث</button></td>
            <td><button id="set_marks_activity1" class="btn btn-success">تحديث</button></td>
            <td><button id="set_marks_recite2" class="btn btn-success">تحديث</button></td>
            <td><button id="set_marks_activity2" class="btn btn-success">تحديث</button></td>
        </tr>
    @endif
@endisset

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $('#set_marks_recite1').click(function () {
        WRN_PROFILE_DELETE = "هل تريد تأكيد الحفظ";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var register_id = $('#select_register_id').find(":selected").val();
            var subject_id = $('#select_subject_id').find(":selected").val();
            //var status = 1;
          //  alert(registerId);
           // alert(subjectId);

            //var register_id = $('#register_id').val();
           // var subject_id = $('#subject_id').val();
            var degrees = [];
            var idsStd = [];

            $(".recite1").each(function () {
                degrees.push($(this).val());
                idsStd.push($(this).parent().parent().data('id'));
            });

            $.ajax({
                type: "post",
                url: "{{route('admin.mark.store_recite1')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'register_id': register_id,
                    'subject_id': subject_id,
                    'users_id': idsStd,
                    'degrees': degrees,

                },
                success: function (response) {
                    alert('تم الحفظ');
                }
            });
        }
    });

    $('#set_marks_activity1').click(function () {
        WRN_PROFILE_DELETE = "هل تريد تأكيد الحفظ";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var register_id = $('#select_register_id').find(":selected").val();
            var subject_id = $('#select_subject_id').find(":selected").val();

            var degrees = [];
            var idsStd = [];

            $(".activity1").each(function () {
                degrees.push($(this).val());
                idsStd.push($(this).parent().parent().data('id'));
            });

            $.ajax({
                type: "post",
                url: "{{route('admin.mark.store_activity1')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'register_id': register_id,
                    'subject_id': subject_id,
                    'users_id': idsStd,
                    'degrees': degrees,

                },
                success: function (response) {
                    alert('تم الحفظ');
                }
            });
        }
    });

    $('#set_marks_recite2').click(function () {
        WRN_PROFILE_DELETE = "هل تريد تأكيد الحفظ";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var register_id = $('#select_register_id').find(":selected").val();
            var subject_id = $('#select_subject_id').find(":selected").val();

            var degrees = [];
            var idsStd = [];

            $(".recite2").each(function () {
                degrees.push($(this).val());
                idsStd.push($(this).parent().parent().data('id'));
            });

            $.ajax({
                type: "post",
                url: "{{route('admin.mark.store_recite2')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'register_id': register_id,
                    'subject_id': subject_id,
                    'users_id': idsStd,
                    'degrees': degrees,

                },
                success: function (response) {
                    alert('تم الحفظ');
                }
            });
        }
    });

    $('#set_marks_activity2').click(function () {
        WRN_PROFILE_DELETE = "هل تريد تأكيد الحفظ";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var register_id = $('#select_register_id').find(":selected").val();
            var subject_id = $('#select_subject_id').find(":selected").val();
            //var status = 1;
            //  alert(registerId);
            // alert(subjectId);

            //var register_id = $('#register_id').val();
            // var subject_id = $('#subject_id').val();
            var degrees = [];
            var idsStd = [];

            $(".activity2").each(function () {
                degrees.push($(this).val());
                idsStd.push($(this).parent().parent().data('id'));
            });

            $.ajax({
                type: "post",
                url: "{{route('admin.mark.store_activity2')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'register_id': register_id,
                    'subject_id': subject_id,
                    'users_id': idsStd,
                    'degrees': degrees,

                },
                success: function (response) {
                    alert('تم الحفظ');
                }
            });
        }
    });

</script>
