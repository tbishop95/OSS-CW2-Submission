<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


   // check logged in
if (isset($_SESSION['id'])) {

  echo template("templates/partials/header.php");
  echo template("templates/partials/nav.php");

      //check if the submit button contains a value
  if(isset($_POST['submit'])){

      // Build SQL statment that adds the new student and their corresponding details
    $sql = "insert INTO student ";
    $sql .= "(studentid, password, dob, firstname, lastname, house, town, county, country, postcode) VALUES ";
    $sql .= "('$_POST[txtstudentid]', '$_POST[txtpwd]', '$_POST[txtdob]', '$_POST[txtfirstname]', '$_POST[txtlastname]', ";
    $sql .= "'$_POST[txthouse]', '$_POST[txttown]', '$_POST[txtcounty]', '$_POST[txtcountry]', '$_POST[txtpostcode]');";

    $result = mysqli_query($conn,$sql);
  }
      // prepare page content

  $data['content'] .= "<p>'Added New Student'</p>";

  mysqli_close($conn);

      // Link back to students.php
  $data['content'] .= "<form action='students.php' method='post'>";
  $data['content'] .= "<input type='submit' name='btnback' value='Back'/>";
  $data['content'] .= "</form>";

      // render the template
  echo template("templates/default.php", $data);

} else {
  header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>