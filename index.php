<!doctype html>
<html lang="en">
  <head>

<?php
include('main.php');
?>



    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>My To do list</title>
  </head>
  <body>
      <header>
    <div class="jumbotron m-3">
        <h1 class="display-5 text-center">To do list</h1>
      </div>
</header>


<div class="container p-0">

<form action="index.php"  method="post" class="add-new my-2 " > 
<input type="text" id="input" class=" float-left "  name="to_do" placeholder="Add a new task!" >
    <input type="submit" name="submit" value ="submit" class="btn  float-right ml-1" id="add">
</form>



<ul class="list-group" id="ul" >
<?php foreach($to_dos as $to_do):?>
  <?php if($to_do['checked']== 1):?>
   <li onclick="checking(this)" class="list-group-item px-2 pb-0 mb-1" id="<?php echo $to_do['id']?>">
   <?php  echo htmlspecialchars($to_do['to_do']); ?>  
   
  <form action="index.php" method="POST"  class="badge float-right pt-0 ">
<input type="hidden" name="id_to_delete" value="<?php echo $to_do['id'];?>">
<span ><input type="submit" name="delete" value="x" class=" btn-close btn btn-s" ></span>
</form></li>
  <?php else:?>
    <li onclick="checking(this)" class="list-group-item px-2 pb-0 mb-1 checked" id="<?php echo $to_do['id']?>">
   <?php  echo htmlspecialchars($to_do['to_do']); ?>  
   
  <form action="index.php" method="POST"  class="badge float-right pt-0 ">
<input type="hidden" name="id_to_delete" value="<?php echo $to_do['id'];?>">
<span ><input type="submit" name="delete" value="x" class=" btn-close btn btn-s" ></span>
</form></li>
  <?php endif; ?>
   <?php endforeach; ?>

  </ul>



</div>

<div style="height: 200px;"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

 <script src="main.js"></script>  


</body>
</html>