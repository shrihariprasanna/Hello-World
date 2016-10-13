<?php
	include("config.php");
	global $connection;
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$lang=array();
		$lang=$_POST['mytext'];
		//print_r($lang);exit;
		$sql="insert into form_info(name,email) values('".$name."','".$email."')";
		mysqli_query($connection,$sql);
		$user_id=mysqli_insert_id($connection);
		for($i=0;$i<count($lang);$i++){
			 $qry="insert into form_lang values('','$user_id','$lang[$i]')";
			 mysqli_query($connection,$qry);
		}
		header("Location:index.php?mesg=success");
	}
?>
