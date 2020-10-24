<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Job test Questions</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/simple-sidebar.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>

<div class="d-flex" id="wrapper">

 @include('backend.partials.sidebar')

 <!-- Page Content -->
     <div id="page-content-wrapper">

         <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
             <button class="btn btn-warning" id="menu-toggle"><i class="fa fa-bars"></i></button>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             @include('backend.partials.header')

         </nav>

         @yield('backend_content')
     </div>
     <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


<script src="{{ asset('backend/js/sweetalert.js') }}"></script>
<script type="text/javascript">
    function deleteItem(slug){
        swal({
            title: "Are you sure delete this item?",
            text: "You will not be able to recover this item file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#e0b73c',
            cancelButtonColor: '#d22424',
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            event.preventDefault();
            document.getElementById('delete-form-'+slug).submit();
        })
    }
</script>

@stack('script')


</body>

</html>
