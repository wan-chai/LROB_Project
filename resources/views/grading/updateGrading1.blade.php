@extends('master')   
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
</section>
<section class="content">
  <div class="panel panel-info">
    <div class="panel-heading"><h3>Grade Entry</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Project Title</label>
          <textarea class="form-control" id="project_title" name="project_title" rows="2" value="" disabled="disabled">IoT Based Weather Reporting System</textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-4">
          <label for="exampleFormControlTextarea1">Student</label>
          <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Matrix No." value="Takbin Bin Takraw" disabled="disabled">
          <label for="exampleFormControlTextarea1">First Assessor</label>
          <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Matrix No." value="Ali Bin Abu" disabled="disabled">
        </div>
        <div class="col-md-4">
          <label for="exampleFormControlTextarea1">Supervisor</label>
          <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Matrix No." value="Labu Bin Tandus" disabled="disabled">
          <label for="exampleFormControlTextarea1">Second Assessor</label>
          <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Matrix No." value="Surti Binti Tejo" disabled="disabled">
        </div>
      </div>
    </div>
    <br>

    <div class="panel panel-success">
      <div class="panel-heading"><h4>Proposal</h4>
      </div>
      <div class = "panel-body">
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Proposal Assessment</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Supervisor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Supervisor (5)" value="5">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">First Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="First Assessor (5)" value="5">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Second Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Second Assessor (5)">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Project Progress Assessment</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Supervisor (15)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Supervisor (15)">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Demonstration Assessment</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Supervisor (20)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Supervisor (20)">
            </div>
          </div>
        </div>
      </div> <!-- panel body -->
    </div> <!-- panel body -->


    <div class="panel panel-warning">
      <div class="panel-heading"><h4>Project</h4>
      </div>
      <div class = "panel-body">
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Presentation Assessment</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">First Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="First Assessor (5)">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Second Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Second Assessor (5)">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Demonstration Assessment</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">First Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="First Assessor (5)">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Second Assessor (5)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Second Assessor (5)">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Logs Book</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Supervisor (10)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Supervisor (10)">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Project's Report</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Supervisor (20)</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Supervisor (20)">
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="col-md-12">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload Project Report</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <a href="/grading" class="btn btn-info">Back</i></a>
        <a href="/grading" class="btn btn-success">Submit</i></a>
        <!-- <button href="/grading" class="btn btn-primary">Submit</button> -->
      </div> <!-- panel body -->
      
    </div>
  </div>
</div>
</div>
</section>
@endsection