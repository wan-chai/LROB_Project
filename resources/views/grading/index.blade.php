@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
    <div class="panel panel-info">
        <div class="panel-heading"><h2>GRADE ENTRY</h2>
            <h4>{{$deptname->department_name}}</h4>
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <form class="form-horizontal" role="form" method="post" action="/searchGrading">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                      <input type="text" class="form-control" placeholder="Search Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2" id="keyword" name="keyword"></div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                  </form>
              </div>
          </div>
          <table id="list_project" class="table table-hover table-striped table-border">
            <thead>
                @if(count($data)>0)
                <tr>
                    <th>No.</th>
                    <th>Project Title</th>
                    <th>Student</th>
                    <th>Supervisor</th>
                    <th>Status</th>
                    <th>Grade</th>
                    <th></th>
                </tr>
                @else
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
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
                    <td>{{$d->project_title}}</td>
                    <td>{{$d->student_name}}</td>
                    <td>{{$d->supervisor_name}}</td>
                    @if($d->current_stat == 1) <td>Ongoing</td> @else <td>Complete</td> @endif
                    <td>Unavailable</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/test1" data-toggle="tooltip" data-placement="top" title="View Grading"><span class="glyphicon glyphicon-search" ></span></a>
                      <!--   <a class="btn btn-success btn-sm" href="/viewGrading"><span class="glyphicon glyphicon-search"></span></a> -->
                        <a class="btn btn-primary btn-sm" href="/test2" data-toggle="tooltip" data-placement="top" title="Edit Grading"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-danger btn-sm" href="/deleteGrading/{{$d->id}}" data-toggle="tooltip" data-placement="top" title="Delete Grading" onclick="return confirm('Confirm to delete?')"><span class="glyphicon glyphicon-remove"></span></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
</section><!-- /.content -->
@endsection
