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

        <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel">Modal Header</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="form_add_orders" action="{{ route('order.store') }}" method="POST">
                            @csrf
                        <div class="modal-body">
                            <div id="orderModal_inputs">


 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Добавить ещё</button>
                            <!-- <a class="btn btn-primary" href="#">Подтвердить заказ</a> -->
                            <button type="submit" class="btn btn-primary btn-add-order">Подтвердить заказ</button>
                        </div>
                        </form>
                    </div>
                </div>
        </div>


        <form id="order-create" action="{{ route('order.store') }}" method="POST" class="d-none">
            @csrf
        </form>
    <!-- Page Heading -->
    
    <div id="status" class="mb-4">

    </div>

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
                        <th>@lang('product.index.table_header.storages')</th>
                        <th>@lang('product.index.table_header.name')</th>
                        <th>@lang('product.index.table_header.article')</th>
                        <th>@lang('product.index.table_header.description')</th>
                        <th>@lang('product.index.table_header.categories')</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>@lang('product.index.table_header.storages')</th>
                          <th>@lang('product.index.table_header.name')</th>
                          <th>@lang('product.index.table_header.article')</th>
                          <th>@lang('product.index.table_header.description')</th>
                          <th>@lang('product.index.table_header.categories')</th>
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

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebarRight">


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading" style="text-align: center; font-size: 14px">
      Categories
  </div>


    <div class="bg-white py-2 collapse-inner rounded" style="height : 70%;overflow : scroll">
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

      jQuery(function($) {
        window.selected_categories = [];

        function details ( d ) {
            return d.storages;
        }

        window.table = $('#datatable').DataTable( {
        "ajax": {
            "url" : "{!! route('products.datatable') !!}",
            "data": {
                "selected_categories": function() {
                    return window.selected_categories;
                }
            }
        },
        "serverSide": true,
        'language': {
            "url": "{{route('dtlocalization')}}",
        },
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable": false,
                "data":           null,
                "defaultContent": '<div class="text-center"><i class="fa fa-plus"></i></div>'
            },
            { 
                "data": "name",
                "name": "name",
                "orderable": true,
             },
            { "data": "article" },
            { "data": "description" },
            { "data": "category" },
        ],
        "order": [[1, 'asc']], 
        // "search": {
        //     "regex": true
        // }
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


    $('#category_data_div').jstree(
        
        { 
        'core' : {
        'multiple' : true,
        'data' : [
            {!! $category_data !!}
        ]
        },
        "plugins":["checkbox"],
        'checkbox': {
            // 'tie_selection': false,
            'three_state': false
        }, 
        }
        )
        .on('select_node.jstree', function(event, node) {
            window.selected_categories = node.instance.get_selected();
            window.table.ajax.reload();
        })
        .on('deselect_node.jstree', function(event, node) {
            window.selected_categories = node.instance.get_selected();
            window.table.ajax.reload();
        });

        // $('#category_data_div').jstree(
        // { 
        // "plugins" : [ "checkbox" ],
        // 'checkbox': {
        //     'tie_selection': false,
        //     'three_state': false
        // },
        // 'core' : {
        // 'data' : [
        //     {!! $category_data !!}
        // ]
        // } 
        // }
        // ).on('changed.jstree', function (e, data) {
        //         var i, j, r = [];
        //         for (i = 0, j = data.selected.length; i < j; i++) {
        //             r.push(data.instance.get_node(data.selected[i]).text.trim());
        //         }
        //         alert('Selected: ' + r.join(', '));

        //     });

} );

