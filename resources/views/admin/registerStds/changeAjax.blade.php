@isset($regUsers)
    @foreach($regUsers as $regUser)
        <tr id="{{'regStd'.$regUser->id}}">
            <th scope="row">{{$regUser->user->id}}</th>
            <td>{{$regUser->user->name}}</td>
            <td>
                <a class="btn" onclick="click_btn_delete({{$regUser->id}})" title="حذف" > <i class="feather icon-x-circle"></i></a>
            </td>
        </tr>
    @endforeach
@endisset

<script>
    function click_btn_delete(id){
        WRN_PROFILE_DELETE = "هل تريد تأكيد الحذف؟ ";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {

            $.ajax({
                type: "POST",
                url: "{{route('admin.registerStd.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':id
                },
                success: function(response) {
                    // remove deleted times rows
                    $("#regStd"+id).remove();
                }
            });
        }
    }


</script>
