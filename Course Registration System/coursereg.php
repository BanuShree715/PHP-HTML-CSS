
<html>

<head>

<title>EduSphere - Course Registration</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;
    min-height:100vh;
    background:linear-gradient(
        135deg,
        #eab166,
        #a24b4b,
        #00b894
    );
}

.header{
    text-align:center;
    color:white;
    padding:30px 10px 20px;
}

.header .logo{
    font-size:55px;
}

.header h1{
    margin:5px;
    font-size:32px;
}

.header p{
    margin:8px;
    opacity:0.9;
}

.container{
    width:650px;
    max-width:94%;
    margin:10px auto 35px;
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:
        0 20px 45px rgba(0,0,0,0.25);
}



.form-area{
    padding:30px;
}

.title{
    text-align:center;
    margin-bottom:25px;
}

.title h2{
    color:#667eea;
    margin:7px;
}

.title p{
    color:#636e72;
}



.section-title{
    color:#2d3436;
    border-left:5px solid #667eea;
    padding-left:10px;
    margin-top:20px;
}



.input-group{
    margin-bottom:17px;
}

label{
    display:block;
    font-weight:bold;
    color:#2d3436;
    margin-bottom:7px;
}

input,
select{
    width:100%;
    padding:13px;
    border:2px solid #dfe6e9;
    border-radius:11px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

input:focus,
select:focus{
    border-color:#667eea;
    box-shadow:
        0 0 8px rgba(102,126,234,0.25);
}



.course-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:12px;
    margin:15px 0;
}

.course{
    padding:15px;
    border:2px solid #eee;
    border-radius:12px;
    text-align:center;
    background:#fafafa;
    transition:0.3s;
}

.course:hover{
    transform:translateY(-3px);
    border-color:#667eea;
    background:#f4f2ff;
}

.course-icon{
    font-size:30px;
    display:block;
}

.course-name{
    font-weight:bold;
    color:#2d3436;
    margin-top:5px;
}



.register-btn{
    width:100%;
    padding:15px;
    margin-top:15px;
    border:none;
    border-radius:12px;
    background:
        linear-gradient(
            90deg,
            #667eea,
            #764ba2
        );
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.register-btn:hover{
    transform:translateY(-3px);
    box-shadow:
        0 8px 18px rgba(0,0,0,0.2);
}


.error-box{
    background:#ffe6e6;
    border-left:5px solid #e74c3c;
    color:#c0392b;
    padding:12px 15px;
    border-radius:8px;
    margin-bottom:20px;
}

.error-box p{
    margin:5px 0;
}



.success-box{
    background:
        linear-gradient(
            135deg,
            #dff9fb,
            #e8fff4
        );
    border:2px solid #00b894;
    border-radius:15px;
    padding:20px;
    margin-bottom:25px;
    text-align:center;
}

.success-icon{
    font-size:45px;
}

.success-box h2{
    color:#00a884;
    margin:8px;
}



.registration-card{
    margin-top:15px;
    background:#f8f9fa;
    border-radius:12px;
    padding:18px;
    text-align:left;
}

.registration-card p{
    margin:10px 0;
    color:#2d3436;
    border-bottom:1px solid #e5e5e5;
    padding-bottom:8px;
}

.registration-id{
    text-align:center;
    background:#667eea;
    color:white;
    padding:10px;
    border-radius:8px;
    font-weight:bold;
    margin-bottom:15px;
}



.footer{
    text-align:center;
    color:white;
    padding:15px;
    font-size:13px;
}


@media(max-width:550px){

    .course-grid{
        grid-template-columns:1fr;
    }

    .header h1{
        font-size:25px;
    }

}

</style>

</head>

<body>



<div class="header">

    <div class="logo"></div>

    <h1>EduSphere</h1>

    <p>
        Learn Today • Lead Tomorrow
    </p>

</div>


<div class="container">

<div class="form-area">


<?php

$name = "";
$email = "";
$course = "";
$errors = [];
$success = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    
    $name =
        trim($_POST["name"]);

    $email =
        trim($_POST["email"]);

    $course =
        $_POST["course"];


   

    if(empty($name))
    {
        $errors[] =
            " Name is required.";
    }


    if(!filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    ))
    {
        $errors[] =
            " Enter a valid email address.";
    }


    if(empty($course))
    {
        $errors[] =
            " Please select a course.";
    }


    

    if(empty($errors))
    {
        $success = true;

        $registrationID =
            "EDU" . rand(10000,99999);
    }

}

