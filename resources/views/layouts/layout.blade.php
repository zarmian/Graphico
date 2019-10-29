<!DOCTYPE html>
<head>
<link rel='stylesheet' id='main-style-css'  href='/assets/css/styles-ver=4.9.3.css' type='text/css' media='all' />
<link rel='stylesheet' id='datepicker-css-css'  href='/css/bootstrap-datetimepicker.min-ver=4.9.3.css' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='/css/bootstrap-header.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-icon-css'  href='/assets/css/font-awesome.min-ver=1.8.10.css' type='text/css' media='all' />
<script type="text/javascript">
    window.onload = function draw() {
        var canvas = document.getElementById('canvas');
      if (canvas.getContext) {
        var ctx = canvas.getContext('2d');

        ctx.fillStyle = 'rgb(200, 0, 0)';
        ctx.fillRect(10, 10, 50, 50);

        ctx.fillStyle = 'rgba(0, 0, 200, 0.5)';
        ctx.fillRect(30, 30, 50, 50);
      }
    }
  </script>
    <title>@yield('title','GraphiCo')</title>
</head>
    <body class="page-template" onload="draw();">
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