<!DOCTYPE html>
<html>
<head>
    <title>Code generator</title>
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/dobPicker.min.js"></script>
    <script src="scripts/formvalidator.js"></script>
    <script>
        $(document).ready(function () {
            $.dobPicker
            ({
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
</head>