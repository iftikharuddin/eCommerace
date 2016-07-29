<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign IN</title>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
				   {!! Form::open(array('url' => 'users/signin' , 'method' => 'post')) !!} 

					  <div class="form-group">
						<label for="username">User Name:</label>
						{!! Form::text('name') !!}
					  </div>
					
					  <div class="form-group">

						<label for="username">Password:</label>
						{!! Form::password('password') !!}
					  </div>
					  		
					  <button type="submit" class="btn btn-default">Sign IN</button>
				   {!! Form::close() !!}
					
			</div>
		</div>
	</div>
</body>
</html>