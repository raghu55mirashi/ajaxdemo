<?php
$con = mysqli_connect('localhost','root','','blog');
$mysqli = new mysqli('localhost','root','','blog');

$va = $_GET['v'];
$sel = mysqli_query($con,"SELECT * FROM posts WHERE author= '$va'");
// $sel = "SELECT * FROM posts WHERE author= ?";
// $stmt = $mysqli->prepare($sel);
// $stmt -> bind_param("s",$_GET['v']);
// $stmt -> execute();
// $stmt -> store_result();
// $stmt -> bind_result();
// $stmt -> close();
?>

<table border="1">
    <tr>
        <th>email</th>
        <th>title</th>
        <th>body</th>
        <th>author</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($sel)){?>
    <tr>
        <td>
            <?php echo $row['email']; ?>
        </td>
        <td>
            <?php echo $row['title']; ?>
        </td>
        <td>
            <?php echo $row['body']; ?>
        </td>
        <td>
            <?php echo $row['author']; ?>
        </td>
    </tr>
    <?php }?>
</table>