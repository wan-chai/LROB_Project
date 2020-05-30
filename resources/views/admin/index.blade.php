@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    STAFFS
</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <a href="#"><button type="button" class="btn btn-info pull-right">Add User</button></a>
        <br>
        <br>
    </div>
    <table id="senarai" class="table table-hover">
        <thead>
            @if(count($data)>0)
            <tr>
                <th>No.</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
            </tr>
            @else
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @endif
        </thead>
        <tbody>
            @foreach($data as $index => $d)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$d->userid}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->role}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/viewUser/{{$d->id}}"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-danger btn-sm" href="/deleteUser/{{$d->id}}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

</section><!-- /.content -->
@endsection
