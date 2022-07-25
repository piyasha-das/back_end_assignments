<?php
    // include 'seturl.php';
    // set_url("/resume");
    session_start();
    
    if(!isset($_SESSION['emailid'])){
        header('location:/register');
    }
?>
<!Doctype html>
<head>
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/resume.css">
</head>
<body>
    <div class="full-page">
        <div class="container">
            <div class="row">
                <div class="form-wrapper">
                    <form action="/controller/pdf.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fname">Name:</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="dob">DOB:</label>
                            <input type="date" id="dob" name="dob">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                             <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="emailid">Email id:</label>
                            <?php $emailid=$_SESSION['emailid']; ?>
                            <input type="text" name="emailid">                       
                        </div>
                        <div class="form-group">
                            <label for="profilelink">LinkedIn profile link:</label>
                            <input type="text" name="profilelink">
                        </div>
                        <div class="form-group border border-dark outerschool">SCHOOL
                            <button type="button" onclick="addmore()">add</button>
                            <!-- <button type="button" id="lesschool">Delete</button> -->
                            <div class="form-group">
                                <label for="school">school name:</label>
                                <input type="text" name="sname[]">
                                <label for="school">stream:</label>
                                <input type="text" name="sstream[]">
                                <label for="school">Passing year:</label>
                                <input type="text" name="syear[]">
                                <label for="school">Marks:</label>
                                <input type="text" name="smarks[]">
                            </div>
                            <!-- <div id="box_count" value="1"></div> -->
                            <!-- <div class="form-group border border-dark" id="outerschool2">
                                <button type="button" class="moreschool2">add</button>
                                <button type="button" class="less-school2">Delete</button>
                                <div class="form-group" id="school2">
                                    <label for="school">school name:</label>
                                    <input type="text" name="profilelink">
                                    <label for="school">stream:</label>
                                    <input type="text" name="profilelink">
                                    <label for="school">Passing year:</label>
                                    <input type="text" name="profilelink">
                                    <label for="school">Marks:</label>
                                    <input type="text" name="profilelink">
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group border border-dark outercollege">COLLEGE
                            <button type="button" onclick="addmorecollege()">add</button>
                            <!-- <button type="button" id="lesscollege">Delete</button> -->
                            <div class="form-group">
                                <label for="college">college name:</label>
                                <input type="text" name="cname[]">
                                <label for="college">stream:</label>
                                <input type="text" name="cstream[]">
                                <label for="college">Passing year:</label>
                                <input type="text" name="cyear[]">
                                <label for="college">Marks:</label>
                                <input type="text" name="cmarks[]">
                            </div>
                        </div>
                        <div class="form-group border border-dark outerproject">PROJECTS
                            <button type="button" onclick="addmoreproject()">add</button>
                            <!-- <button type="button" id="lessproject">Delete</button> -->
                            <div class="form-group" id="project">
                                <label for="project">project name:</label>
                                <input type="text" name="pname[]">
                                <label for="project">Description:</label>
                                <input type="text" name="pdescription[]">
                                <label for="project">Completion year:</label>
                                <input type="text" name="pyear[]">
                            </div>
                        </div>
                        <!-- <div class="accordion">
                            <div class="contentBx">
                                <div class="label">List one
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat officiis id assumenda suscipit aliquid, officia ut voluptate rem nobis facilis. Quos quidem saepe sapiente cumque ullam dolore delectus facere iusto.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contentBx">
                                <div class="label">List Two
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat officiis id assumenda suscipit aliquid, officia ut voluptate rem nobis facilis. Quos quidem saepe sapiente cumque ullam dolore delectus facere iusto.</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <button type="submit" name="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addmore(){
            jQuery('.outerschool').append('<div class="form-group border border-dark" id="box_loop"><button type="button" class="less-school2" onclick="deletemore()">Delete</button><div class="form-group" id="school2"><label for="school">school name:</label><input type="text" name="sname[]"><label for="school">stream:</label><input type="text" name="sstream[]"><label for="school">Passing year:</label><input type="text" name="syear[]"><label for="school">Marks:</label><input type="text" name="smarks[]"></div></div>');
        }
        function deletemore(){
            jQuery("#box_loop").remove();
        }
        function addmorecollege(){
            jQuery('.outercollege').append('<div class="form-group border border-dark" id="box_loop_2"><button type="button" class="less-school2" onclick="deletemore_2()">Delete</button><div class="form-group" id="school2"><label for="school">college name:</label><input type="text" name="cname[]"><label for="school">stream:</label><input type="text" name="cstream[]"><label for="school">Passing year:</label><input type="text" name="cyear[]"><label for="school">Marks:</label><input type="text" name="cmarks[]"></div></div>')
        }
        function deletemore_2(){
            jQuery('#box_loop_2').remove();
        }
        function addmoreproject(){
            jQuery('.outerproject').append('<div class="form-group border border-dark" id="box_loop_3"><button type="button" class="less-school2" onclick="deletemore_3()">Delete</button><div class="form-group" id="school2"><label for="school">project name:</label><input type="text" name="pname[]"><label for="school">Description:</label><input type="text" name="pdescription[]"><label for="school">Completion year:</label><input type="text" name="pyear[]"></div></div>');
        }
        function deletemore_3(){
            jQuery('#box_loop_3').remove();
        }
    </script>
</body>
</html>