@extends('master')   
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">
  <div class="panel panel-info">
    <div class="panel-heading"><h3>Update Project</h3>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="/saveUpdateProject">
        {{ csrf_field() }}
        <input type="hidden" name="project_id" value="{{ $data->id }}">

        <div class="col-md-8">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Project Title</label>
            <textarea class="form-control" id="project_title" name="project_title" rows="3" value="{{$data->project_title}}">{{$data->project_title}}</textarea>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlInput1">Student ID</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Matrix No." value="{{$data->student_id}}">
            </div>
          </div>

        </div>

        <div class="col-md-12">

          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlInput1">Supervisor ID</label>
              <input type="text" class="form-control" id="supervisor_id" name="supervisor_id"  placeholder="Staff ID No." value="{{$data->supervisor_id}}">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlInput1">First Assessor ID</label>
              <input type="text" class="form-control" id="assessor1_id" name="assessor1_id" placeholder="Staff ID No." value="{{$data->assessor1_id}}">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlInput1">Second Assessor ID</label>
              <input type="text" class="form-control" id="assessor2_id" name="assessor2_id" placeholder="Staff ID No." value="{{$data->assessor2_id}}">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a href="/home" class="btn btn-info">Back</i></a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section><!-- /.content -->
@endsection