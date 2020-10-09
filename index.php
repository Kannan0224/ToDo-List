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
   $sql="INSERT INTO `items`(`id`,`items`)values(null,'$data')";
   mysqli_query($connection,$sql);
   }
}

if(isset($_POST["item_id"]))
{
  $value=$_POST["item_id"]; 
  $sql="DELETE FROM `items` WHERE `id`='$value'";
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

<body>

   <div class="container-fluid">
      
      <div class="container mt-2 bg-primary">

            <h3 class="text-white text-center">To-Do-List</h3>
            
            <form method="POST">

            <div class="form-group row m-2">

            <input type="text" name="items" placeholder="Enter items" class="form-control col-10">

            <button class="btn btn-primary col-2" type="submit"><span class="fa fa-plus-circle"></span></button>
            </div>

            </form>

      </div>   
         
        <div class="container bg-primary">
   
           <h3 class="text-white text-center">Added Items</h3>
            <hr>
            <?php
              $sql1="SELECT * from `items` where 1";
              $result=mysqli_query($connection,$sql1);
              while( $row=mysqli_fetch_assoc($result))
              {
                  $datas=$row["items"];
                  $id=$row["id"];
                  echo("<form method='POST'>");
                  echo(" <div class='form-group row m-2'>");
                  echo("  <input type='text' name='delete' class='form-control col-10' disabled value='$datas'>");
                  echo("  <button class='btn btn-primary col-2' type='submit'><input type='hidden' value='$id' name='item_id'><span class='fa fa-times'></span></button>");
                  echo(" </div>");
                  echo("  </form>");
              }
            ?>

        </div>

    </div>

</body>

</html>