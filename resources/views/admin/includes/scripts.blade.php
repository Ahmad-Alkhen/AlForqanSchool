
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>

<!-------------------------------- https://datatables.net/extensions/responsive/examples/display-types/bootstrap5-modal.html   ----------------------------*/
------------------------------ datatable ---------------------------------- -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>


<script src="{{asset('assets/js/select2.min.js')}}"></script>

<!-- -------------------------- input select search ------------------------------- -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> -->


<script>
    $("#select-booking").select2( {
        placeholder: "Select The Booking",
        allowClear: true
    } );

</script>

<script>
    //--------------- Data Table for all table -----------------//
   $(document).ready(function() {
       $('#admin-table').DataTable();
       $('#students-table').DataTable();
       $('#points-table').DataTable();
       $('#homework-table').DataTable();

   } );
</script>




<script>
    //show message after click inside table info homework
    $(document).ready(function() {
        $('.info').click(function() {
          alert( $(this).text() );
        });
    });


 /*   $('#customers-table').dataTable( {
        "language": {
            "search": "البحث",

        }
    } );
*/
</script>


