<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>job khujun</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
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

        @if(isset(Auth::user()->email))
            <a href="{{ url("/") }}"><button type="button" class="btn btn-outline-light">Home</button></a>

            <a href="{{ url("/logout") }}"><button type="button" class="btn btn-outline-light">Log out</button></a>        
          @else        
            
        @endif
        
  		</div>
  		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card" >
				  <img class="card-img-top" src="{{asset('storage/'.$profileInfo[0]->pro_pic_path.'') }}" alt="img">
				  <div class="card-body">

				    <form action="{{route('user.picUpload')}}" method="post" enctype="multipart/form-data">
				            @csrf
				            <div class="form-group">
				                <input type="file" name="pro_pic_path" id="pro_pic_path">
				            </div>
				            <div class="form-group">
				                <button type="submit" class="btn btn-primary btn-block">Upload Image</button>
				            </div>   
				            <input type="hidden" id="id" name="id" value={{ Auth::user()->id }}>    
				        </form>

				     <form action="{{route('user.cvUpload')}}" method="post" enctype="multipart/form-data">
				              @csrf
				              <div class="form-group">
				                  <input type="file" name="CV_path" id="CV_path">
				              </div>
				              <div class="form-group">
				                  <button type="submit" class="btn btn-primary btn-block">Upload CV</button>
				              </div>   
				              <input type="hidden" id="id" name="id" value={{ Auth::user()->id }}>    
				          </form>

				  </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="alert alert-success">
					<h4>My Profile :</h4>
					<h5>Name : {{ $profileInfo[0]->first_name }} {{ $profileInfo[0]->last_name }}</h5>
					<h5>Email : {{ $profileInfo[0]->email }}</h5>
					<h5>CV : 
					<?php if($profileInfo[0]->cv_path == null ){ echo 'Not Uploaded'; } 
					else {echo 'Uploaded';} ?>
					</h5>
					
				</div>
			</div>
		</div>
	</div>
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
</body>
</html>