<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <input type="text" name="author" id="author" onkeyup="return change(this.value)">
    <div id="container">

    </div>
    <script>
    function change(v) {
        if (v == '') {
            document.getElementById('container').innerHTML = '';
            return;
        }
        var xhr = new XMLHttpRequest();
        if (xhr) {
            xhr.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById('container').innerHTML = this.responseText;
                }
            };
            xhr.open('GET', 'samplefetch.php?v=' + v, true);
            xhr.send();
        }
    }
    </script>
</body>

</html>