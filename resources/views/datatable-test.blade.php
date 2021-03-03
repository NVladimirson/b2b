@extends('layouts.main')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    @include('includes.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          @include('includes.topbar')

            <!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

</div>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebarRight">


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading" style="text-align: center; font-size: 14px">
      Categories
  </div>


    <div class="bg-white py-2 collapse-inner rounded" style="height : 20%;overflow : scroll">
      <div id="category_data_div"></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading" style="text-align: center; font-size: 14px">
        Options
    </div>

    <div class="bg-white py-2 collapse-inner rounded" style="height : 20%;overflow : scroll">
      <div id="option_data_div"></div>
    </div> -->

  {{--
    @if(isset($categories_widget))
  @foreach(\Cache::get('category_widget_info') as $key => $value)
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$key}}"
          aria-expanded="true" aria-controls="collapse{{$key}}">
          <i class="fas fa-fw fa-folder"></i>
          <span>{{$value['info'][$language]['name']}}</span>
      </a>
      <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @if(isset($value['childs']))
              @foreach($value['childs'] as $childkey => $childs)
                  <a class="collapse-item" href="#">{{$childs['info'][$language]['name']}}</a>
              @endforeach
            @endif
          </div>
      </div>
  </li>
  @endforeach
  @endif
--}}


</ul>

</div>

<!-- End of Main Content -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/assets/plugins/jstree/dist/jstree.min.js"></script>
  <script src="/assets/plugins/jstree/dist/jstree.js"></script>
  <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>

  <script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
  <script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
  <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>

  <script>

/* Formatting function for row details - modify as you need */
function details ( d ) {
    // `d` is the original data object for the row
    // return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
    //     '<tr>'+
    //         '<td>Full name:</td>'+
    //         '<td>'+d.name+'</td>'+
    //     '</tr>'+
    //     '<tr>'+
    //         '<td>Extension number:</td>'+
    //         '<td>'+d.extn+'</td>'+
    //     '</tr>'+
    //     '<tr>'+
    //         '<td>Extra info:</td>'+
    //         '<td>And any further details here (images etc)...</td>'+
    //     '</tr>'+
    // '</table>';
    return d.storages;
}
 
jQuery(function($) {
    var table = $('#example').DataTable( {
        "ajax": "{!! route('test_ajax') !!}",
        // "columns": [
        //     {
        //         "className":      'details-control',
        //         "orderable":      false,
        //         "data":           null,
        //         "defaultContent": '<div class="text-center"><i class="fa fa-plus"></i></div>'
        //     },
        //     { "data": "name" },
        //     { "data": "position" },
        //     { "data": "office" },
        //     { "data": "salary" }
        // ],
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<div class="text-center"><i class="fa fa-plus"></i></div>'
            },
            { "data": "name" },
            { "data": "article" },
            { "data": "description" },
            { "data": "category" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( details(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

</script>
