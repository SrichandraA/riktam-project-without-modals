<?php

 $link=mysqli_connect("localhost","root","","riktam");
if(mysqli_connect_error()){
    
    die("not connected");
    
}


 $query="SELECT * from table1";
 $res=mysqli_query($link,$query);

 if(!empty($_POST['edit']))
 {
   
    foreach($_POST['edit'] as $clicked) {
       setcookie("find", $clicked);
       header('Location:addd.php');
    }
 }
 if(!empty($_POST['dell']))
 {
   
    foreach($_POST['dell'] as $clicked) {
       
       $query="DELETE from table1 where name='$clicked'";
       $res=mysqli_query($link,$query);
       header('Location:index.php');
        
    }
 }
 ?>
<html>
<head>
<title>Student Details</title>
     <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  
    <style type="text/css">
            #btn{
                
               margin-bottom: 10px;
margin-left: 47%;
                margin-top: 10px;
                
            }
    </style>
    <script type="application/javascript">
    
        function myFunction() {
    if(window.confirm("Do you want to delete?")){
       
        return true;

    }
            else{
                	return false;
            }
           
}
    </script>
</head>
<body>

 <div class="jumbotron">
  <h1 class="display-3">Student Details</h1>
  <p class="lead">This is a simple application, to edit the details.</p>
  <hr class="my-4">
  
  <!--<p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>-->
</div>
    <!--<form method="post">
        <p>name:<input name="name" type="text"></p>
        <p>section:<input name="section" type="text"></p>
        <p><input type=submit value="click me"></p>
        
    </form>-->
    <nav class="navbar navbar-light bg-faded">
  <h1 class="navbar-brand mb-0">Table</h1>
</nav>
    <div class="table-responsive" id="pagination_data">  

    </div>
 </body>
 </html>