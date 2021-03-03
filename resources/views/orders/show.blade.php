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
    <h1 class="h3 mb-2 text-gray-800">Order #{{$order->public_number}}</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                            <!-- Area Chart -->
                            <div class="row">
                            <div class="col-xl-12 col-lg-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">Public Number</div>
                                    <div class="col-8 themed-grid-col">{{$order->public_number}}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">Status</div>
                                    <div class="col-8 themed-grid-col">{{$order->status}}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">To Pay</div>
                                    <div class="col-8 themed-grid-col">{{$order->to_pay}}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">Shipping</div>
                                    <div class="col-8 themed-grid-col">{{$order->shipping}}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">Date</div>
                                    <div class="col-8 themed-grid-col">{{$order->created_at}}</div>
                                </div>


                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Order Products</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Name</div>
                                <div class="col-8 themed-grid-col">Quantity</div>
                                </div>
                                @forelse($order->order_items_info as $item_info)
                                <div class="row mb-3">
                                    <div class="col-4 themed-grid-col">
                                        <a href="{{ route('product.show', ['id' => $item_info['product_id']  ])}}">{{$item_info['name']}}</a>
                                        </div>
                                    <div class="col-8 themed-grid-col">{{$item_info['quantity']}}</div>
                                </div>
                                @empty
                                There is None...
                                @endforelse
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Product Order Statistics</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <!-- <div class="row mb-3">
                                <div class="col-4 themed-grid-col">.col-4</div>
                                <div class="col-8 themed-grid-col">.col-8</div>
                                </div> -->
                                </div>
                            </div>
                        </div>
                        </div>

</div>
<!-- /.container-fluid -->

</div>

</div>


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
