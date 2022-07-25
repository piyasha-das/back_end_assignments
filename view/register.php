<?php
    // include 'seturl.php';
    // set_url("/register");
    if(isset($_SESSION['emailid'])){
        header('location:/homepage');
    }
?>
<!Doctype html>
<head>
    <link rel="stylesheet" href="/view/style.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/x.y.z/underscore-min.js"></script> -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="full-page">
        <div id='login-form' class='login-page'>
            <div class='form-box'>
                <div class='button-box'>
                    <div class="btn"></div>
                    <button type="button" onclick='login()' class='toggle-btn active'>Log In </button>
                    <button type="button" onclick='register()' class='toggle-btn'>Register </button>
                </div>
                <!-- <div></div> -->
                <form id='login' action="/controller/logincontroller1.php"class='input-group-login' method="POST">
                    <!-- <input type='text' name="login-email" class='input-field' placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> -->
                    <input type='text' name="login-email" class='input-field' placeholder="Email id">
                    <input type='password' name="login-password" class='input-field' placeholder="password">
                    <!-- <input type='checkbox' class='check-box'><span>remember password</span> -->
                    <div class="form-check" id="submit">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">remember password
                        </label>
                    </div>
                    <button type='submit' class='submit-btn' name='submit-login'>Log-in</button>
                    <button type='submit' id="submit" name="submit-linkedin" class='submit-btn'>Log-in via linkedin</button>
                </form>
                <form id='register' action='/controller/Registercontroller.php' class='input-group-register' method="POST">
                    <input type='text' class='input-field' name="username" pattern="[A-Za-z]{1,}" placeholder="username" required>
                    <input type='text' class='input-field' name="emailid" placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"required>
                    <input type='password' class='input-field' name="password" placeholder="password" required>
                    <input type='password' class='input-field' name="confirm_password" placeholder="confirm_password" required>
                    <button type='submit' class='submit-btn' name='submit'>Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z= document.getElementById('btn');
        function register(){
            x.style.left='400px';
            y.style.left='50px';
            z.style.left='110px';
        }
        function login(){
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }
    </script>
    <script>
        var modal=document.getElementById('login-form');
        window.onclick=function(event)
        {
            if(event.target==modal){
                modal.style.display="none";
            }
        }
        $(".toggle-btn").click(function(){
            $(".toggle-btn").removeClass("active");
            $(this).addClass("active");
        });
    </script>
</body>
</html>