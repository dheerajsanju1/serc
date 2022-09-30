<?php 
 include 'data.php';
 $obj=new wall();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dgn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class= "main">
        <div class="inner">
          <p class="head">
            <img src="logo.png" alt="" width="300px">
          </p>
          </div>
          <div class="inner2">
            <form action="" method="POST">
                <input type="text" name ="keywords" placeholder="search anything here....">
                <input class="button" type="submit" name="submit" value="Search">
              
            </form>
                 <p class="pic"><img src="ser1.jpg" alt="" width="30px"></p>
                
                 <span class="mic"><img src="mike.jpg" alt="" width="34px"></span>
                 <?php
                    if(!empty($_POST['submit']))
                    {
                        $row=$obj->search($_POST);
                    if(is_iterable($row))
                    {

                    
                        foreach($row as $row1)
                        { ?>

                                <p>showing result for :    <a href=""><?php echo $row1['title'] ?></a></p>
                                <p> <u>Description</u> <br/><br/><?php echo $row1['description'] ?></p>
                        <?php }
                    }
                    }
                    ?>



            
          </div>


       

    </div>
</body>
</html>