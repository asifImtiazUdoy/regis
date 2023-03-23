@extends('layouts.admin')

@section("title", "Registrants's List")

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registrants's List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registrants's list
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>TR Number</th>
                                        <th>TR ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($exhibitors as $exhibitor)
                                    <tr>
                                        <td>{!! $count++ !!}</td>
                                        <td>#{!! $exhibitor->id !!}</td>
                                        <td>{!! $exhibitor->name !!}</td>
                                        
                                        <td>{!! $exhibitor->phone !!}</td>
                                        <td>{!! $exhibitor->email !!}</td>
                                        <td>{!! $exhibitor->country['name'] !!}</td>
                                        <td>{!! $exhibitor->payment_number !!}</td>
                                        <td>{!! $exhibitor->transaction_id !!}</td>
                                        <td>
                                            <form class="delete" action="{{ route('participants.destroy', $exhibitor->id) }}" method="POST">
                                            <a href="{{ route('participants.show', $exhibitor->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
@section('script')
<!-- DataTables JavaScript -->
<script src="{{ asset('back/js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>

@endsection