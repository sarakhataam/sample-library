<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $conn=mysqli_connect('localhost','root','','libraries');
        if(! $conn){
            echo mysqli_connect_error();
            exit;
        }
    }
?>

<html>
    <head>
        <title>my library</title>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        <div class="page">
            <div class="header">
                <h1 class="title">our Library</h1>
            </div>

            <div class="nav">
                <a href="#">HOME</a>
                <?php 
                session_start();
                if($_SESSION){
                    if($_SESSION['loggedIn']==true){?>
                    <a href="#" target="_blank">welcome <?php print_r($_SESSION['name']);?></a>  
                    <a href="books.php">BOOKS</a>

                    <a href="logout.php" target="_blank">LOGOUT</a>

                    <?php 
                    }
                }
                else{
                ?>
                    <a href="login.php" target="_blank">LOGIN</a>

                <?php
                }?>
            </div>

            <div class=center>
                <div>
                    <h1>WELCOME In Our Library</h1>
                </div>
                <form method="post">
                    <input class="text" type="hidden" name=user_id  value=""/>
                    <input class="text" type="text" name="search" placeholder="what do you search?"/>
                    <input class="button" type="submit" name="sumbit" value="Search">
                   
                        
                        <?php 

                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $search_value=mysqli_escape_string($conn,$_POST['search']);
                            //$query="SELECT * FROM `books` WHERE  `title` LIKE '%' '".$search_value."'  ";
                            $query="SELECT * FROM `books` WHERE  `title` LIKE '%' '".$search_value."'  ";
                            $data=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($data)){?>
                                <div class="grid-item">
                                	<table>
	                                	<thead>
	                                		<tr>
	                                			<td>Number</td>
	                                			<td>Title of book</td>
	                                			<td>Author Name</td>
	                                			<td>Edition Data</td>
	                                			<td>Submission Data</td>
	                                		</tr>
	                                	</thead>
	                                	<tbody>
	                                		<tr>
		                                		<td><?= $row['num']?></td>
			                                    <td><?= $row['title']?></td>
			                                    <td><?= $row['author_name']?></td>
			                                    <td><?= $row['edition']?></td>
			                                    <td><?= $row['submission_date']?></td>
	                                		</tr>
		                                	
		                                    
	                                	</tbody>
	                                   

                               	 	</table>
                            	</div>
                            	        
                            <?php
                            }
                        }?>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>