$(document).ready(function(){
    window.modal_data = [];

    function recountOrders(){
        let productCount = 0;
        modal_data.forEach(function( index,company_id ) {
        index['products'].forEach(function( product_data,product_id ) {
            productCount = productCount + 1;
        }); 
        document.getElementById("orderCount").innerText = productCount;
        });
    };

    $(document).on("click", ".delete-company", function(e) {
        let company_id = $(this)[0].getAttribute("data-company");
        temp = [];
        modal_data.filter(function(value, index){ 
            if(index != company_id){
                return temp[index] = value;
            }
        });
        modal_data = temp;
        document.getElementById('company_'+company_id).remove();
        recountOrders();
    });

    $(document).on("click", ".delete-product", function(e){
        let company_id = $(this)[0].getAttribute("data-company");
        let product_id = $(this)[0].getAttribute("data-product");
        document.getElementById('company_'+company_id+'_product_'+product_id).remove();

        temp = [];
        let product_data = modal_data[company_id]['products'];
        product_data.filter(function(value, index){ 
            if(index != product_id){
                return temp[index] = value;
            }
        });
        product_data = temp;
        modal_data[company_id]['products'] = product_data;
        if(temp.length == 0){
        temp = [];
        modal_data.filter(function(value, index){ 
            modal_data.filter(function(value, index){ 
            if(value['products'].length){
                return temp[index] = value;
            }
        });
        });
        modal_data = temp;
        }

        //all products deleted, so company should've be deleted
        if(document.getElementById('company_'+company_id).children.length === 1){ 
            document.getElementById('company_'+company_id).remove()
        }

        recountOrders();

    });

    $(document).on("change", ".product_amount", function(e){
        //console.log($(this)[0]);
        let company_id = $(this)[0].getAttribute("data-company");
        let product_id = $(this)[0].getAttribute("data-product");
        modal_data[company_id]['products'][product_id]['amount'] = $(this)[0].value;
        // document.getElementById('company_'+company_id+'_product_'+product_id).remove();
    });

    $(document).on("submit", "#form_add_orders" ,function( event ) {
        event.preventDefault();
            if(modal_data.length){
            
                let route = "{{ route('order.store') }}";

                $.ajax({
                    method: "POST",
                    url: route,
                    data: $( this ).serialize(),
                    success: function(resp) {
                        //console.log(resp);
                        $('#orderModal').hide();
                        $('#status').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                            +resp+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                            window.modal_data = [];
                            recountOrders();
                        $("#orderModal").modal('hide');
                    },
                    error: function(xhr, str) {
                        console.log(xhr);
                    }
                });

            }
            else{
                alert('Добавьте товары!');
            }
    });
    
    $('#orderModal').on('show.bs.modal', function(event) {
            let inputs = document.getElementById("orderModal_inputs");
                            while (inputs.firstChild) {
                                inputs.removeChild(inputs.firstChild);
                            }

            let button = $(event.relatedTarget);

            if(typeof(window.modal_data[button.data('company_id')]) === 'undefined'){

                window.modal_data[button.data('company_id')] = [];
                window.modal_data[button.data('company_id')]['name'] = [];
                window.modal_data[button.data('company_id')]['products'] = [];

                window.modal_data[button.data('company_id')]['name'] = button.data('company_name');
                window.modal_data[button.data('company_id')]['products'][button.data('product_id')] = [];
                window.modal_data[button.data('company_id')]['products'][button.data('product_id')]['name'] = button.data('product_name');
                window.modal_data[button.data('company_id')]['products'][button.data('product_id')]['amount'] = 1;
                
            }else{
                if(typeof(window.modal_data[button.data('company_id')]['products'][button.data('product_id')]) === 'undefined'){
                    window.modal_data[button.data('company_id')]['products'][button.data('product_id')] = [];
                    window.modal_data[button.data('company_id')]['products'][button.data('product_id')]['name'] = button.data('product_name');
                    window.modal_data[button.data('company_id')]['products'][button.data('product_id')]['amount'] = 1;
                }
            }

            modal_data.forEach(function( index,company_id ) {
                $('#orderModal_inputs').append($('<div id="company_'+company_id+'"><div class="row mb-4"><div class="col-12 text-center"><h3>'
            +index['name']+
            ''+" <a class=\"delete-company\" data-company=\""+company_id+
            "\" href=\"#\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>"+'</h3></div></div>'));

            index['products'].forEach(function( product_data,product_id ) {
                $('#company_'+company_id).append($("<div id=\"company_"+company_id+"_product_"+product_id+"\" class=\"row mb-4 align-items-center\">"+
                "<div class=\"col-md-10\">"+"<label>"+product_data['name']+"</label>"+
                "<input data-company=\""+company_id+"\" data-product=\""+product_id+"\" type=\"number\" name=\"company_"+company_id+"_product_"+product_id+"\" class=\"form-control m-b-5 product_amount\" value=\""+product_data['amount']+"\">"+
                "<\/div><div class=\"col-md-2 text-center\"><a class=\"delete-product\" data-company=\""+company_id+"\" data-product=\""+product_id+
                "\" href=\"#\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a></div></div>"));
            
            }); 
            $('#orderModal_inputs').append($('</div></div>'));
            recountOrders();
            });


            // $('#orderModal_inputs').append($("<div class=\"row mb-4\">"+
            //         "<div class=\"col-md-10\">"+"<input type=\"number\" name=\"quantity_request\" class=\"form-control m-b-5 quantity_request\" " +
            //         "/></div><div class=\"col-md-2 text-center\"><a id=\""+button.data('product_id')+"\" href=\"#\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a></div></div>"));
    });

});
</script>
