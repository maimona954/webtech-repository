<?php include './header.php'; ?>
<div style="text-align: center;">
<fieldset >
  <legend>
    <h2>About Us</h2>
  </legend>
  <div class="reg">
<div id='show_data'></div><br>
<input type="button" onclick="previous()" value="<<Previous">
<input type="button" onclick="next()" value="Next>>">

<script>
let i = 0;
let len;
let cd;

const xhttp = new XMLHttpRequest();
xhttp.onload = function() {
  const xmlDoc = xhttp.responseXML;
  cd = xmlDoc.getElementsByTagName("Data");
  len = cd.length;
  displayCD(i);
}
xhttp.open("GET", "./controller/admin/about_us.xml");
xhttp.send();

function displayCD(i) {
  document.getElementById("show_data").innerHTML =
  "Name : " +
  cd[i].getElementsByTagName("NAME")[0].childNodes[0].nodeValue +
  "<br>Id: " +
  cd[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue +
  "<br>Home District: " + 
  cd[i].getElementsByTagName("HOMEDISTRICT")[0].childNodes[0].nodeValue+
  "<br>Contribution :" + 
  cd[i].getElementsByTagName("WORKED")[0].childNodes[0].nodeValue;
}

function next() {
  if (i < len-1) {
    i++;
    displayCD(i);
  }
}

function previous() {
  if (i > 0) {
    i--;
    displayCD(i);
  }
}
</script>

</div>
    </fieldset>
    </div>
    <br><br>
    <?php include './footer.php'; ?>