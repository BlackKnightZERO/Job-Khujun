<!DOCTYPE html>
<html>
<head>
	<title>job khujun</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/5eb6d07440.js"></script>
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
            <a href="{{ url("/user-profile") }}"><button type="button" class="btn btn-outline-light">{{Auth::user()->first_name}}</button></a>

            <a href="{{ url("/logout") }}"><button type="button" class="btn btn-outline-light">Log out</button></a>        
          @else        
            <a href="{{ url("/custom-login") }}"><button type="button" class="btn btn-outline-light">Login</button></a>
            <a href="{{ url("/custom-register") }}"><button type="button" class="btn btn-outline-light">Register</button></a>
        @endif
        
  		</div>
  		</div>
	</div>
	<div class="container-fluid">
		<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Sl.</th>
      <th scope="col" style="width: 30%">Job Post</th>
      <th scope="col" style="width: 40%">Requirements</th>
      <th scope="col" style="width: 20%">Company</th>
      <th scope="col" style="width: 10%">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($allJobPosts)>0)
    <?php $i=1; ?>
    @foreach($allJobPosts->all() as $allJobPost)
    <tr>
      <th scope="row">{{$i}}</th>
      <td >{{$allJobPost->jtitle}} 
        <small>({{$allJobPost->jlocation}})</small>
      </td>
       <td >{{$allJobPost->jdesc}}</td>
      <td >{{$allJobPost->jcomp}}</td>
      <td>
        @if(isset(Auth::user()->email))

          <?php
               $flag = 0;
               $explode =  explode(',',$allJobPost->jaid);
               foreach ($explode as $key => $value) {
                 if($value==Auth::user()->id)
                 {
                  $flag = 1;
                 }
                 else
                 {
                  $flag = 0;
                 }
               }

               if($flag==1)
               { ?>
                   <span style="color: #93DC98;"><i class="fas fa-check"></i></span>
               <?php }
               else
               { ?>
                <a href="{{ url("/applySingleJob/{$allJobPost->jid}") }}" class="btn btn-success btn-sm">Apply</a>
               <?php } 
            
          ?>  
        
        @else
        <a href="">more..</a>
        @endif
        
      </td>
    </tr>
     <?php $i++; ?>
    @endforeach
    @endif
  </tbody>
</table>
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