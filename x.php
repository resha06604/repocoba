<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/datatables/datatables.min.css">
    <script src="assets/datatables/datatables.min.js"></script>


</head>

<body>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <td>1</td>
                <td>2</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>D1</td>
                <td>D2</td>
            </tr>
            <tr>
                <td>D3</td>
                <td>D4</td>
            </tr>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('myTable').DataTable();
        });
    </script>
</body>

</html>