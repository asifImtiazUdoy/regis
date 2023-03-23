@php
$setting = \App\Models\Setting::where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - {{ $setting->website_name }}</title>

    <!-- Favicons -->
    <link href="{{ url('uploads/images', $setting->logo)}}" rel="icon">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('back/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('back/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('back/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('back/css/timeline.css') }}" rel="stylesheet">

    <!-- dropify -->
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('back/css/startmin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('back/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.dashboard')}}">Admin</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('setting')}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('admin.dashboard')}}" class="{{ (\Request::route()->getName() == 'admin.dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="{{ route('participants.index')}}" class="{{ (\Request::route()->getName() == 'participants.index') ? 'active' : '' }}"><i class="fa fa-user"></i> Registrants</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index')}}" class="{{ (\Request::route()->getName() == 'category.index') ? 'active' : '' }}"><i class="fa fa-tag"></i> Category</a>
                        </li>
                        <li>
                            <a href="{{ route('school.index')}}" class="{{ (\Request::route()->getName() == 'school.index') ? 'active' : '' }}"><i class="fa fa-building"></i> School</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('back/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('back/js/bootstrap.min.js') }}"></script>

    <!-- dropify -->
    <script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('script')

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('back/js/startmin.js') }}"></script>


    <script>
        @if (Session::has('success'))
        swal({
            title: "Good job!",
            text: "{{ Session::get('success') }}",
            icon: "success",
        });

        @endif
        
        
    </script>

    

</body>
</html>
