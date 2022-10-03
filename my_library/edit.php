<?php 
$conn=mysqli_connect('localhost','root','','libraries');
if(! $conn){
	echo mysqli_connect_error();
	exit;
}
$id_b=filter_input(INPUT_GET, 'id');
$select="SELECT * FROM `books` WHERE `id`=".$id_b." LIMIT 1";
$query=mysqli_query($conn,$select);
$result=mysqli_fetch_assoc($query);


if($_SERVER['REQUEST_METHOD']=='POST'){
$conn=mysqli_connect('localhost','root','','libraries');
if(! $conn){
	echo mysqli_connect_error();
	exit;
}
$num=mysqli_escape_string($conn,$_POST['num']);
$title=mysqli_escape_string($conn,$_POST['title']);
$author=mysqli_escape_string($conn,$_POST['author_name']);
$edition=mysqli_escape_string($conn,$_POST['edition']);
$submission=mysqli_escape_string($conn,$_POST['submission_date']);
$query="UPDATE  `books` SET `num`='".$num."',`title`='".$title."',`author_name`='".$author."',`edition`='".$edition."',`submission_date`='".$submission."' WHERE `id`=".$id_b."" ; 

if(mysqli_query($conn,$query)){
	header('Location:books.php');
	exit;
}
else{
	echo mysqli_error($conn);
}
}?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT BOOKS</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div class="header">
                <h1 class="title">our Library</h1>
      </div>

            <div class="nav">
                <a href="index.php" class="home">HOME</a></div>
<div class="p_log">
	<form method="post" >
		<h1>EDIT</h1>
		<?php session_start();
		$id= $_SESSION['id'];
		// print_r($_SESSION);
		?>

		<input class="text" type="hidden" name=user_id   value="<?= $id ?>"/>


		<label for="num" class="e"> Number </label><br/><br/>
		<input type="text" name="num" id="num" value="<?=(isset($_POST['num']))? $_POST['num']:$result['num']?>"/><br/><br/>

		<label for="title" class="e">Title BOOk</label><br/><br/>
		<input type="text" name="title" id="title" value="<?=(isset($_POST['title']))? $_POST['title']:$result['title']?>"/><br/>

		<label for="author name" class="e"> Author Name </label><br/><br/>
		<input type="text" name="author_name" id="author name" value="<?=(isset($_POST['author_name']))? $_POST['author_name']:$result['author_name']?>"/><br/><br/>

		<label for="edition" class="e"> Edition</label><br/><br/>
		<input type="text" name="edition" id="edition" value="<?=(isset($_POST['edition']))? $_POST['edition']:$result['edition']?>"/><br/><br/>

		<label for="submission date" class="e"> Submission Date </label><br/><br/>
		<input type="text" name="submission_date" id="submission date" 
		value="<?=(isset($_POST['submission_date']))? $_POST['submission_date']:$result['submission_date']?>"/><br/><br/>

		<br/>

		<input class="button" type="submit" name="sumit" value="EDIT"/>
	</form>
</div>
</body>
</html>