<?php
require_once 'db.php';
if(isset($_POST["items"]))
{
   $data=$_POST["items"];
   if($data==null)
   {
     echo("<script>alert('Enter Something....');</script>");
   } 
   else
   {
   $sql="INSERT INTO `personal`(`id`,`items`)values(null,'$data')";
   mysqli_query($connection,$sql);
   }
}

if(isset($_POST["delete"]))
{
  $value=$_POST["delete"]; 
  $sql="DELETE FROM `personal` WHERE `id`='$value'";
  mysqli_query($connection,$sql);
}
?>
<html>

 <head>

 <title>To-Do-List</title>

    <meta charset="en-us">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css" type="text/css">

 </head>
<style>
  .home{
  position:relative;
  top:-40px;
  float:right;
}
</style>
<body>

   <div class="container-fluid">
      
      <div class="container-fluid mt-2 mb-2 bg-primary">

         <div>
            <h3 class="text-white text-center">To-Do-List</h3>
            <button class="close home" onclick="window.location.href='index.html'"><span class="fa fa-home"></span></button>
         </div>
         <form method="POST" class="m-2">

<div class="row m-2">

    <div class="form-group col-12 col-sm-9 mb-2">

    <label for="activity" class="text-white"><strong>Activites</strong></label>
  
    <input type="text" name="items" placeholder="Enter Your Activites" class="form-control">

    </div>

    <div class="form-group  col-12 col-sm-2  mb-2 ">

    <label for="add" class="text-white"><strong>Add</strong></label>

           <button class="btn btn-primary form-control" type="submit">
             <span class="fa fa-plus-circle"></span>
           </button>
           
     </div>

</div>

</form>

      </div>   
         
        <div class="container">
            <?php
              $sql1="SELECT * from `personal` where 1";
              $result=mysqli_query($connection,$sql1);
              while( $row=mysqli_fetch_assoc($result))
              {
                  $datas=$row["items"];
                  $id=$row["id"];
                echo("
                    <form method='post'>
                    <div class='alert alert-warning alert-dismissible fade show'role='alert'>
                    <strong><p style='color:black'>$datas</p></strong>
                    <button type='submit' style='color:white' class='close'><input type='hidden' name='delete' value='$id'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>
                    </form>
                ");
              }
            ?>
        </div>

    </div>

</body>
<script>
  window.history.forward();
  function noBack()
  {
    window.history.forward(location.href='index.html');
  }
</script>
</html>