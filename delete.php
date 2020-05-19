<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


   // check logged in
if (isset($_SESSION['id'])) {

  echo template("templates/partials/header.php");
  echo template("templates/partials/nav.php");

      //check if the delete button contains a value
  if(isset($_POST['btndel'])){
      // Delete student records parsed from the student entity
    foreach ($_POST['stuID'] as $id){
      $sql = "Delete FROM student ";
      $sql .= "WHERE studentid = $id";
      $result = mysqli_query($conn,$sql);
    }
  }
      // prepare page content

  $data['content'] .= "<p>'Selected items deleted'</p>";

  mysqli_close($conn);

      // link back to students.php
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