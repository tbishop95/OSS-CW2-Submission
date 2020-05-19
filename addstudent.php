<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

if (isset($_SESSION['id'])) {

  echo template("templates/partials/header.php");
  echo template("templates/partials/nav.php");

      // layout and form
  $data['content'] = <<<EOD
  <h2 style="text-align:center;">Add New Student</h2>
  <form name="frmdetails" action="confirmstudent.php" method="post">
  Student ID :
  <input name="txtstudentid" type="text" value="" /><br/>
  Password :
  <input name="txtpwd" type="text" value="" /><br/>
  First Name :
  <input name="txtfirstname" type="text" value="" /><br/>
  Surname :
  <input name="txtlastname" type="text"  value="" /><br/>
  Date of Birth :
  <input name="txtdob" type="text"  value="" /><br/>
  Number and Street :
  <input name="txthouse" type="text"  value="" /><br/>
  Town :
  <input name="txttown" type="text"  value="" /><br/>
  County :
  <input name="txtcounty" type="text"  value="" /><br/>
  Country :
  <input name="txtcountry" type="text"  value="" /><br/>
  Postcode :
  <input name="txtpostcode" type="text"  value="" /><br/>
  <input type="submit" value="Save" name="submit"/>
  </form>

  <div class="row">
  <div class="col-sm-4" style=""></div>
  <div class="col-sm-2" style=""></div>
  <div class="col-sm-2" "><input type="submit" value="Save" name="submit"/></div>
  </div>
  </div>
  </form>
  EOD;
  echo template("templates/default.php", $data);

} else {
  header("Location: index.php");
}
echo template("templates/partials/footer.php");

?>