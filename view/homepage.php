<?php
    session_start();
    // echo $_SESSION['emailid'];
    if(!isset($_SESSION['emailid'])){
        header('location:/register');
    }
    // echo session_id();
    // echo !empty(session_id());
    // include 'seturl.php';
    // set_url("/homepage");
?>
<!Doctype html>
<head>
    <link rel="stylesheet" href="/view/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href="/view/register.php"></a>
            </div>
            <nav>
                <ul id="Menuitems">
                    <li><a href="#">Home</a></li>
                    <li><a href="/aboutus">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="/view/signout.php">Sign out</a></li>
                    <li><a href="/profile">Profile</a></li>
                </ul>
            </nav>
        </div>
    <form action="/resume">
        <div class="text">
            <p>Your job resume is your first step of introduction to the recruiter. However, given the importance of job resumes, recruiters spend a meager time of six seconds glancing through any individual resume before deciding it is worth their time or not.

In those six seconds, if your resume doesn’t click as something exciting, then it might end up in the pile of rejected job resumes.

To ensure that your hard work doesn’t go to waste and you have an audience for your skills and talents, we have brought some resume examples for you.

This will give you a hint of what kind of resumes work and what should you include in the headline and the body and what should be your ideal resume template.
        </p>
        <button type='submit' class='resume-btn'>start buliding your resume</button>
        </div>
    </form>
    </div>
</body>
</html>