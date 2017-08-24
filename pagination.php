<?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "riktam");  
 $record_per_page = 5;  
 $page = '';  
$pagestore= '';
 $output = '';  
$lastt='';
$query="SELECT * from table1";
 $res=mysqli_query($connect,$query);
$last=mysqli_num_rows($res);
if(($last%5)==0){
    $lastt=$last/5;
    
}
else{
     $lastt=round((($last/5)+1));
     
}

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
       $res=mysqli_query($connect,$query);
       header('Location:index.php');
        
    }
 }
 if(isset($_POST["page"]))  
 {  
   /*  if(($_POST["page"]==10)){
        
  
         echo "left";
         
}
     else if($_POST["page"]==11){
 $start_from = ($page + 1)*$record_per_page;  
                  echo "right";

     }*/
    // else{
  if($_POST["page"]<=0){
      $page=1;
  }
     elseif($_POST["page"]>$lastt){
         $page=$lastt;
     }
     else{
      $page = $_POST["page"];
  }
        
          $start_from = ($page - 1)*$record_per_page;  
     
    // }
 }  
 else  
 {  
      $page = 1;  
      $start_from = ($page - 1)*$record_per_page;  


 }  
 $query = "SELECT * FROM table1 ORDER BY name DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  
 <form method='post'>
      <table class='table table-bordered'>  
           <tr>  
                <th width='20%'>Name</th>  
                <th width='20%'>section</th>
                <th width='20%'>email</th>  
                <th width='20%'>phone</th>  
           </tr>  
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
           <tr>  
                <td>'.$row["name"].'</td>  
                <td>'.$row["section"].'</td>  
                <td>'.$row["email"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'. "<button class='btn btn-primary btn-sm' name='edit[]' value=".$row['name']." >".'Edit'.'</button>'.'</td>
                <td>'. "<button onclick='return myFunction()' class='btn btn-primary btn-sm' name='dell[]' value=".$row['name']." >".'Delete'.'</button>'.'</td>
           </tr> 
           </form>
      ';  
 }  
 $output .= '</table><a href="add.php" id="btn" class="btn btn-primary btn-lg active" role="button" >Add</a>
<br /><div align="center">';  
 $page_query = "SELECT * FROM table1 ORDER BY name DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page); 
$i="<<";
$output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".($page-1)."'>".$i."</span>";  
 for($i=1; $i<=$total_pages; $i++)  
 {  
       $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
$i=">>";
$output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".($page+1)."'>".$i."</span>";  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  