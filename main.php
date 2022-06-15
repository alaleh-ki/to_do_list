<?php
// connect to database 
$conn = mysqli_connect('localhost','alaleh', '11137900','to_do_list');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
    }



    	// write query for to dos
	$sql = 'SELECT * FROM to_do_list ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);


	// fetch the resulting rows as an array
	$to_dos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
	// free the $result from memory (good practise)
	mysqli_free_result($result);







    
      if (isset($_POST['submit'])){
      $to_do = $_POST['to_do'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $to_do)){
       echo  'item must be letters and spaces only';}
    

    
      // protecting database from codes

       $new_todo = mysqli_real_escape_string($conn,$_POST['to_do']);

    
       // creat sql
       $sql = "INSERT INTO to_do_list(to_do) VALUES ('$new_todo')";
    
       // save to db
       if(mysqli_query($conn,$sql)){
         // succes
         header('location: index.php');
       }else{
         echo 'query error'.mysqli_error($conn);
       }
    
     // echo 'form is valid';
    
    }


    if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    
        $sql = "DELETE FROM to_do_list WHERE id = $id_to_delete";
    
        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        } else {
            echo  mysqli_error($conn);
        }
      }

      
      if(isset($_POST['checked'])){
        $id_checked = mysqli_real_escape_string($conn, $_POST['checked']);
        $sql = "UPDATE to_do_list SET checked =2 WHERE id = '$id_checked'";
        if(mysqli_query($conn, $sql)){
           echo 'green';
        } else {
            echo  mysqli_error($conn);
        }
      }


      
      if(isset($_POST['unchecked'])){
        $id_unchecked = mysqli_real_escape_string($conn, $_POST['unchecked']);
        $sql = "UPDATE to_do_list SET checked =1 WHERE id = '$id_unchecked'";
        if(mysqli_query($conn, $sql)){
           echo 'pink';
        } else {
            echo  mysqli_error($conn);
        }
      }




    ?>


