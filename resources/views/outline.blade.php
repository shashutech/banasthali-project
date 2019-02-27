<!DOCTYPE html>
<html lang="en">
<head>

    {{-- Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banasthali Daily</title>
    <meta name="description" content="@yield('description', 'No Content')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Kumar Shashwat">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
   
    @include('includes/navbar')
    <div class="container">
        @include('includes/messages')
    </div>
    @yield('content')

    {{-- Scripts --}}
    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#deleteForm').submit(function(e){
            if(!confirm("Do You Really Want to delete it"))
            e.preventDefault();
        })
        // function swal({
        //     title: "Are you sure?",
        //     text: "It Will be deleted permanently !!",
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonClass: "btn-danger",
        //     confirmButtonText: "Yes, delete it!",
        //     closeOnConfirm: false
        //     },
        //     function(){
        //     swal("Deleted!", "Successfully Deleated blog post", "success");
        //     });

        
    </script>
</body>
</html>