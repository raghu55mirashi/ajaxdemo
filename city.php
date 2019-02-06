<?php

$con = mysqli_connect('localhost','root','','ajaxdemo');
// $state = $_GET['state'];
$state = $_POST['state'];
$sel = mysqli_query($con,"SELECT * FROM city WHERE state_id = '$state'");
$rows = mysqli_num_rows($sel);
?>
<select id="city">
    <?php while($row = mysqli_fetch_assoc($sel)){ ?>
    <option value="<?php echo $row['city_id'];?>">
        <?php echo $row['city_name'];?>
    </option>
    <?php }?>
</select>