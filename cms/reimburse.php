<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="./assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Suitmedia Reimbursement </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="./assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

	<!--   Core JS Files   -->
	<script src="./assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="./assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="./assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="./assets/js/material-dashboard.js"></script>
	

	<style>
	.scrollbar
	{
		height: 258px;
		background: #F5F5F5;
		overflow-y: hidden;
		margin-bottom:25px;
		padding-right:5px;
	}
	.scrollbar:hover
	{
		overflow-y:scroll;
		padding-right:0px;
	}
	#style-10::-webkit-scrollbar-track
	{
		background-color: #F5F5F5;
	}

	#style-10::-webkit-scrollbar
	{
		width: 5px;
		background-color: #F5F5F5;
	}

	#style-10::-webkit-scrollbar-thumb
	{
		background-color: #AAA;
		/*background-image: -webkit-linear-gradient(90deg,
												rgba(0, 0, 0, .2) 25%,
												transparent 25%,
												transparent 50%,
												rgba(0, 0, 0, .2) 50%,
												rgba(0, 0, 0, .2) 75%,
												transparent 75%,
												transparent)*/
	}
	</style>
</head>


<?php 
	session_start();

	include('config.php');

	if(isset($_SESSION['token'])){
		include('check_session.php');

?>

<body>
	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="./assets/img/sidebar-1.jpg">

			<div class="logo">
				<a href="http://www.suitmedia.com" class="simple-text">
					Reimbursement
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
	                <li>
	                    <a href="user.php">
	                        <i class="material-icons">person</i>
	                        <p>User Management</p>
	                    </a>
	                </li>
	                <li class="">
	                    <a href="projects.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Projects</p>
	                    </a>
	                </li>
                     <li class="active">
	                    <a href="reimburse.php">
	                        <i class="material-icons">account_balance_wallet</i>
	                        <p>Reimbursement</p>
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
						<a class="navbar-brand" href="#">Reimburesement</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
								<ul class="dropdown-menu">
									<li><a href="#">Log out</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div id='content-in' class="container-fluid">
					<div class="row">
	                    <div class="col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title"> Reimbursement Pending Request</h4>
	                                <p class="category">New reimburse on 
										<?php
											$ch = curl_init();
											$token = $_SESSION['token'];
											$url = "$SERVER/reimburse/last/1?token=".$token;
											curl_setopt($ch, CURLOPT_URL, $url);
											curl_setopt($ch, CURLOPT_POST, 0);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											$server_output = curl_exec ($ch);
											curl_close ($ch);
											$resp = json_decode($server_output, true);
											
											if($resp['success'] == true){
												foreach($resp['result'] as $result){
													echo date_format(date_create($result['created_at']), 'jS F Y');
												}		
											}
											else{
												echo "Data not found";
											}
										?>
									</p>
	                            </div>
	                            <div class="card-content table-responsive">
										<table class="table">
												<thead class="text-primary">
													<th width=20px>RID</th>
													<th class='col-lg-3'>Name</th>
													<th class='col-lg-3'>Project name</th>
													<th>Date</th>                                                  
													<th>Ammount</th>
													<th></th>
												</thead>
												<tbody>
													<?php
														$ch = curl_init();
														$token = $_SESSION['token'];
														$url = "$SERVER/reimburse/list/pending?token=".$token;
														curl_setopt($ch, CURLOPT_URL, $url);
														curl_setopt($ch, CURLOPT_POST, 0);
														curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
														$server_output = curl_exec ($ch);
														curl_close ($ch);
														$resp = json_decode($server_output, true);
														if($resp['success'] != false){
															foreach($resp['result'] as $result){
																echo "<tr><tr id='tr".$result['id']."'>
																	<td>".$result['id']."</td>
																	<td>".$result['user_name']."</td>
																	<td>".$result['project_name']."</td>
																	<td>".date_format(date_create($result['date']), 'jS F\,\ Y')
																	."</td>
																	<td>Rp ".number_format($result['cost'], 0, ",", ".")."</td>
																	<td class='text-center'>
																	<button type='button' class='btn btn-primary reimburse-info' data-toggle='modal' data-background-color='orange'>More info</td>
																</tr>";
															}
														}
														else{
															echo "<tr><td colspan='6' align=center><h4>".$resp['message']."</h4></td></tr>";
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
	    </div>
	</div>
	
</body>
<script>

	var error_msg = "Could not get the data from the server. Please try again later.";
	$(document).ready(function(){
		$('#moreInfoModal').on('hidden.bs.modal', function () {
			$('button#accept').unbind('click');
			$('button#reject').unbind('click');
			$('body').off('click', '.more-info');
		})
	});

	$(document).ready(function(){
		$('#cardheader').addClass("fade in");
		$(document).on('click', '#pendingtab', (function(){
			$('#cardheader').attr('data-background-color', 'orange');
		}));
		$(document).on('click', '#acceptedtab', (function(){
			$('#cardheader').attr('data-background-color', 'green');
		}));
		$(document).on('click', '#rejectedtab', (function(){
			$('#cardheader').attr('data-background-color', 'red');
		}));
	})

	$(document).on('click', '.reimburse-info', function() {
		var rid = $(this).closest('tr').prop('id').substr(2,2);
		$.ajax({
			type: "POST",
			url: "get_reimburse_info.php",
			data: 'reimburse_id='+rid,
			success: function(msg){
				$('#content-in').fadeOut(500, function(){
					$('#content-in').html(msg);
				});
				$('#content-in').fadeIn(500, function(){
                    $("#back-to-project").attr("id", "back-to-reimburse");	
                });				
			},	
			error: function(){
				$.notify(error_msg);
			}
		});
	});

    $(document).on('click', '#back-to-reimburse', function(){
        backToReimbursePage();
    })

	$(document).on('click', "#accept", (function(){
		var reason = $("#reason").val();
		var id = $('.rid').prop('id').substr(1,2);
		var pid = $('.projectid').prop('id').substr(2,2);
		$.ajax({
			type: "POST",
			url: "accept_reimburse.php",
			data: 'reimburse_id='+id+'&reason='+reason,
			success: function(msg){
				backToReimbursePage();
				$(document).off('click', "#accept");
				$.notify(msg);
			},	
			error: function(){
				$.notify(error_msg);
			}
		});
	}));

	$(document).on('click', "#reject", (function(){
		var reason = $("#reason").val();
		var id = $('.rid').prop('id').substr(1,2);
		var pid = $('.projectid').prop('id').substr(2,2);
		$.ajax({
			type: "POST",
			url: "reject_reimburse.php",
			data: 'reimburse_id='+id+'&reason='+reason,
			success: function(msg){
				backToReimbursePage();
				$(document).off('click', "#reject");
				$.notify(msg);
			},	
			error: function(){
				$.notify(error_msg);
			}
		});
	}));

	$('#content-in').on('click', "#back", function(){
		$('#content-in').fadeOut(500, function(){
			$.ajax({
				type: "GET",
				url: "get_project_page.php",
				success: function(msg){
                    $('#content-in').fadeOut(500, function(){
                        $('#content-in').html(msg);
                    });
                    $('#content-in').fadeIn(500);
                }
			});
		});
	});

	$('#content-in').on('click', '.delete-user', function(){
		var pid = $('.project-name').prop('id').substr(2,2);
		var uid = $(this).closest('tr').prop('id').substr(3,2);
		deleteUser(uid, pid);
	})

	$(document).on("click", "#display-user-list", function(){
		var pid = $('.project-name').prop('id').substr(2,2);
		getAvailableUserList(pid);		
	});

	$(document).on("click", "#proccess-add-user", function(){
		var pid = $('.project-name').prop('id').substr(2,2);
		var uid = $('#user-list-dropdown').val();
		addUser(uid, pid);		
	});

	$(document).ready(function(){
		var project_name;
		var project_details;
		var project_id;
		var name;
		var details;
		var nameArray;
		var pid;
		var obj;

		$(document).on("click", "#edit-project", function(){
			obj = $("#edit-project");
			obj.text("Save");
			obj.attr("id", "save-project");
			project_name = $(".project-name");
			project_details = $(".project-details");
			name = project_name.text().trim();
			details = project_details.text().trim();
			nameArray = name.split(' ');
			pid = nameArray[nameArray.length-1];
			name = nameArray.slice(0, -1).join(' ');
			project_name.html($('<input />',{'value' : name}).val(name));
			project_name.children('input').addClass('form-control');
			project_name.children('input').focus();
			project_name.children('input').css('margin-bottom', '0px');
			project_name.children('input').css('width', '30%');
			project_name.children('input').css('height', '30px');
			project_details.html($('<input />', {'value' : details}).val(details));
			project_details.children('input').addClass('form-control');
			project_details.children('input').focus();
			project_details.children('input').css('margin-bottom', '0px');
			project_details.children('input').css('width', '30%');
			project_details.children('input').css('height', '30px');
		})
		$(document).on("click", "#save-project", function(){
			obj = $("#save-project");
			obj.text("Edit");
			obj.attr("id", "edit-project");
			name = project_name.children('input').val();
			details = project_details.children('input').val();
			project_id = $(".project-name").prop('id').substr(2,2);
			nameArray = project_name.text().trim().split(' ');
			$.ajax({
				type: "POST",
				url: "update_project.php",
				data: 'project_id='+project_id+'&project_name='+name+'&project_details='+details,
				success: function(msg){
					$.notify(msg);
					project_name.children('input').remove('input');
					project_name.html(name+' '+pid);
					$("#project-label").html(name);
					project_details.children('input').remove('input');
					project_details.html(details);
					$("#project-detail-label").html(details);
				},	
				error: function(){
				$.notify(error_msg);
				}
			});
		})
	})
	
    function backToReimbursePage(){
        $('#content-in').fadeOut(500, function(){
            $('#content-in').attr('id', 'content');
            $('#content').load(location.href + " #content-in", function(){
                $('#content-in').unwrap();
                $('#content.in').ready(function(){
                    $('#content-in').css('display', 'none');
                    $('#content-in').fadeIn(500);
                });
            });
        })
    }

	function scrollEvent(){
		alert('scrolled');
		var mainHeight = $(this).height();
		var mainTop = $(this).offset().top;
		$('tr', this).each(function () {

			var $this = $(this);
			var rowTop = $this.offset().top - mainTop;
			var rowHeight = $this.height();
			var rowBottom = rowTop + rowHeight;


			// the row is fully off the screen
			if (rowBottom < 0 || rowTop > mainHeight) {
				//$(this).css({
				//    opacity: 0
				//});
				return;
			}

			// the row is fully visible
			if (rowTop >= 0 && rowBottom <= mainHeight) {
				$this.css({
					opacity: 1
				});
				return;
			}

			// fade out, in ratio
			if (rowTop < 0) 
				$this.css({ opacity: rowBottom / rowHeight});
			else if (rowBottom > mainHeight) 
				$this.css({ opacity: (mainHeight - rowTop) / rowHeight});
		});
	}

	function addUser(uid, pid){
		$.ajax({
			type: "POST",
			url: "add_user_to_project.php",
			data: {
				'project_id':pid, 
				'user_id':uid
			},
			success: function(msg){
				$.notify(msg);
				$('#addUserModal').modal('hide');
				getProjectInfo(pid);
			},	
			error: function(){
				$.notify(msg);
			}
		});
	}

	function deleteUser(uid, pid){
		$.ajax({
			type: "POST",
			url: "delete_user_from_project.php",
			data: {
				'project_id':pid, 
				'user_id':uid
			},
			success: function(msg){
				$.notify(msg);
				getProjectInfo(pid);
			},	
			error: function(){
				$.notify(msg);
			}
		});
	}

	function getAvailableUserList(id){
		$.ajax({
			type: "POST",
			url: "get_available_user.php",
			data: 'project_id='+id,
			success: function(msg){
				$('#user-list-dropdown').html(msg);
			},	
			error: function(){
				$.notify(error_msg);
			}
		});
	}

	function getProjectInfo(id){
		$.ajax({
			type: "POST",
			url: "get_project_info.php",
			data: 'project_id='+id,
			success: function(msg){
				$('#content-in').fadeOut(500, function(){
					$('#content-in').html(msg);
				});
				$('#content-in').fadeIn(500);
			},	
			error: function(){
				$.notify(error_msg);
			}
		});
	}
	</script>

	<div id="addUserModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add user</h4>
				</div>
				<form method=POST>
				<div class="modal-body">
					<div class='form-group label-floating is-empty'>
						<label class='control-label'>User ID</label>
						<select class='form-control' id='user-list-dropdown'>
							<option selected value=''></option>
						</select>
					</div>
				</div>
				</form>
				<div class="modal-footer">
					<button type="button" id="proccess-add-user" class="process-add-user btn btn-default" data-background-color="green">Add user</button>
				</div>
			</div>

		</div>
	</div>

</html>

<?php

	}
	else{
		echo "Invalid session";
		header("Location: login.php");
	}
?>
