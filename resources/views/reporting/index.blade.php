@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
    <div class="panel panel-danger">
        <div class="panel-heading"><h2>REPORTING</h2>
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Progress Report</h3>
                    <!-- <p class="card-text">Report on  .</p> -->
                    <a href="http://localhost:8000/upload/report1.pdf" class="btn btn-primary">Generate report</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Submission Report</h3>
                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                <a href="http://localhost:8000/upload/report1.pdf" class="btn btn-primary">Generate report</a>
            </div>
        </div>
    </div>
</div>  
</div>
</div>
</section><!-- /.content -->
@endsection
