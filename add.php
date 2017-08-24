
<?php
$link=mysqli_connect("localhost","root","","riktam");
if(mysqli_connect_error()){
    
    die("not connected");
    
}

if($_POST){
    
    $name=$_POST['name'];
    $section=$_POST['section'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $istrue=true;
    
    $query="select * from table1";
    if($result=mysqli_query($link,$query)){
        while($row=mysqli_fetch_array($result)){
            if($name==$row[0]){
                echo "user already exists!";
                $istrue=false;
            }
            
        }
        
    }
    if($istrue){
    $query="insert into table1(name,section,email,phone)values('$name','$section','$email','$phone')";
            if(mysqli_query($link,$query)){
                header("Location: index.php");
                }
    
    }
    

}
   
 
?>
<html>
<head>
    <title>Addition</title>
<meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">

    </style>    
</head>

<body>
    <div class="container">
<nav class="navbar navbar-light bg-faded">
  <h1 class="navbar-brand mb-0">Add a student</h1>
</nav>
   
        
        <form method="post">
  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
   
  </div>
  <div class="form-group">
    <label >Section</label>
    <input type="text" class="form-control" name="section" placeholder="A/B/C/D" required>
  </div>
  
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label >Phone</label>
    <input type="number" class="form-control" name="phone" placeholder="+91" min="1000000000" max="9999999999" required >
  </div>
  
  
  <input class="btn btn-primary btn-sm" type="submit" value="Save">
  
            <a href="index.php" id="btn" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Cancel</a>
</form>
        </div>
</body>
</html>
