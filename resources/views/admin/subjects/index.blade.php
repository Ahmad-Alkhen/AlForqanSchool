@extends('admin.template')
@section('title','المواد')

@section('route-list')
    <li class="breadcrumb-item"><a href="{{route('admin.subject.index')}}"> المواد</a></li>
@endsection

@section('content-template')
    <div class="card">

        <div class="card-body text-center">
            <form  method="post" action="{{route('admin.subject.store')}}">
                @csrf
                <div class="input-group mb-3">
                    <label for="subject_name" class="col-sm-2 col-form-label">اسم المادة</label>
                    <input id='subject_name' name="subject" type="text" class="form-control col-sm-4" placeholder="اسم المادة" required>
                    @error('subject')
                    <div class="alert alert-danger error_mes">{{ $message }}</div>
                    @enderror

                     <button  class="btn btn-primary shadow-2 mr-5 ">  <span class="feather icon-plus auth-icon"></span> حفظ </button>
                </div>
            </form>

        </div>


    <!--    <div align="right">
            <button type="button" name="add" id="add_data" class="btn btn-success btn-sm"> إضافة</button>
        </div>
    -->
        <table class="table table-striped table-hover " id="">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">المادة</th>
                <th scope="col">النشاط</th>
            </tr>
            </thead>
            <tbody>
            @isset($subjects)
                @foreach($subjects as $subject)
                    <tr id="{{'subject_rec'.$subject->id}}">
                        <th scope="row">{{$subject->id}}</th>
                        <td>{{$subject->name}}</td>
                        <td>
                            <a class="btn" onclick="click_btn_delete({{$subject->id}})" title="حذف"  > <i class="feather icon-x-circle"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

  <!--  <div id="subjectModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="get" id="subject_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">إضافة مادة</h4>
                    </div>
                    <div class="modal-body">
                          @csrf
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>ادخل اسم المادة</label>
                            <input type="text" name="subject" id="subject" class="form-control" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="button_action" id="button_action" value="insert" />
                        <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
-->
    <script>

        function click_btn_delete(id){
            //WRN_PROFILE_DELETE = "هل تريد تأكيد حذف العنصر";
            // var checked = confirm(WRN_PROFILE_DELETE);
            //if(checked == true) {

            $.ajax({
                type: "post",
                url: "{{route('admin.subject.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':id
                },
                success: function(response) {
                    // remove deleted times rows
                    $("#subject_rec"+id).remove();
                }
            });
            // }
        }

    </script>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#add_data').click(function(){
                $('#subjectModal').modal('show');
                $('#subject_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
            });

            $('#subject_form').on('submit', function(event){

                $.ajax({
                    type: "get",
                    url: "{{route('admin.subject.store')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'subject':subject
                    },
                    success: function(response) {

                       // $("#subject_rec"+id).remove();

                    }
                });

            });

        });
    </script>
    -->
@endsection

