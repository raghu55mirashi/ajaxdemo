<?php

$con = mysqli_connect('localhost','root','','ajaxdemo');
$country = $_POST['country'];
// $country = $_GET['country'];
$sel = mysqli_query($con,"select * from state where country_id = '$country'");
$rows = mysqli_num_rows($sel)
?>
<select id="stat" onchange="changeCity(this.value)">
    <?php  
if($rows>0){
        while($row = mysqli_fetch_assoc($sel)){
    echo '<option value="'.$row['state_id'].'">' .$row['state_name'].'</option>';
    }
   
 } ?>
</select>