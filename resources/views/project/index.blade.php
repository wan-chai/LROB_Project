@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
    <div class="panel panel-info">
        <div class="panel-heading"><h2>PROJECTS</h2>
          @if($role == 2)<h4>{{$name->department_name}}</h4> @elseif($role == 3) <h4>Supervisor : {{$name->name}}</h4> @endif
          @if ($role != 4)
          <a href="/addProject"><button type="button" class="btn btn-info pull-right">Add New Project</button></a>@endif
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <form class="form-horizontal" role="form" method="post" action="/searchProject">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    @if ($role != 4)
                    <div class="col-md-6">
                      <input type="text" class="form-control" placeholder="Search Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2" id="keyword" name="keyword"></div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                      @endif
                  </form>
                  </div>
                  <table id="senarai" class="table table-hover table-striped table-border">
                    <thead>
                        @if(count($data)>0)
                        <tr>
                            <th>No.</th>
                            <th>Project Title</th>
                            <th>Student</th>
                            <th>Supervisor</th>
                            <th>First Assessor</th>
                            <th>Second Assessor</th>
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
                            <td>{{$d->assessor1_name}}</td>
                            <td>{{$d->assessor2_name}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/viewProject/{{$d->id}}" data-toggle="tooltip" data-placement="top" title="View Project">
                                  <span class="glyphicon glyphicon-search"></span></a>
                                  @if ($role != 4)
                                  <a class="btn btn-primary btn-sm" href="/editProject/{{$d->id}}" data-toggle="tooltip" data-placement="top" title="Edit Project"><span class="glyphicon glyphicon-edit"></span></a>
                                  @endif
                                  <!-- <a class="btn btn-warning btn-sm" href="/viewGrading/{{$d->id}}"><span class="glyphicon glyphicon-check"></span></a> -->
                                  @if ($role != 4)
                                  <a class="btn btn-warning btn-sm" href="/test1" data-toggle="tooltip" data-placement="top" title="View Grading"><span class="glyphicon glyphicon-check"></span></a>
                                  @endif
                                  @if ($role != 4)
                                  <a class="btn btn-danger btn-sm" onclick="return confirm('Confirm to delete?')" href="/deleteProject/{{$d->id}}" data-toggle="tooltip" data-placement="top" title="Delete Project"><span class="glyphicon glyphicon-remove"></span></a>
                                  @endif
                              </td>
                          </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </section><!-- /.content -->
      @endsection