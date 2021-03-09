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
            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST" >
                @method('PATCH')
                @csrf                <!-- Page Heading -->
                <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">  </h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>  </a>
                </div> -->
                <div class="col-lg-12 mb-4">
                <div class="card-header py-3 text-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Заказано: {{auth()->user()->name}}</h6>
                                </div>

                </div>

                @forelse($order->order_items as $order_item)
                <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{$order_item->storage_product->product->localized_name}}</h6>
                                </div>
                                <div class="card-body">

                                <div class="row text-center">

                                    <div class="col-md-4">
                                        Артикул
                                    </div>

                                    <div class="col-md-8">
                                        {{$order_item->storage_product->product->article}}
                                    </div>

                                </div>

                                <div class="row text-center">

                                    <div class="col-md-4">
                                        Описание
                                    </div>

                                    <div class="col-md-8">
                                        {{$order_item->storage_product->product->description}}
                                    </div>

                                </div>

                                <hr class="sidebar-divider my-0">


                                    <div class="row text-center">
                                            <div class="col-md-2">
                                            ORDER QUANTITY
                                            </div>
                                            <div class="col-md-4">
                                                {{$order_item->quantity}}
                                            </div>

                                            <div class="col-md-2">
                                            STORAGE AMOUNT
                                            </div>
                                            <div class="col-md-4">
                                                {{$order_item->storage_product->amount}}
                                            </div>
                                    </div>
    
                                </div>
                            </div>
                </div>
                @empty
                                        Заказ пуст
                @endforelse
                <div class="col-lg-12 mb-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                        Назад</a>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success   shadow-sm">
                        Принять</a> -->
                        <button class="btn btn-primary">Назад</button>
                        <button type="submit" class="btn btn-success">Принять</button>
                </div>
                </div>
            </form>
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
