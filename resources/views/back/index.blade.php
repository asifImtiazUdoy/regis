@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    @php 
                                    $reg = DB::table('exhibitors')->count();
                                    echo $reg;
                                    @endphp
                                </div>
                                <div>Registrants</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tag fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    @php 
                                    $cat = DB::table('categories')->count();
                                    echo $cat;
                                    @endphp
                                </div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-flag fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    @php 
                                    $countries = DB::table('countries')->count();
                                    echo $countries;
                                    @endphp
                                </div>
                                <div>Countries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    @php 
                                    $users = DB::table('users')->count();
                                    echo $users;
                                    @endphp
                                </div>
                                <div>Admin</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-fw"></i> Recent Registrants
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Group</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($persons as $person)
                                    <tr>
                                        <td>{!! $count++ !!}</td>
                                        <td>#{!! $person->id !!}</td>
                                        <td>{!! $person->name !!}</td>
                                        <td>
                                            @if($person->group == 1)
                                            Group-A
                                            @elseif($person->group == 2)
                                            Group-B
                                            @elseif($person->group == 3)
                                            Group-C
                                            @elseif($person->group == 4)
                                            Group-D
                                            @endif
                                        </td>
                                        <td>{!! $person->phone !!}</td>
                                        <td>{!! $person->email !!}</td>
                                        <td>{!! $person->country['name'] !!}</td>
                                        <td>
                                            <a href="{{ route('download.pdf', $person->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection