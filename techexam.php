<html> 
    <head>
        <title>Technical Exam</title>
    </head>
<body>

    <script type="text/javascript">

        var array = [123,5,'i',6,7,12.5];
        let ntgr = /^-?[0-9]+$/; 
        let flt =  /^[+-]?\d+(\.\d+)?$/;
    
        for (i = 0; i < array.length; i++) 
        {
        text = array[i];

        let nteger = ntgr.test(text);
        let flot = flt.test(text);

        if(nteger) 
        {
            console.log(text);
            document.write(text + " is an integer number.<br>");
        }

        else if(flot)
        {
            document.write(text + " is a float.<br>");
        }
        else
        {
            document.write(text + " is not a number.<br>");
            
        }
        }
      
    </script>
</body>
</html>