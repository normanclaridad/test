<html>
    <head>
        <title>Student Records | Add</title>
        <style>
            div { margin: 10px; }
            input { padding: 5px }
            #btnSubmit {
                border: 1px solid #ccc;
                background: #ccc;
            }
        </style>
    </head>
    <body>
        <form id="frmStudent" method="post">
            <div id="result-message">
            </div>
            <div>
                <label for="first_name">First Name : </label>
                <input type="text" id="first_name" name="first_name" placeholder="First Name" />
            </div>
            <div>
                <label for="last_name">Last Name : </label>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" />
            </div>
            <input type="button" value="Submit" id="btnSubmit" onclick="addData()" />
        </form>

        <script type="text/javascript">
            function addData() 
            {
                var fName = document.getElementById("first_name").value;
                var lName = document.getElementById("last_name").value;

                var msg = '';
                if(fName.length <= 5)
                {
                    msg = "First Name is required";
                }

                if(lName.length <= 5)
                {
                    msg += "<br />Last Name is required";
                }

                if(msg.length > 0)
                {
                    document.getElementById("result-message").innerHTML = msg;
                    return;
                }
                
                var param = "first_name=" + fName;
                    param += "&last_name=" + lName;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var json = JSON.parse(this.responseText);
                        
                        document.getElementById("result-message").innerHTML = json['message'];

                        if(json['code'] == 0)
                        {
                            document.getElementById("frmStudent").reset();
                        }
                    }
                };
                xmlhttp.open("POST", "addData.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(param);
            }
        </script>
    </body>
</html>