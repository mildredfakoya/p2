<?php
include "sanitize.php";
?>

<!doctype html>
<html lang ="en">
<head>
<title> Registration Form </title>
<meta charset ="utf-8">
<meta name ="viewport" content ="width=device-width, initial-scale =1.0">
<link rel ="stylesheet" type ="text/css" href ="css/style.css">
<script src="script/jquery-3.2.1.min.js"></script>
<script>

$(document).ready(function(){
  $.dobPicker({
    daySelector: '#dobday', /* Required */
    monthSelector: '#dobmonth', /* Required */
    yearSelector: '#dobyear', /* Required */
    dayDefault: 'Day', /* Optional */
    monthDefault: 'Month', /* Optional */
    yearDefault: 'Year', /* Optional */
    minimumAge: 0, /* Optional */
    maximumAge: 100 /* Optional */
  });
});

</script>
<script src="script/datepicker.min.js"></script>
</head>
<body>
<div class="row">
<div class ="col-3 sidebar">
<h3>Test code algorithm</h3>
<p>The testing code for each client is generated thus:<br/>
- First letter of first name<br/>
- First letter of mother's maiden name, if this is unknown, please fill in unknown<br/>
- First letter of last name<br/>
-two digit year of birth<br/>
-first letter of gender. m for male and f for female<br/>
when all information are entered into the form, the code will be generated automatically<p>
</div>
<div class ="col-9 formwrapper">
  <h1>New Screening Form</h1>
  <form method ="post" action ="startest.php">
  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "firstname">First Name </label></div>
  <div class ="col-6"><input type ="text" name ="firstname" id ="firstname">  <span class ="error">*Required</span></div>
</div>

  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "lastname">Last Name </label></div>
  <div class ="col-6"><input type ="text" name ="lastname" id ="lastname">  <span class ="error">*Required</span></div>
 </div>

  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "maidenname">Mothers' maiden Name </label></div>
  <div class ="col-6"><input type ="text" name ="maidenname" id ="maidenname">  <span class ="error">*Required</span></div>
 </div>

  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "dob">Date of birth </label></div>
  <div class ="col-6"><div class="row">
<div class="col-4">
<select id="dobday" name ='day'></select>
</div>
<div class="col-4">
<select id="dobmonth" name ='month'></select>
</div>
<div class="col-4">
<select id="dobyear" name ='year'></select>
</div>
<p id ='year' class ="error">Year of Birth is Required to Generate Testing Code. Leaving this field Blank will use an YY for testing code generation</p>
</div></div>
  </div>

  <fieldset class ="row">
 <legend>Select a Gender</legend>
  <div class ="col-6"><input type ="radio" name ="gender" value ="female">Female </div>
  <div class ="col-6"><input type ="radio" name = "gender" value ="male">Male </div>
<span class ="error">*Required</span></fieldset>

  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "card">Type of Photo ID</label></div>
<div class ="col-6">
  <select name ="card" id ="card">
    <option selected disabled>[choose here]</option>
    <option value= "driver's license">Driver's License</option>
    <option value= "National ID card">National ID card</option>
    <option value= "international passport">International Passport</option>
    <option value= "multi-purpose ID">Multi purpose ID</option>
    <option value= "Hospital Registration Number">Hospital Registration Number</option>
  </select></div>
  </div>

  <div class ="row">
  <div class ="col-6 columnspacer"><label for= "notes">Note</label></div>
  <div class ="col-6"><textarea rows = 5 cols =20 id ="notes"></textarea> </div>

  </div>

 <button type ="submit"> Get Test Code </button>
  </form>
</div>
</div>
<div class ="row">

</div>
</body>

</html>
