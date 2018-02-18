<?php require('process.php');
require('includes/head.php');
?>
<body>
<div class="spacer"></div>
<div class="row">
    <div class="col-3 sidebar">
        <h3>Test code algorithm</h3>
        <p>The testing code for each client is generated thus:<br/>
           - First letter of first name<br/>
           - First letter of mother's maiden name, if this is unknown, the system will fill in unknown on form submission<br/>
           - First letter of last name<br/>
           -two digit year of birth. if the year of birth is unknown, the system will fill in the letters YYYY on form submission.<br/>
           -first letter of gender. m for male and f for female<br/>
           when all information are entered into the form, the code will be generated automatically
        <p>
    </div>
    <div class="col-9 formwrapper">
        <h1>New Screening Form</h1>
        <p class='info'>Fields marked with <span class='error'>*</span> are Required</p>
        <div class="color5" id="testcode"></div>
        <form method="POST">
            <div class="row">
                <div class="col-6 columnspacer"><label for="firstname">First Name </label></div>
                <div class="col-6"><input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                    <span class="error">* <?php echo $firstnameErr ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6 columnspacer"><label for="lastname">Last Name </label></div>
                <div class="col-6"><input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                    <span class="error">* <?php echo $lastnameErr ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6 columnspacer"><label for="maidenname">Mothers' maiden Name </label></div>
                <div class="col-6"><input type="text"
                                          name="maidenname"
                                          id="maidenname"
                                          value="<?php echo $maidenname; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 columnspacer"><label for="dob">Date of birth </label></div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <select id="dobday" name='day'>
                                <option value="<?php echo $day; ?>" selected><?php echo $day; ?></option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select id="dobmonth" name='month'>
                                <option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
                            </select>
                        </div>

                        <div class="col-4">
                            <select id="dobyear" name='year'>
                                <option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
                            </select>
                        </div>
                        <p id='year'
                           class="info">Year of Birth is used to Generate Testing Code. Leaving this field Blank will use YY for testing code generation</p>
                    </div>
                </div>
            </div>
            <fieldset class="row">
                <legend>Select a Gender</legend>
                <div class="col-6">
                    <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>>Female
                </div>
                <div class="col-6">
                    <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>>Male
                </div>
                <span class="error">* <?php echo $genderErr ?></span></fieldset>
            <div class="row">
                <div class="col-6 columnspacer"><label for="card">Type of Photo ID</label></div>
                <div class="col-6">
                    <select name="card" id="card">
                        <option selected disabled>[choose here]</option>
                        <option value="driver's license" <?php if ($card == "driver's license") echo 'selected'; ?>>Driver's License</option>
                        <option value="National ID card" <?php if ($card == "National ID card") echo 'selected'; ?>>National ID card</option>
                        <option value="international passport" <?php if ($card == "international passport") echo 'selected'; ?>>International Passport</option>
                        <option value="multi-purpose ID" <?php if ($card == "multi-purpose ID") echo 'selected'; ?>>Multi purpose ID</option>
                        <option value="Hospital Registration Number" <?php if ($card == "Hospital Registration Number") echo 'selected'; ?>>Hospital Registration Number</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 columnspacer"><label for="notes">Note</label></div>
                <div class="col-6"><textarea rows=5 cols=20 id="notes" name='notes'><?php echo $notes; ?> </textarea>
                </div>
            </div>
            <button type="submit" name="submit"> Get Test Code</button>
        </form>
    </div>

</body>
