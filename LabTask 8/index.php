<html>
    <head>
        <title>FDMS | Home Page</title>
    </head>
    <body>
    <?php include './header.php'; ?>
<div style="text-align: center;">
<h2 >Welcome to Food Donation Management System </h2>
<p><b>Food Donation Management System </b> is a mission to end hunger and no wasting of food to make a hungry-free world.  Food is wasted in many ways so it’s better to give someone else who needs that food.</p>

<ul>
    <ul>
        The application for food donation acts as an interface for users who are looking for a channel to give excess food without wasting it.
</ul>
    <ul>Our main motto is to help needy people.</ul>
    <ul>Large quantities of wholesome edible food are often unused or leftover and discarded from household kitchens and eating establishments.</ul>
</ul>
<p>Less food loss and donating food help to reduce many environmental problems such as pollution, causing global warming, and climate change.</p>

<br><br>
</div>
<div  style="text-align: center;">
<div id="demo">
<button type="button" onclick="loadDoc()" style="color:green;"><h3>Our Mission</h3></button>
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
  xhttp.open("GET", "./controller/admin/mission.txt", true);
  xhttp.send();
}
</script>
</div>
    <br>


    <?php include './footer.php'; ?>
        
        

        
    </body>
</html>