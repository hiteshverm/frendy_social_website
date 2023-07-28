<?php include"tempart/connect.php"; ?>
<?php include"tempart/function.php"; ?>
<?php include"tempart/header.php"; ?>
<?php if(isset($_REQUEST['vf'])){  
$getID=mysqli_escape_string($db,$_REQUEST['vf']);
{
	$CHECK=mysqli_query($db,"SELECT * FROM $utable WHERE id='$getID'");
	$CHEKROWCT=mysqli_num_rows($CHECK);
	if($CHEKROWCT>0)
	{

		$getVfarr=mysqli_fetch_assoc($CHECK);
		if($getVfarr['fistverify']!="")
		{

		
 if(isset($_SESSION['dssion'])) {
	$getinfo=mysqli_query($db,"SELECT * FROM $utable WHERE id='".$_SESSION['dssion']."'");
	$getrowsifo=mysqli_num_rows($getinfo);
	if($getrowsifo>0)
	{
		$getarrinfo=mysqli_fetch_assoc($getinfo);
		header("location:index.php");
	}
}else {
 ?>


<body class="primebg">
<section>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center">
						<a href="<?php echo $mainlink; ?>">
					<img width="120" src="<?php echo $hostlink.'images/'.$logo; ?>"></a>
					</div>
					<div class="card-body">
						<h4>First Verfication</h4>
						<div class="alert alert-danger">
							Please verify your email id, Verification link sent to your email id, Please check your email id <strong>NOTE:- also chek spam box</strong> 
						</div>
						<div class="showmgs"></div>
					</div>
					<div class="card-footer">
						<button class="btn btn-success resend">ReSend</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$(".resend").click(function(){
			var id='<?php echo $getID; ?>';
			$(".showmgs").html('<div class="spinner-border text-success"></div><span class="text-dark">Please wait...</span>');
 		$(".resend").prop("disabled",true);
			$.ajax({
				url:"calldata/resendvf.php",
				data:"id="+id,
				type:"POST",
				success:function(data)
				{
					
					if(data==1)
					{
						$(".showmgs").html('<div class="badge badge-success py-2 px-2 rounded-pill">Successfully sent link <i class="fa fa-check-circle ml-2"></i>, Check your email id link if no link found wait 2 minute and also chek spam box </div>');
				$(".resend").prop("disabled",false);	
					}else {
						$(".showmgs").html('<div class="badge badge-danger py-2 px-2 rounded-pill">Try again <i class="fa fa-close ml-2"></i></div>');
				$(".resend").prop("disabled",false);
					}
				}
			})
		})
	})
</script>
<?php } ?>
<?php }else { echo 'Email verificaton successfuly <a href="index.php"><button>Go Back<button></a>';} }else { header("location:index.php");} } } ?>
</body>

</html>
