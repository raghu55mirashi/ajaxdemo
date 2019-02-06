<button id="button">send JSON</button>
<div id="data"></div>
<script>
// for sending data to server by converting it into JSON--------------------
document.getElementById('button').addEventListener('click', function() {

    var myjson = {
        name: "raghu",
        city: "pune",
        dept: "computer"
    };
    var jsondata = JSON.stringify(myjson);
    window.location = "json_server.php ? x =" + jsondata;
})
</script>