<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>B2B</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

</head>

<body id="page-top">


@yield('content')


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <script>
          $( function() {
            $( "#tags" ).autocomplete({
            //source: "{{route('search.global')}}",
            source: function (request, response) {
                    $.ajax({
                        url: "{{route('search.global')}}",
                        data: {'name':request.term},
                        dataType: "json",
                        type: "GET",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                            response($.map(data,function(value){
                            return{
                            id:value.id,
                            name:value.name
                        };
                    })); 
                        },
                    });
                },
            minLength: 3,
            response: function (event, ui) {
                console.log(ui);
            },
            create: function() {
                $( "#tags" ).data('ui-autocomplete')._renderItem  = function (ul, item) {
                return $( "<li>" )
                    .addClass("global_search_product")
                    .attr( "data-id", item.id )
                    .append( item.name )
                    .appendTo( ul );
                };
			},
            select: function(event, ui) {
                console.log(ui);
                window.location.href = "{{route('products.all')}}".slice(0, -1)+"/"+ui.item.id;
            },
        });

  } );
    </script>

    <!-- <link rel="stylesheet" href="/dist/themes/default/style.min.css" /> -->

    <!-- Page level plugins -->
    <!-- <script src="/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script> -->

</body>

</html>
