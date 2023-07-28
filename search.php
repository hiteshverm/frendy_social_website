<?php include"tempart/connect.php"; ?>
<?php include"tempart/function.php"; ?>
<?php include"tempart/header.php"; ?>
<?php if(isset($_SESSION['dssion'])) {
	$getinfo=mysqli_query($db,"SELECT * FROM $utable WHERE id='".$_SESSION['dssion']."'");
	$getrowsifo=mysqli_num_rows($getinfo);
	if($getrowsifo>0)
	{
		$getarrinfo=mysqli_fetch_assoc($getinfo);
		 if($getarrinfo['uimg']!=""){ $imgname='<a href="'.$hostpath.'"><img  class="rounded-circle mr-2" width="39" height="39" src="'.$proilelink.$getarrinfo['uimg'].'"></a>'; }else { $imgname='<a href="'.$hostpath.'"><img width="39" height="39" src="'.$imglinks.'"></a>'; }
		 if($getarrinfo['uimg']!=""){ $imgnamesec='<img data-toggle="dropdown" class="rounded-circle mr-2" width="39" height="39" src="'.$proilelink.$getarrinfo['uimg'].'">'; }else { $imgnamesec='<img data-toggle="dropdown" width="39" height="39" src="'.$imglinks.'">'; } 
		 if(isset($_REQUEST['s']))
		 {
		 	$s=$_REQUEST['s'];
		 	

		 
 ?>
 <body class="primebg">
 	<script type="text/javascript">
$(document).ready(function(){
	var mid='<?php echo $s; ?>';
var limit = 7;var start = 0;var action = 'no';
function load_country_data(limit, start){
	
$.ajax({
url:"<?php echo $DISfindLink; ?>",
method:"POST",
data:{limit:limit, start:start, mid:mid},
cache:false,
success:function(data){$('#load_data').append(data);
if(data == ''){
$('#load_data_message').html("<div class='badge py-2 mt-2 w-100 badge-info'>No Data Found</div>");
     action = 'yes';}else{

$('#load_data_message').html('<div align="center"><div class="loader allheading text-center"><span class="bar"></span><span class="bar"></span><span class="bar"></span> <small>Loading...</small></div></div>');
     action = "no";
 }}});}
if(action == 'no'){
action = 'yes';
load_country_data(limit, start);}
 $(window).scroll(function(){
if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'no'){action = 'yes'; start = start + limit; setTimeout(function(){ load_country_data(limit, start);
}, 2000);}});});
</script>
<?php include"tempart/nav.php"; ?>
<section style="margin-top: 100px;" >
	<div class="container ">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">
						<h6><i class="fa fa-user-circle fa-2x mr-2"></i>Users</h6>
					</div>
					<div class="card-body">
						<div class="row" id="load_data"></div>
						<div id="load_data_message"></div>  
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<?php include"tempart/footer.php"; ?>
 </body>
 <?php } } }else { ?>
<body class="primebg">
	<header class="hdrbg shadow py-2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3">
					<a href="<?php echo $index; ?>">
					<img width="150" src="<?php echo $hostlink.'images/'.$logo; ?>">
					</a>
				</div>
				<div class="col-md-9">
					<div class="setloginbox justify-content-end">
					<div class="form-group">
						<label><small><b>E-mail</b></small></label>
						<input type="email" name="temail" id="temail" class="form-control rounded-pill" placeholder="Enter email id...">
					</div>
					<div class="form-group">
						<label><small><b>Password</b></small></label>
						<input type="password" name="pass" id="pass" class="form-control rounded-pill" placeholder="Enter email id...">
					</div>
					<button class="btn crdbg text-white mt-3 rounded-pill login"><i class="fa fa-lock"></i></button>
				</div>
				</div>
			</div>
		</div>
	</header>
	<section class="py-5" style="background-image: url(assets/images/main.jpg); background-position: center right; object-fit: cover; ">
		<div class="container">
			<div class="row align-items-center ">
				<div class="col-md-8">
					<div class="txt text-warning text-center">
						Friendship <span class="txtcolor">Zone</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card crdbg border-0 shadow">
						<div class="w-100 bg-white py-4 text-center text-success">
							<h4>Create New Account</h4>
						</div>
						<div class="card-body gotform">

							<div class="form-group">
								<input  type="text" name="name" id="name" class="form-control rounded-pill bbcolor inpubg text-white border-0" placeholder="Enter your name">
							</div>
							<div class="form-group">
								<input type="text" name="email" id="email" class="form-control rounded-pill text-white bbcolor inpubg border-0" placeholder="Enter your email">
							</div>
							<div class="form-group">
								<input type="text" name="npassword" id="npassword" class="form-control text-white bbcolor rounded-pill inpubg border-0" placeholder="Enter your password">
							</div>
							<div class="form-group">
								<select name="gender" id="gender" class="form-control rounded-pill bbcolor inpubg border-0 text-white">
								
									<option class="male">Male</option>
									<option value="female">Female</option>
								
								</select>
							</div>
							<div class="form-group text-center">
								<button class="bg-white crac px-5 btn bg-white text-success text-center rounded-pill"> <i class="fa fa-heart mr-2 "></i>Create Account</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<span id="msgf"></span>
<script type="text/javascript">
	$(document).ready(function(){
		$(".login").click(function(){
			var temail=$("#temail").val();
			var pass=$("#pass").val();
			if(temail=="")
		{

			$("#msgf").html('<div class="alertmainR">Please enter email</div>');
			$(".alertmainR").slideToggle();
			setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}
		if(IsEmail(temail)==false){
				   $("#msgf").html('<div class="alertmainR">Please enter email</div>');
				   $(".alertmainR").slideToggle();setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

 		return false;
				  }
		if(pass=="")
		{
			$("#msgf").html('<div class="alertmainR">Please enter password</div>');
			$(".alertmainR").slideToggle();setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}else{
			$.ajax({
				url:"calldata/loginconn.php",
				type:"post",
				data:"temail="+temail+"&pass="+pass,
				success:function(data){
					
					if(data==1)
					{
						$("#msgf").html('<div class="alertmainS">Successfully logied in </div>');
			$(".alertmainR").slideToggle();
						window.location.href="index.php";
					}else{
						$("#msgf").html('<div class="alertmainR">Please try again</div>');
						$(".alertmainR").slideToggle();
						setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);
					}
				}
			})
		}
		});


		$(".crac").click(function(){
		var name=$("#name").val();
		var email=$("#email").val();
		var npassword=$("#npassword").val();
		var gender=$("#gender").val();
		if(name=="")
		{
			$("#msgf").html('<div class="alertmainR py-4">Please enter name</div>');
			$(".alertmainR").slideToggle(500);
			setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}
		if(email=="")
		{

			$("#msgf").html('<div class="alertmainR">Please enter email</div>');
			$(".alertmainR").slideToggle();
			setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}
		if(IsEmail(email)==false){
				   $("#msgf").html('<div class="alertmainR">Please enter email</div>');
				   $(".alertmainR").slideToggle();setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

 		return false;
				  }
		if(npassword=="")
		{
			$("#msgf").html('<div class="alertmainR">Please enter password</div>');
			$(".alertmainR").slideToggle();setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}
		if(gender=="")
		{
			$("#msgf").html('<div class="alertmainR">Please select gender</div>');
			$(".alertmainR").slideToggle();setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

			return false;
		}else {
			$("#msgf").empty();
			$("#crac").html('<div class="spinner-border spinner-border-sm mr-2"></div>please wait...');
			$.ajax({
				url:"calldata/ctac.php",
				data:"name="+name+"&email="+email+"&npassword="+npassword+"&gender="+gender,
				type:"post",
				success:function(data){
					
					if(data==1)
					{
						$("#msgf").html('<div class="alertmainS">account successfully created</div>');
			$(".alertmainS").slideToggle();
						window.location.href="verify.php";

					}else 
					{
						$("#msgf").html('<div class="alertmainR">Please try again</div>');
						$(".alertmainR").slideToggle();
						setTimeout(function() {
			      $(".alertmainR").slideToggle(500);
			    }, 4000);

						$("#crac").empty();
						$("#crac").html('Create Account');
					}
				}
			})
		}



	});
		function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
	});
</script>
</body>
<?php } ?>
</html>