?>


<?php

if(!empty($errors))
{

?>



<div class="error-box">

    <strong> Please correct the following:</strong>

    <?php

    foreach($errors as $error)
    {

        echo "<p>$error</p>";

    }

    ?>

</div>

<?php

}


if($success)
{

?>


<div class="success-box">

    <div class="success-icon">
        
    </div>

    <h2>
        Registration Successful!
    </h2>

    <p>
        Welcome to EduSphere!
        Your course registration is confirmed.
    </p>


    <div class="registration-card">

        <div class="registration-id">

             Registration ID:
            <?php echo $registrationID; ?>

        </div>

        <p>
            
            <b>Student Name:</b>
            <?php echo htmlspecialchars($name); ?>
        </p>

        <p>
            
            <b>Email:</b>
            <?php echo htmlspecialchars($email); ?>
        </p>

        <p>
            
            <b>Selected Course:</b>
            <?php echo htmlspecialchars($course); ?>
        </p>

    </div>

</div>

<?php

}

?>


<div class="title">

    <div style="font-size:40px;">
        
    </div>

    <h2>
        Course Registration
    </h2>

    <p>
        Start your learning journey today!
    </p>

</div>


<form method="post">




<h3 class="section-title">
    Student Details
</h3>


<div class="input-group">

    <label>
        Full Name
    </label>

    <input
        type="text"
        name="name"
        placeholder="Enter your full name"
        value="<?php
        echo htmlspecialchars($name);
        ?>"
        required>

</div>


<div class="input-group">

    <label>
        Email Address
    </label>

    <input
        type="email"
        name="email"
        placeholder="example@email.com"
        value="<?php
        echo htmlspecialchars($email);
        ?>"
        required>

</div>




<h3 class="section-title">
     Choose Your Course
</h3>


<div class="course-grid">

    <div class="course">

        <span class="course-icon">
            
        </span>

        <div class="course-name">
            PHP
        </div>

    </div>


    <div class="course">

        <span class="course-icon">
            
        </span>

        <div class="course-name">
            Java
        </div>

    </div>


    <div class="course">

        <span class="course-icon">
            
        </span>

        <div class="course-name">
            Python
        </div>

    </div>


    <div class="course">

        <span class="course-icon">
            
        </span>

        <div class="course-name">
            Web Development
        </div>

    </div>

</div>


<div class="input-group">

    <label>
        Select Course
    </label>

    <select name="course">

        <option value="">
            -- Select Your Course --
        </option>

        <option
            value="PHP"
            <?php
            if($course=="PHP")
                echo "selected";
            ?>>

            PHP Programming

        </option>

        <option
            value="Java"
            <?php
            if($course=="Java")
                echo "selected";
            ?>>

            Java Programming

        </option>

        <option
            value="Python"
            <?php
            if($course=="Python")
                echo "selected";
            ?>>

            Python Programming

        </option>

        <option
            value="Web Development"
            <?php
            if($course=="Web Development")
                echo "selected";
            ?>>

            Web Development

        </option>

    </select>

</div>


<button
    type="submit"
    class="register-btn">

     Register for Course

</button>


</form>


</div>

</div>


<div class="footer">

    © 2026 EduSphere
    | Learn • Grow • Succeed 🎓

</div>


</body>

</html>

