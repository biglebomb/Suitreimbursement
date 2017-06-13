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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="orange" data-image="./assets/img/sidebar-1.jpg">
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
								<button type='button' class='btn btn-primary createuser' data-toggle="modal">Create user
							</div>
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">User list</h4>
									<p class="category">List of existing user</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table id='maintable' class="table">
	                                    <thead id='tablehead'class="text-primary">
											<th width=20px>UID</th>
	                                    	<th class='col-lg-4'>Name</th>
	                                    	<th width=250 align=left>Email</th>
	                                    	<th>Date registered</th>
											<th class='text-center'>Action</th>
	                                    </thead>
	                                    <tbody id='usertable'>
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
														echo "<tr id='tr".$result['id']."'>
															<td>#".$result['id']."</td>
															<td>".$result['nama']."</td>
															<td>".$result['email']."</td>
															<td>".date_format(date_create($result['created_at']), 'jS F\,\ Y')."</td>
															<td class='text-center'><button type='button' class='btn btn-primary modify-user' data-toggle='modal'>Modify<span><button type='button' class='btn btn-primary delete-user' data-toggle='modal'>Delete</td>
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
	                        </div>
	                    </div>
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
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-primary" background="green">Create new user</h4><br>
						<div id='alertt'>
						</div>	
					</div>
						<div class="modal-body">
						<form id='userreg' class='userreg' method=POST>
							<div class="column">
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Name</label>
										<input type="text" id='nama' class="form-control" name="nama" required data-toggle="tooltip" data-placement="right" title="Masukkan nama">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Username</label>
										<input type="text" id='username' class="form-control" name="username" required data-toggle="tooltip" data-placement="right" title="Masukkan username">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="email" id='email' class="form-control" name="email" required data-toggle="tooltip" data-placement="right" title="Masukkan email">
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
						</form>
						<div class="modal-footer">
							<button class="btn btn-success" id='submit'>Create</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="modifyUserModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-primary" background="green">Modify user</h4><br>
					</div>
					<form class='modifyuser' method=POST>
					<div class="modal-body modify-user-body">
					<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" id='modify'>modify</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="deleteUserModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-primary" background="green">Delete user</h4><br>
					</div>
					<div class="modal-body delete-user-body">
					<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" id='delete'>Delete</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script>
	function validate(){
		justValidate = true
		if(userreg.checkValidity()){
			submit.click();
		}else{
			submit.click();
		}
	}
	$(function() {
		$(".createuser").click(function(){
			$("#createUserModal").modal('show'); 
			$("button#submit").click(function(){
				if($('form.userreg')[0].checkValidity()) {
					$.ajax({
						type: "POST",
						url: "register_user.php",
						data: $('form.userreg').serialize(),
							success: function(msg){
								$.notify(msg);
								$("#createUserModal").modal('hide');
								$('#maintable').load(location.href + ' #maintable')
							},	
							error: function(){
								alert('error');
							}
					});
				}
				else{
					$('#nama').tooltip('show');
					$('#username').tooltip('show');
					$('#email').tooltip('show');
				}
			});
		});
	});
	
	$(function(){
		$(document).on('click', ".delete-user", function() {
			var trId = $(this).closest('tr').prop('id').substr(2,2);
			$("#deleteUserModal").modal('show');
			$('.delete-user-body').show().html("Are you sure you want to delete this user?")
			$("button#delete").click(function(){
				$.ajax({
					type: "POST",
					url: "delete_user.php",
					data: 'user_id='+trId,
					success: function(msg){
						$.notify(msg);
						$("#deleteUserModal").modal('hide'); 
						$('#maintable').load(location.href + ' #maintable')
					},	
					error: function(){
						alert("failure");
					}
				});
			});
		});
	});
	
	$(function(){
		$(document).on('click', '.modify-user', function() {
			var trId = $(this).closest('tr').prop('id').substr(2,2);
			$.ajax({
					type: "POST",
					url: "get_user_info.php",
					data: 'user_id='+trId,
					success: function(msg){
						$("#modifyUserModal").modal('show'); 
						$('.modify-user-body').show().html(msg);
					},	
					error: function(){
						alert("failure");
					}
				});
		});
	});
</script>

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
	}else{
		echo "Invalid session";
	}
?>
