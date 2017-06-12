<!doctype html>
<?php
	session_start();

	include('config.php');

	if(isset($_SESSION['token'])){
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="./assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="./assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="./assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="http://www.suitmedia.com" class="simple-text">
					Creative Tim
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="user.php">
	                        <i class="material-icons">person</i>
	                        <p>User Management</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="reimbursement.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Reimbursement</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="typography.html">
	                        <i class="material-icons">library_books</i>
	                        <p>Menu tambahan</p>
	                    </a>
	                </li>
	                <!--<li>
	                    <a href="icons.html">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Icons</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="maps.html">
	                        <i class="material-icons">location_on</i>
	                        <p>Maps</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="notifications.html">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
					<li class="active-pro">
	                    <a href="upgrade.html">
	                        <i class="material-icons">unarchive</i>
	                        <p>Upgrade to PRO</p>
	                    </a>
	                </li>-->
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Profile</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
	 						   </a>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search">
	                        	<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
	                    </form>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="column">
	                    <div class="col-md-12">
							<div class="col-md-3">
								<button type='button' class='btn btn-primary' data-toggle="modal" data-target="#createUserModal">Create user
							</div>
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">User list</h4>
									<p class="category">List of existing user</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
											<th width=20px>ID</th>
	                                    	<th>Name</th>
	                                    	<th width=250 align=left>Email</th>
	                                    	<th>Date registered</th>
											<th>Action</th>
	                                    </thead>
	                                    <tbody>
											<?php
												$ch = curl_init();

												$token = $_SESSION['token'];
												$url = "$SERVER/users?token=".$token;
												curl_setopt($ch, CURLOPT_URL, $url);
												curl_setopt($ch, CURLOPT_POST, 0);
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												$server_output = curl_exec ($ch);
												curl_close ($ch);
												$resp = json_decode($server_output, true);
												if($resp!=null){
													foreach($resp['result'] as $result){
														echo "<tr><td id=td>".$result['id']."</td>
															<td>".$result['nama']."</td>
															<td>".$result['email']."</td>
															<td>".$result['created_at']."</td>
															<td><button type='button' class='btn btn-primary'>Modify</td>
														</tr>";
													}
												}
												else{
													echo "Data not found";
												}
											?>
	                                    </tbody>
	                                </table>

	                            </div>
	                                <!--<form>
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Company (disabled)</label>
													<input type="text" class="form-control" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Username</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email address</label>
													<input type="email" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Fist Name</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Adress</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">City</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Country</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Postal Code</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>About Me</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
								    					<textarea class="form-control" rows="5"></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>-->
	                            <!--</div>-->
	                        </div>
	                    </div>
						<!--<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="./assets/img/faces/marc.jpg" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">CEO / Co-Founder</h6>
    								<h4 class="card-title">Alec Thompson</h4>
    								<p class="card-content">
    									Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
    								</p>
    								<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
    							</div>
    						</div>
		    			</div>-->
	                </div>
	            </div>
	        </div>

	        <footer class="footer">
	            <div class="container-fluid">
	                <nav class="pull-left">
	                    <ul>
	                        <li>
	                            <a href="#">
	                                Home
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                                Company
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                                Portfolio
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                               Blog
	                            </a>
	                        </li>
	                    </ul>
	                </nav>
	                <p class="copyright pull-right">
	                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
	                </p>
	            </div>
	        </footer>
	    </div>
	</div>
	<div id="createUserModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title text-primary" background="green">Create new user</h4>		
					</div>
					<form method=POST>
						<div class="modal-body">
							<div class="column">
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Name</label>
										<input type="text" class="form-control" name="nama" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Username</label>
										<input type="text" class="form-control" name="username" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="text" class="form-control" name="email" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Privillege</label>
										<select class="form-control" name="priv">
											<option>Karyawan</option>
											<option>Atasan</option>
											<option>Admin</option>
										</select>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" name="create">Create</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</form>
					<!--<script type="text/javascript">
  						function form_submit() {
							document.getElementById("senddata").submit();
					}    
					</script>-->
					<?php
						//echo $_POST['priv'];
						if(isset($_POST['create'])){
							$nama = $_POST['nama'];
							$username = $_POST['username'];
							$email = $_POST['email'];
							$priv = $_POST['priv'];
							$ch = curl_init();
							switch($priv){
								case "Karyawan":
									$priv = 0;
									break;
								case "Atasan":
									$priv = 1;
									break;
								case "Admin":
									$priv = 2;
									break;
								default:
									$priv = 0;
									break;
							}

							curl_setopt($ch, CURLOPT_URL,"$SERVER/register");
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS,
									"nama=$nama&username=$username&email=$email&privilege=$priv");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$server_output = curl_exec ($ch);
							curl_close ($ch);
							$resp = json_decode($server_output);

							if($resp != null){
								if ($resp->success===true){
									$message = $resp->message;
									$password = $resp->password;

									echo $password;
								}
								else {
									echo "<div class='alert alert-danger alert-dismissable'>
											<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<strong>$message</strong>
										</div>";
								}
							}
							else{
								echo "<div class='alert alert-danger alert-dismissable'>
											<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<strong>Could not connect to the server</strong>
										</div>";
							}
						}
						

					?>
				</div>
			</div>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="./assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="./assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="./assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="./assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="./assets/js/demo.js"></script>

</html>

<?php
	echo test;
	}else{
		echo "Invalid session";
	}
?>