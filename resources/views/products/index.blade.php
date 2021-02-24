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
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Name</th>
                        <th>Article</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Storages</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Name</th>
                          <th>Article</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Storages</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <!-- <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                      </tr> -->
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

      jQuery(function($) {
          window.table =
              $('#datatable').DataTable({
                   scrollY: "100vh",
                  deferRender: true,
                  // "language": {
                  //     "url": "@lang('table.localization_link')",
                  // },
                   "scrollX": true,
                  "pageLength": 25,
                  "autoWidth": true,
                  "processing": true,
                  "serverSide": true,
                  "ajax": {
                      "url": "{!! route('products.datatable') !!}",
                      "data": {

                      }
                  },
                  "order": [
                      [1, "asc"]
                  ],
                  "columns": [
                      {
                         data: 'name',
                      },
                      {
                          data: 'article',
                      },
                      {
                          data: 'description',
                      },
                      {
                          data: 'category',
                      },
                      {
                          data: 'storages',
                      },
                  ],
              });
} );
</script>
