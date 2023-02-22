<!DOCTYPE html>
<html>

<head>
    <title>Flatpickr Example</title>
    <link rel="stylesheet" type="text/css" href="assets/css/flatpickr.min.css" />
</head>

<body>
    <h1>Choose a date:</h1>
    <input type="text" id="myDate">
    <script src="assets/js/flatpickr.js"></script>
    <script>
        var myDate = document.getElementById("myDate");

        flatpickr(myDate, {
            mode: 'range',
            dateFormat: "Y-m-d H:i",
        });
    </script>
</body>

</html>