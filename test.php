<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript">
        var num = [123, 5, 'i', 6, 7, 12.5];

        var pat = /\d+/;
        for(i in num)
        {
            if(pat.test(num[i]))
            {
                if(checkNumber(num[i]))
                {
                    document.write(num[i] + ' is an integer. <br />');
                }
                else
                {
                    document.write(num[i] + ' is a float. <br />');
                }
            }
            else
            {
                document.write(num[i] + ' is not a number. <br />');
            }
        }

        function checkNumber(num)
        {
            // check if it is integer
            if (Number.isInteger(num)) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>
</body>
</html>