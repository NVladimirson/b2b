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
                    <h1 class="h3 mb-0 text-gray-800">@lang('user.header_info')</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>@lang('home.generate_report')</a>
                </div>

                                            <!-- Area Chart -->
                                            <div class="row">
                            <div class="col-xl-12 col-lg-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Primary Info</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">User Name</div>
                                <div class="col-8 themed-grid-col">{{auth()->user()->name}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Role</div>
                                <div class="col-8 themed-grid-col">{{$role}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Company</div>
                                <div class="col-8 themed-grid-col">
                                    <a href="{{ route('company.show', ['id' => $company->id]) }}">{{$company->name}}</a
                                    ></div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Right to Order</div>
                                <div class="col-8 themed-grid-col">{{$permissions['order']}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Right to Manage Orders</div>
                                <div class="col-8 themed-grid-col">{{$permissions['manage_orders']}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Right to Manage Content Storages</div>
                                <div class="col-8 themed-grid-col">{{$permissions['manage_content_storages']}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Right to Administrate</div>
                                <div class="col-8 themed-grid-col">{{$permissions['admin']}}</div>
                                </div>

                                </div>
                            </div>
                        </div>
                        </div>

            </div>
            <!-- /.container-fluid -->

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
