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
    <h1 class="h3 mb-2 text-gray-800">Order Tables</h1>
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
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>@lang('order.index.table_header.products')</th>
                            <th>@lang('order.index.table_header.shipping')</th>
                            <th>@lang('order.index.table_header.public_no')</th>
                            <th>@lang('order.index.table_header.to_pay')</th>
                            <th>@lang('order.index.table_header.status')</th>
                            <th>@lang('order.index.table_header.date')</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>@lang('order.index.table_header.products')</th>
                            <th>@lang('order.index.table_header.shipping')</th>
                            <th>@lang('order.index.table_header.public_no')</th>
                            <th>@lang('order.index.table_header.to_pay')</th>
                            <th>@lang('order.index.table_header.status')</th>
                            <th>@lang('order.index.table_header.date')</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

</div>

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
                            // <th>Shipping</th>
                            // <th>Public Number</th>
                            // <th>To Pay</th>
                            // <th>Status</th>
                            // <th>Products</th>
      jQuery(function($) {
//           window.table =
//               $('#datatable').DataTable({
//                    scrollY: "100vh",
//                   deferRender: true,
//                   // "language": {
//                   //     "url": "@lang('table.localization_link')",
//                   // },
//                    "scrollX": true,
//                   "pageLength": 25,
//                   "autoWidth": true,
//                   "processing": true,
//                   "serverSide": true,
//                   "ajax": {
//                       "url": "{!! route('orders.datatable') !!}",
//                       "data": {

//                       }
//                   },
//                   "order": [
//                       [1, "asc"]
//                   ],
//                   "columns": [
//                       {
//                          data: 'shipping',
//                       },
//                       {
//                           data: 'public_no',
//                       },
//                       {
//                           data: 'to_pay',
//                       },
//                       {
//                           data: 'status',
//                       },
//                       {
//                           data: 'products',
//                       },
//                       {
//                           data: 'date',
//                       },
//                   ],
//               });

// } );
function details ( d ) {
            return d.products;
        }


        var table = $('#datatable').DataTable( {
        "ajax": "{!! route('orders.datatable') !!}",
        //'processing': true,
        'language': {
            "url": "{{route('dtlocalization')}}",
        },

        // 'language': {
        //     'loadingRecords': '&nbsp;',
        //     'processing': "<div class=\"text-center\"><span class='fa-stack fa-lg'>\n\
        //                     <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>\n\
        //                </span>&emsp;</div>",
        // },

        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<div class="text-center"><i class="fa fa-plus"></i></div>'
            },
            { "data": "shipping" },
            { "data": "public_no" },
            { "data": "to_pay" },
            { "data": "status" },
            { "data": "date" },
        ],
        "order": [[1, 'asc']], 
    } );
     
    // Add event listener for opening and closing details
    $('#datatable tbody').on('click', 'td.details-control', function () {
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
