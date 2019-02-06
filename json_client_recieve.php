<button id="button">Recieve JSON</button>
<div id="data"></div>
<script>
// after receiving JSON data at client side it convert into normal javascript object--
document.getElementById('button').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'json_server.php', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log(xhr.responseText);

            var result = JSON.parse(xhr.responseText);
            document.getElementById('data').innerHTML = result;

        }
    }
    xhr.send();
});
</script>