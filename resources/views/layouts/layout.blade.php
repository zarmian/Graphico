<!DOCTYPE html>
<head>
<link rel='stylesheet' id='main-style-css'  href='/assets/css/styles-ver=4.9.3.css' type='text/css' media='all' />
<link rel='stylesheet' id='datepicker-css-css'  href='/css/bootstrap-datetimepicker.min-ver=4.9.3.css' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='/css/bootstrap-header.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-icon-css'  href='/assets/css/font-awesome.min-ver=1.8.10.css' type='text/css' media='all' />




    <title>@yield('title','GraphiCo')</title>
</head>
    <body class="page-template" >
        @include('layouts.header')

        @if(session('success'))
        <div class="alert alert-success">
            <div class="container">
                <span>
                    {{ session('success') }}
                </span>
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <div class="container">
                <span>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </span>
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
	    @endif

        @yield('content')
        <script type="text/javascript" src="/aecore/assets/js/bootstrap.min-ver=1.8.10.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.min-ver=1.8.10.js"></script>
    <script type="text/javascript" src="/assets/js/moment.min-ver=1.8.10.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @yield('scripts')
    </body>

    

</html>