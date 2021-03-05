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
                    <h1 class="h3 mb-0 text-gray-800">Company Details</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>  </a>
                </div>

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
                                <div class="col-4 themed-grid-col">Company Name</div>
                                <div class="col-8 themed-grid-col">{{$company->name}}</div>
                                </div>



                                


                                </div>
                            </div>
                        </div>
                        </div>


                        @if($company->storages)
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Company Storages</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                        @foreach($company->storages as $storage)


                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">Storage</div>
                                <div class="col-8 themed-grid-col"><a href="route('storage.show', ['id' => $storage['id']])">{{$storage['name']}}</a></div>
                                </div>

                        @endforeach


                        </div>
                            </div>
                        </div>
                        </div>
                        @endif

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
