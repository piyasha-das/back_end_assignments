<!Doctype html>
<head>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
</head>
<body>
    <script>
            // var a = $('#eng').val();
            // console.log(a);
            // if(a.is_numeric){
            //      alert("only numbers are allowed");
            // });
                // console.log($.isNumeric($('#eng').val()));
                var a=$("#eng").val();
                    if ($('#eng').val() !== undefined) {
                        console.log($('#eng').val().length);
                    }
                    $('#eng').keypress(function(){
                        console.log("hello");
                        if(!$.isNumeric($('#eng').val())&& $('#eng').val().length>0){
                             alert("All the text boxes must have numeric values!");
                        }
                    });
                
    </script>
  <form method="post" action="submit.php">
    English: <input type="text" name="eng" id="eng"><br>
    Maths: <input type="text" name="maths"><br>
    Physics: <input type="text" name="phy"><br>
    Biology: <input type="text" name="bio"><br>
    <input type="submit" name="submit" value="submit" class="submit"><br>
    </form>
</body>
</html>