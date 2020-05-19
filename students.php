<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


   // check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

      // SQL statment that selects a student's modules
   $sql = "select * from student;";

   $result = mysqli_query($conn,$sql);

   $data['content'] .= "<form action='delete.php' method='post'>";
   $data['content'] .= "<table border='1'>";
   $data['content'] .= "<tr><th colspan='10' align='center'>Students</th></tr>";
   $data['content'] .= "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th>";
   $data['content'] .= "<th>House</th><th>Town</th><th>Postcode</th></tr>";

      // Students html table
   while($row = mysqli_fetch_array($result)) {
      $data['content'] .= "<tr><td> $row[studentid] </td><td> $row[firstname] </td>";
      $data['content'] .= "<td> $row[lastname] </td><td> $row[dob] </td>";
      $data['content'] .= "<td> $row[house] </td><td> $row[town] </td>";
      $data['content'] .= "<td> $row[postcode] </td>";
      $data['content'] .= "<td><input type='checkbox' name='stuID[]' value='$row[studentid]'/></td></tr>";
   }
   $data['content'] .= "</table>";

      //Form uses check boxes to select which students to delete upon pressing the Delete button
   $data['content'] .= "<input type='submit' name='btndel' id='delete' value='Delete'/>";
   $data['content'] .= "</form>";

      // New Student button opens a new page with form for adding student details
   $data['content'] .= "<form action='addstudent.php' method='post'>";
   $data['content'] .= "<input type='submit' name='btnnew' id='new' value='New Student'/>";
   $data['content'] .= "</form>";

   mysqli_close($conn);

      // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
