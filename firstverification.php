<?php include"tempart/connect.php"; ?>
<?php include"tempart/function.php"; ?>
<?php include"tempart/header.php"; ?>
<?php if(isset($_REQUEST['key'])){
	$eky=$_REQUEST['key'];
	if($eky!="")
	{
		$chekkey=mysqli_query($db,"SELECT * FROM $utable WHERE fistverify='$eky'");
		$GETROW=mysqli_num_rows($chekkey);
		if($GETROW>0)
		{
			$getsql=mysqli_fetch_assoc($chekkey);
			if($getsql['fistverify']!="")
			{

	?>

	<body>
	<section class="py-5">
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<a href="<?php echo $mainlink; ?>">
					<img width="120" src="<?php echo $hostlink.'images/'.$logo; ?>"></a>
							<strong><i class="fa fa-envelope-o mr-2"></i>Verification email</strong>
						</div>
						<div class="card-body">
							<?php $upd=mysqli_query($db,"UPDATE $utable set fistverify='' WHERE id='".$getsql['id']."'"); 
									if($upd)
									{
										$_SESSION['dssion']=$getsql['id'];
									 $_SESSION['myname']=$getsql['name'];
										echo '<div class="badge badge-success py-2 px-2 w-100">Your Email id successfuly verified <i class="fa fa-check-circle ml-2"></i></div><a href="'.$mainlink.'"><button class="btn pr text-white mt-4">Go To Profle</button>';
									}
									else {
										echo '<div class="badge badge-danger py-2 px-2 w-100">Please try again <i class="fa fa-close ml-2"></i></div>';
									}
							 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?php }else { echo 'Email verificaton successfuly <a href="index.php"><button>Go Back<button></a>';} }else { echo '<div class="badge badge-danger py-2 px-2 w-100">Please try again <i class="fa fa-close ml-2"></i><a href="'.$mainlink.'"><button class="btn btn-dark">back</button></div>'; } } } ?>