<?php 
$conn=mysqli_connect('localhost','root','','libraries');
if(! $conn){
	echo mysqli_connect_error();
	exit;
}
$id_b=filter_input(INPUT_GET, 'id');
$query="DELETE  FROM `books` WHERE `id`=".$id_b." LIMIT 1";
if(mysqli_query($conn,$query)){
	header('Location:books.php');
	exit;
}
else{
	echo mysqli_error($conn);
}
$query=mysqli_query($conn,$select);
$result=mysqli_fetch_assoc($query);

mysql_close($conn);?>
