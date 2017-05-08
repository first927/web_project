<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2>Filter Table</h2>
  <p>Search for a name in the input field.</p>

  <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="myInput" onkeyup="myFunction()">
  <div id = "ok">
    <div>
        <div>
            <p id="A">aaaaa</p>
        </div>
    </div>
     <div>
        <div>
            <p id="A">aaaaa</p>
        </div>
    </div>
    </div>
</div>

<script>
function myFunction() {
    alert(x);
    var para = document.getElementById("ok");
  var x = para.getElementsByTagName("p");
  x[0].innerHTML = "A";
  x[1].innerHTML = "B";
}
</script>

</body>
</html>