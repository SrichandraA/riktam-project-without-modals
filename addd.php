<?php
$link=mysqli_connect("localhost","root","","riktam");
if(mysqli_connect_error()){
    
    die("not connected");
    
}
 $result="";
 $err="";
 if(($_POST))
 {
    $name=$_POST['name'];
    $section=$_POST['section'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
   
    $query="SELECT * FROM table1 where name='$name'";
    $result=mysqli_query($link,$query);
 if(mysqli_num_rows($result)==1)
   {
      if($var!=-1)
    {
      $query="UPDATE table1 SET name='$name',section='$section',email='$email',phone='$phone' where
     name='$name'";
      $result=mysqli_query($link,$query);
      header('Location:index.php');
       }
       else
         $err="Already registerd!!!!";
    }
    else
 {
    $query="insert into table1(name,section,email,phone)values('$name','$section','$email','$phone')";
    $result=mysqli_query($link,$query);
   header('Location:index.php');
    }
 }
if(isset($_COOKIE["find"]))
 {
     $name =$_COOKIE["find"];
    $query="SELECT * FROM table1 where name='$name'";
    $res=mysqli_query($link,$query);
    $result=mysqli_fetch_assoc($res);
 }
 setcookie("find", null);
?>
<html>
<head> 
  <title>Home Page</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
         <nav class="navbar navbar-light bg-faded">
  <h1 class="navbar-brand mb-0">Edit student details</h1>
</nav>
<form  method="POST">
 <div class="form-group">
    <label >Name</label>
    <input class="form-control" type="text" name="name" placeholder="Enter name" value="<?php echo $result['name'] ?>" required readonly >
   
  </div>
   
 <div class="form-group">
    <label >Section</label>
    <input class="form-control" type="text" name="section" placeholder="A/B/C/D" value="<?php echo $result['section'] ?>" min="0" required >
  </div>
  
  <div class="form-group">
    <label >Email</label>
   <input class="form-control" type="email" name="email" placeholder="john@yahoo.com" value="<?php echo $result['email'] ?>" min="0" required >
  </div>
  <div class="form-group">
    <label >Phone</label>
    <input class="form-control" type="number" name="phone" placeholder="+91" value="<?php echo $result['phone'] ?>" min="1000000000" max="9999999999" required >
  </div>
    
   
    <input class='btn btn-primary btn-sm' type="submit" name="submit" value="save" >
     <a href="index.php" id="btn" class='btn btn-primary btn-sm' role="button" >Cancel</a>
    <span><?php echo $err ?></span>
   
    </form>
    </div>
  </body>
</html>