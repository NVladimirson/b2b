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
    <h1 class="h3 mb-2 text-gray-800">{{$product->name->name}}</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">@lang('product.show.product_information.title')</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">@lang('product.show.product_information.id')</div>
                                <div class="col-8 themed-grid-col">{{$product->id}}</div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-4 themed-grid-col">@lang('product.show.product_information.article')</div>
                                <div class="col-8 themed-grid-col">{{$product->article}}</div>
                                </div>

                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                                    <h6 class="m-0 font-weight-bold text-primary">@lang('product.show.product_options.title')</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                @forelse($product_options as $product_option)
                                <div class="row mb-3">
                                <div class="col-6 themed-grid-col">{{$product_option['option']}}</div>
                                <div class="col-6 themed-grid-col">{{$product_option['value']}}</div>
                                </div>
                                @empty
                                @endforelse
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
                                    <h6 class="m-0 font-weight-bold text-primary">@lang('product.show.product_storages.title')</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                
                                @foreach($storage_products as $storage_product)
                                <div class="row mb-3">
                                <div class="col-2 themed-grid-col">
                                @if(isset($storage_name_infos[$storage_product['storage_id']]))
                                {{$storage_name_infos[$storage_product['storage_id']].' ('.$storage_product['amount'].'/1000)'}}
                                @else
                                ?
                                @endif
                                </div>
                                <div class="col-8 themed-grid-col">
                                    {{--$storage_product['amount']--}}
                                    <h4 class="small font-weight-bold">@lang('product.show.product_storages.amount')<span
                                            class="float-right">
                                        @php $percent = floor($storage_product['amount'] / 1000 * 100) @endphp
                                            @if($percent < 1)
                                            <1%!
                                            @elseif($percent > 100)
                                            1000+
                                            @else
                                            {{floor($storage_product['amount'] / 1000 * 100).'%'}}
                                            @endif
                                        </span></h4>
                                    <div class="progress">
                                        <!-- <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div> -->
                                            
                                            @if($percent < 1)

                                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            
                                            @elseif($percent > 100)
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>

                                            @else
                                                @if($percent > 80)
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent}}%"
                                                
                                                aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" placeholder="{{$storage_product['amount']}}"></div>

                                                @elseif($percent < 80 && $percent > 60)
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$percent}}%"
                                                    aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" placeholder="{{$storage_product['amount']}}"></div>

                                                @elseif($percent < 60 && $percent > 40)
                                                    <div class="progress-bar bg-bar" role="progressbar" style="width: {{$percent}}%"
                                                    aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" placeholder="{{$storage_product['amount']}}"></div>

                                                @elseif($percent < 40 && $percent > 20)
                                                    <div class="progress-bar bg-bar" role="progressbar" style="width: {{$percent}}%"
                                                    aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" placeholder="{{$storage_product['amount']}}"></div>

                                                    @else
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$percent}}%"
                                                    aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" placeholder="{{$storage_product['amount']}}"></div>

                                                @endif
                                            @endif
       
                                    </div>
                                </div>
                                <div class="col-2 themed-grid-col">
                                    <div class="row">
                                    <div class="col-6 themed-grid-col text-center">
                                    <h4 class="small font-weight-bold">@lang('product.show.product_storages.add_to_cart')</h4>
                                    @can('able_to_order')
                                    <a href='#'><i class="fas fa-plus"></i></a>
                                    @else
                                    <i class="fas fa-plus"></i>
                                    @endcan
                                    </div>
                                    <div class="col-6 themed-grid-col text-center">
                                    <h4 class="small font-weight-bold">@lang('product.show.product_storages.add_to_wishlist')</h4>
                                    @can('able_to_order')
                                    <a href='#'><i class="fas fa-plus"></i></a>
                                    @else
                                    <i class="fas fa-plus"></i>
                                    @endcan
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                @endforeach
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
