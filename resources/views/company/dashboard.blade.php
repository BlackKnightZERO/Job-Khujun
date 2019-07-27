<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<!-- <h2>COMPANY DASHBOARD</h2> -->
	@if(isset(Auth::user()->email))
		<!--	<script type="text/javascript">window.location="company_admin_dashboard";</script> -->
	@endif

	@if(isset(Auth::user()->email))
	<!--	<h5>{{ Auth::user()->admin_company_id}}</h5> -->

		<div class="jumbotron bg-info text-white">
		  <div class="row">
		  	<div class="col-md-10">
		  <h1 class="display-4 container">Job Khujun!</h1>
		  <p class="lead container">Find All & Latest Job Post, Easier, Simpler . .</p>
  		</div>
  		<div class="col-md-2 mt-1">
        @if(session('Status'))
          
            <p class="alert alert-danger">
              {{session('Status')}}
            </p>
         
        @endif
        
            <a href=""><button type="button" class="btn btn-outline-light">{{ $company_data[0]->company_name }}</button></a>
            <a href="{{ url("/logout") }}"><button type="button" class="btn btn-outline-light">Log Out</button></a>
                  

  			
  			
  		</div>
  		</div>
	</div>
	<div class="row container-fluid">
		<div class="container col-md-4">
			<form action="{{route('company.dashboard.jobform')}}" method="post">
			    @csrf
			    <h3 class="text-center">Create Job Post</h3>       
			    <div class="form-group">
			        <input type="text" name="job_title" class="form-control" placeholder="Job Title" required="required" value="{{old('job_title')}}">
			    </div>
			    <div class="form-group">
			        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Job Description" required="required" value="{{old('job_description')}}" name="job_description"></textarea>
    
			    </div>
			    <div class="form-group">
			        <input type="number" name="salary" class="form-control" placeholder="Salary" required="required" value="{{old('salary')}}">
			    </div>
			    <div class="form-group">
			        <input type="text" name="location" class="form-control" placeholder="Location" required="required" value="{{old('location')}}">
			    </div>
			    <div class="form-group">
			         <select class="form-control" id="exampleSelect1" name="country">
				        <option>Bangladesh</option>
				        <option>Sri Lanka</option>
				        <option>Germany</option>
				        <option>U.K</option>
				      </select>
			    </div>
			    <input type="hidden" id="compId" name="company_id" value={{ $company_data[0]->admin_company_id }}>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block">Apply</button>
			    </div>       
			</form>
		</div>
		
	
	<div class="container-fluid col-md-8">
		<h3 class="text-center">My Job Posts</h3>       
		<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl.</th>
      <th scope="col" style="width: 35%">Job Post</th>
      <th scope="col" style="width: 35%">Requirements</th>
      <th scope="col" style="width: 10%">Action</th>
    </tr>
  </thead>
  <tbody>
	@if(count($company_posted_jobs)>0)
	<?php $i=1; ?>
		@foreach($company_posted_jobs->all() as $company_posted_job)
    <tr>
    	
      <th scope="row">{{$i}}</th>
      <td >{{$company_posted_job->job_title}} 
      	<small>({{$company_posted_job->location}})</small>
      </td>
      <td >{{$company_posted_job->job_description}}</td>
      <td><a href = "" data-toggle="modal" data-target="#Modal1">view applicants</a>
      </td>
    </tr>
    
    <?php $i++; ?>

    @endforeach
    @endif
  </tbody>
</table>
	</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HEADER(candidates)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!-- Modal -->
	<footer class="page-footer font-small blue" style="background-color: #181717; color: #ffffff; margin-top: 200px;">

	      <!-- Copyright -->
	      <div class="footer-copyright text-center py-3"><div>© Copyright @Job_Khujun_2019 All Rights Reserved</div>
	      <div>Designed by : 
	        <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/arif-faysal-17094b130/
" style="color: #7275C1;"> Arif Faysal</a>
	        </div>
	      </div>
	      <!-- Copyright -->

	    </footer>
	
	@endif

	
</body>
</html>