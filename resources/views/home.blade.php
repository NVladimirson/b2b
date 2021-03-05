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
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@lang('home.dashboard')</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>@lang('home.generate_report')</a>
                </div>
                <div class="row">
                    <div class="col-3">                
                        @can('able_to_order')
                        <div class="text-success">
                Able To Order
                @else
                <div class="text-danger">
                Not Able to Order
                @endcan</div></div>
                <div class="col-3">                
                        @can('able_to_manage_orders')
                        <div class="text-success">
                Able To Manage Storages
                @else
                <div class="text-danger">
                Not Able to Manage Storages
                @endcan</div></div>
                                    <div class="col-3">                
                        @can('able_to_manage_content_storages')
                        <div class="text-success">
                Able To Content Storages
                @else
                <div class="text-danger">
                Not Able to Content Storages
                @endcan</div></div>
                <div class="col-3">                
                        @can('admin')
                        <div class="text-success">
                Able To Order
                @else
                <div class="text-danger">
                Not Able to Admin
                @endcan</div></div>
                </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
@endsection
