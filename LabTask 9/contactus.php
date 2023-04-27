<?php include './header.php'; ?>
<br>
<fieldset>
  <p ><h3 style="color:green;">WANT TO WORK WITH US?</h3></p>
  <form action="./controller/admin/createMessage.php" method="POST" enctype="multipart/form-data">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone"><br>
    <label for="email">Your Mail:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="mess">Your Message:</label><br>
    <input type="text" id="mess" name="mess"><br>
    <br>
    <input type="submit" name = "createMessage" value="Send">
    <input type="reset">
  </form>
</fieldset>

<br><br>

<div  style="text-align: center;">
<div id="demo">
<button type="button" onclick="loadDoc()" style="color:green;">Contact Us</button>
</div>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "./controller/donor/contact.txt", true);
  xhttp.send();
}
</script>
</div>
<br><br>

<?php include './footer.php'; ?>