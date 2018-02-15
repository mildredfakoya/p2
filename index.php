<?php
require_once "userdefinedfunctions.php";
$functions = new UserDefinedFunctions();
$firstname = $lastname = $maidenname = $day = $month = $year = $gender = $card =$notes ="";
$firstnameErr = $lastnameErr = $genderErr ="";
// Getting the form data
if(isset($_POST['submit'])) {
    $firstname = strtoupper(!empty($_POST['firstname']) ? $functions->sanitize($_POST['firstname']) : null);
    $lastname = strtoupper(!empty($_POST['lastname']) ? $functions->sanitize($_POST['lastname']) : null);
    $maidenname = !empty($_POST['maidenname']) ? $functions->sanitize($_POST['maidenname']) : null;
    $day = !empty($_POST['day']) ? $functions->sanitize($_POST['day']) : null;
    $month = !empty($_POST['month']) ? $functions->sanitize($_POST['month']) : null;
    $year = empty($_POST["year"]) ? "yyyy" : (!empty($_POST['year']) ? $functions->sanitize($_POST['year']) : null);
    $gender = !empty($_POST['gender']) ? $functions->sanitize($_POST['gender']) : null;
    $card = !empty($_POST['card']) ? $functions->sanitize($_POST['card']) : null;
    $notes = !empty($_POST['notes']) ? $functions->sanitize($_POST['notes']) : null;
    if (empty($firstname)) {
        $firstnameErr = "First name is required";
    }
    if (empty($lastname)) {
        $lastnameErr = "Last name is required";
    }

    if (empty($gender)) {
        $genderErr = "Please select a gender";
    }
    if (empty($maidenname)) {
        $maidenname = "unknown";
    }

//Automatically generate the testing code.
    $a = substr($firstname, 0, 1);
    $b = substr($maidenname, 0, 1);
    $c = substr($lastname, 0, 1);
    $d = substr($year, 2);
    $e = substr($gender, 0, 1);
    $testingcode = strtoupper($a . $b . $c . $d . $e);

    if ($firstname && $lastname && $gender) {
        echo '<span class ="color3"> A test record has been successfully created for ' . $firstname . " " . $lastname . ". The testing code is: " . $testingcode . '</span>';
    }
    else{
    echo '<span class ="error">Please fill in all the required field for the testing code to be generated</span>';
    }
}
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
    <div class ="spacer"></div>
  <div class="row">
  <div class ="col-3 sidebar">
  <h3>Test code algorithm</h3>
  <p>The testing code for each client is generated thus:<br/>
  - First letter of first name<br/>
  - First letter of mother's maiden name, if this is unknown, the system will fill in the letter U<br/>
  - First letter of last name<br/>
  -two digit year of birth. if the year of birth is unknown, the system will fill in the letters YY.<br/>
  -first letter of gender. m for male and f for female<br/>
  when all information are entered into the form, the code will be generated automatically<p>
  </div>
  <div class ="col-9 formwrapper">
    <h1>New Screening Form</h1>
    <p class ='info'>Fields marked with <span class ='error'>*</span> are Required</p>
    <div class ="color5" id ="testcode"></div>
    <form method ="POST">
    <div class ="row">
    <div class ="col-6 columnspacer"><label for= "firstname">First Name </label></div>
    <div class ="col-6"><input type ="text" name ="firstname" id ="firstname" value = "<?php echo $firstname; ?>">  <span class ="error">* <?php echo $firstnameErr?></span></div>
  </div>
    <div class ="row">
    <div class ="col-6 columnspacer"><label for= "lastname">Last Name </label></div>
    <div class ="col-6"><input type ="text" name ="lastname" id ="lastname" value ="<?php echo $lastname;?>">  <span class ="error">* <?php echo $lastnameErr?></span></div>
   </div>
    <div class ="row">
    <div class ="col-6 columnspacer"><label for= "maidenname">Mothers' maiden Name </label></div>
    <div class ="col-6"><input type ="text" name ="maidenname" id ="maidenname" value ="<?php echo $maidenname;?>"></div>
   </div>
    <div class ="row">
    <div class ="col-6 columnspacer"><label>Date of birth </label></div>
    <div class ="col-6"><div class="row">
  <div class="col-4">
  <select id="dobday" name ='day'>
  <option value ="<?php echo $day;?>" selected><?php echo $day;?></option></select>
  </div>

  <div class="col-4">
  <select id="dobmonth" name ='month'>
  <option value ="<?php echo $month;?>" selected><?php echo $month;?></option></select>
  </div>

  <div class="col-4">
  <select id="dobyear" name ='year'>
  <option value ="<?php echo $year;?>" selected><?php echo $year;?></option></select>
  </div>

  <p id ='year' class ="info">Year of Birth is used to Generate Testing Code. Leaving this field Blank will use YY for testing code generation</p>
  </div></div> </div>
    <fieldset class ="row">
   <legend>Select a Gender</legend>
    <div class ="col-6"><input type ="radio" name ="gender" value ="female" <?php if($gender=='female') echo 'checked';?>>Female </div>
    <div class ="col-6"><input type ="radio" name = "gender" value ="male" <?php if($gender=='male') echo 'checked';?>>Male </div>
  <span class ="error">* <?php echo $genderErr?></span></fieldset>
    <div class ="row">
    <div class ="col-6 columnspacer"><label for= "card">Type of Photo ID</label></div>
  <div class ="col-6">
    <select name ="card" id ="card">
      <option selected disabled>[choose here]</option>
      <option value= "driver's license" <?php if($card=="driver's license") echo 'selected';?>>Driver's License</option>
      <option value= "National ID card" <?php if($card=="National ID card") echo 'selected';?>>National ID card</option>
      <option value= "international passport"  <?php if($card=="international passport") echo 'selected';?>>International Passport</option>
      <option value= "multi-purpose ID" <?php if($card=="multi-purpose ID") echo 'selected';?>>Multi purpose ID</option>
      <option value= "Hospital Registration Number"  <?php if($card=="Hospital Registration Number") echo 'selected';?>>Hospital Registration Number</option>
    </select></div></div>
    <div class ="row">
    <div class ="col-6 columnspacer"><label for= "notes">Note</label></div>
    <div class ="col-6"><textarea rows = 5 cols =20 id ="notes" name = 'notes'><?php echo $notes;?> </textarea> </div>
    </div>
   <button type ="submit" name ="submit"> Get Test Code </button>
    </form>
  </div>
  </div>
  </body>
  </html>
