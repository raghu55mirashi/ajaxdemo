<?php

$con = mysqli_connect('localhost','root','','ajaxdemo');
$sel = mysqli_query($con,"select * from country");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form>
        COUNTRY: <br>
        <select name="country" id="country" onchange="changestate(this.value)">
            <option value="">select country</option>
            <?php while($row = mysqli_fetch_assoc($sel)){?>
            <option value="<?php echo $row['country_id'];?>">
                <?php echo $row['country_name'];?>
            </option>
            <?php } ?>
        </select><br>
        STATE:
        <!-- these divs are only used for pure javascript ajax -->
        <div id="statediv">
            <select id="stat">
                <option value="0">select state</option>
            </select>
        </div>
        CITY:
        <!-- //these divs are only used for pure javascript ajax and not for jquery -->
        <div id="citydiv">
            <select id="city">
                <option value="0">select city</option>
            </select>
        </div>
    </form>
    <script>
    // jquery ajax are printing options directly into select tag and not in divs
    // $(document).ready(function() {
    //     $('#country').change(function(e) {
    //         var c = $('#country').val();
    //         $.get('state.php?country=' + c, function(data1) {
    //             $('#stat').html(data1);
    //         })
    //     });
    //     $('#stat').change(function(e) {
    //         e.preventDefault();
    //         var s = $('#stat').val();
    //         $.get('city.php?state=' + s, function(data2) {
    //             $('#city').html(data2);
    //         })
    //     });
    // });

    // jquery post method for ajax----------------------------------

    $(document).ready(function() {
        $('#country').change(function() {
            var c = $('#country').val();
            $.post('state.php', {
                country: c
            }, function(data1) {
                $('#stat').html(data1);
            })
        });
        $('#stat').change(function() {
            var c = $('#stat').val();
            $.post('city.php', {
                state: c
            }, function(data1) {
                $('#city').html(data1);
            })
        });
    });



    ////////Jquery.....ajax method--------------------

    // $(document).ready(function() {
    //     $('#country').on('change', function() {
    //         var val = $(this).val();
    //         $.ajax({
    //             url: 'state.php',
    //             type: 'POST',
    //             data: {
    //                 country: val
    //             },
    //             success: function(result) {
    //                 $('#stat').html(result);
    //             }

    //         })
    //     });

    //     $('#stat').on('change', function(e) {
    //         var val = $('#stat').val();
    //         $.ajax({
    //             url: 'city.php',
    //             type: 'POST',
    //             data: {
    //                 state: val
    //             },
    //             success: function(result1) {
    //                 $('#city').html(result1);
    //             }
    //         })
    //     });
    // });


    //using javascript method----------------------
    // to print option you have to  use  div  to print entire 'select' tag in that from city and state.php
    //u have to mention select tag in city and state.php

    // xhr = new XMLHttpRequest();

    // function changestate(c) {
    //     if (xhr) {
    //         xhr.onreadystatechange = function() {
    //             if (xhr.readyState == 4 && xhr.status == 200) {
    //                 document.getElementById('statediv').innerHTML = xhr.responseText;
    //             }
    //         }
    //         xhr.open('POST', 'state.php', true)
    //         xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded")
    //         xhr.send("country=" + c);
    //     }
    // }

    // function changeCity(s) {
    //     if (xhr) {
    //         xhr.onreadystatechange = function() {
    //             if (xhr.readyState == 4 && xhr.status == 200) {
    //                 document.getElementById('citydiv').innerHTML = xhr.responseText;
    //             }
    //         }
    //         xhr.open('POST', 'city.php', true);
    //         xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded")
    //         xhr.send("state=" + s);
    //     }
    // }
    </script>
</body>

</html>