<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body onload="loadStudentRecords()">
    <div class="container-fluid">
        <p><b>Student Records</b></p>
        <!-- <p>Suggestions: <span id="txtHint"></span></p> -->
        <a href="add.php">Add New</a>
        <table id="" class="table table-bordered">
            <thead>
            <tr>
                <th>
                    First Name
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Updated At
                </th>
            </tr>
            </thead>
            <tbody id="tblStudents">
            </tbody>
        </table>
    </div>
        <script type="text/javascript">
            function loadStudentRecords() 
            {               
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var json = JSON.parse(this.responseText);
                        // var opt  = '<option value="">Select</option>';
                        // var tr = '<tr>' + 
                        //             '<th> First Name </th>' +
                        //             '<th> Last Name</th>' +
                        //             '<th> Created At</th>' + 
                        //             '<th> Updated At</th>' +
                        //         '</tr>';

                        var tr = '';

                        // Loop the json data
                        for (i in json) {
                            tr += '<tr>';
                            tr += '<td>' + json[i]['first_name'] + '</td>';
                            tr += '<td>' + json[i]['last_name'] + '</td>';
                            tr += '<td>' + json[i]['created_at'] + '</td>';
                            tr += '<td>' + json[i]['updated_at'] + '</td>';
                            tr += '</tr>';
                        }

                        document.getElementById('tblStudents').innerHTML = tr;
                    }
                };
                xmlhttp.open("GET", "gethint.php", true);
                xmlhttp.send();
            }
        </script>
        <script src="node_modules/jquery/dist/js/jquery.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    </body>
</html>