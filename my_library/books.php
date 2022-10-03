
<?php 
$conn=mysqli_connect('localhost','root','','libraries');
if(! $conn){
	echo mysqli_connect_error();
	exit;
}
$query="SELECT * FROM `books`";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>
	  BOOKS
	</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div class="header">
                <h1 class="title">our Library</h1>
      </div>

            <div class="nav">
                <a href="index.php" class="home">HOME</a></div>
	<h1 class="h"> BOOKS</h1>
	<div class="books">
		
	
	<table>
		<thead>
			<tr>
				<th> id </th>
				<th> user_id </th>
				<th> num </th>
				<th> title </th>
				<th> author_name </th>
				<th> edition </th>
				<th> submission_date </th>
			</tr>
		</thead>
		<tbody>
		<?php 
		while($row=mysqli_fetch_assoc($result)){?>
				<tr>
					<td><?= $row['id']?></td>
					<td><?= $row['user_id']?></td>
					<td><?= $row['num']?></td>
					<td><?= $row['title']?></td>
					<td><?= $row['author_name']?></td>
					<td><?= $row['edition']?></td>
					<td><?= $row['submission_date']?></td>
					<td><a class="change" href="edit.php?id=<?=$row['id']?>">EDIT</a>|<a class="change" href="delete.php?id=<?=$row['id']?>">DELETE</a></td>
				</tr>
			<?php
		}?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8" style="text-align: center;"><a class="change" href="index2.php">ADD</a>
					
				</td>
			</tr>
		</tfoot>

	</table>
	</div>

</body>
</html>