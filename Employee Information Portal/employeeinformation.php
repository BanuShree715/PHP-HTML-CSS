

<html>

<head>

<title>Employee Digital ID Portal</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;

    background:
    linear-gradient(135deg,#ff758c,#ff7eb3,#6a5acd);

    min-height:100vh;
    padding:30px 10px;
}



.container{
    width:480px;
    max-width:95%;
    margin:auto;

    background:#ffffff;

    border-radius:25px;

    overflow:hidden;

    box-shadow:0 20px 45px rgba(0,0,0,0.3);
}



.header{
    background:
    linear-gradient(135deg,#4a148c,#7b1fa2);

    color:white;

    text-align:center;

    padding:25px;
}

.header .icon{
    font-size:55px;
}

.header h1{
    margin:5px;
    font-size:28px;
}

.header p{
    margin:5px;
    color:#ead7ff;
}



.content{
    padding:25px;
}

.title{
    text-align:center;
    color:#4a148c;
}



label{
    display:block;

    margin-top:13px;
    margin-bottom:6px;

    font-weight:bold;

    color:#4a148c;
}

input,select{

    width:100%;

    padding:12px;

    border:2px solid #eadcf5;

    border-radius:10px;

    outline:none;

    font-size:14px;
}

input:focus,select:focus{

    border-color:#9c27b0;

    box-shadow:0 0 5px #d7a7e5;
}



button{

    width:100%;

    padding:14px;

    margin-top:22px;

    border:none;

    border-radius:12px;

    background:
    linear-gradient(90deg,#ff512f,#dd2476);

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;
}

button:hover{

    transform:scale(1.02);

}

.card{

    margin-top:25px;

    padding:20px;

    border-radius:20px;

    background:
    linear-gradient(135deg,#4a148c,#8e24aa,#ec407a);

    color:white;

    box-shadow:0 10px 25px rgba(0,0,0,0.2);

    position:relative;

    overflow:hidden;
}
 

.card:before{

    content:"";

    position:absolute;

    width:130px;
    height:130px;

    background:rgba(255,255,255,0.1);

    border-radius:50%;

    right:-40px;
    top:-40px;
}

.card:after{

    content:"";

    position:absolute;

    width:90px;
    height:90px;

    background:rgba(255,255,255,0.08);

    border-radius:50%;

    left:-30px;
    bottom:-30px;
}


.profile{

    text-align:center;

    position:relative;

    z-index:1;
}

.avatar{

    width:75px;
    height:75px;

    margin:auto;

    background:white;

    color:#7b1fa2;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:38px;
}

.profile h2{

    margin:10px 0 5px;
}

.id{

    display:inline-block;

    padding:5px 12px;

    background:rgba(255,255,255,0.2);

    border-radius:20px;

    font-size:13px;
}



.info{

    margin-top:18px;

    background:rgba(255,255,255,0.15);

    padding:15px;

    border-radius:12px;

    line-height:2;

    position:relative;

    z-index:1;
}

.badge{

    background:#ffd166;

    color:#4a148c;

    padding:5px 10px;

    border-radius:15px;

    font-weight:bold;
}

.salary{

    color:#ffe082;

    font-weight:bold;
}



.error{

    margin-top:15px;

    background:#ffebee;

    color:#c62828;

    padding:12px;

    border-radius:10px;

    font-weight:bold;
}



.footer{

    background:#311b92;

    color:#ead7ff;

    text-align:center;

    padding:14px;

    font-size:13px;
}

</style>

</head>


<body>


<div class="container">




<div class="header">

    <div class="icon">🪪</div>

    <h1>WorkID</h1>

    <p>Digital Employee Information Portal</p>

</div>


<div class="content">

<h2 class="title">

     Create Your Employee ID

</h2>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=trim($_POST["name"]);
    $email=trim($_POST["email"]);
    $phone=trim($_POST["phone"]);
    $department=$_POST["department"];
    $salary=trim($_POST["salary"]);

    $errors=[];



    if(empty($name)){
        $errors[]="Employee name is required.";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="Enter a valid email address.";
    }

    if(!preg_match("/^[0-9]{10}$/",$phone)){
        $errors[]="Phone number must contain 10 digits.";
    }

    if(empty($department)){
        $errors[]="Please select department.";
    }

    if(!is_numeric($salary) || $salary<=0){
        $errors[]="Enter a valid salary.";
    }


   

    if(!empty($errors)){

        foreach($errors as $error){

            echo "<div class='error'> $error</div>";

        }

    }


   

    else{

        $employeeID="WID".rand(10000,99999);

        echo "

        <div class='card'>

            <div class='profile'>

                <div class='avatar'>
                    
                </div>

                <h2>
                    ".htmlspecialchars($name)."
                </h2>

                <span class='id'>
                    Employee ID : $employeeID
                </span>

            </div>


            <div class='info'>

                 <b>Email:</b>
                ".htmlspecialchars($email)."

                <br>

                 <b>Phone:</b>
                ".htmlspecialchars($phone)."

                <br>

                 <b>Department:</b>
                <span class='badge'>
                ".htmlspecialchars($department)."
                </span>

                <br>

                 <b>Salary:</b>
                <span class='salary'>
                ₹".number_format($salary,2)."
                </span>

            </div>

        </div>

        ";

    }

}

?>




<form method="post">


<label> Employee Name</label>

<input
type="text"
name="name"
placeholder="Enter employee name"
required
>


<label> Email Address</label>

<input
type="email"
name="email"
placeholder="employee@gmail.com"
required
>


<label> Phone Number</label>

<input
type="text"
name="phone"
maxlength="10"
placeholder="10 digit mobile number"
required
>


<label> Department</label>

<select name="department" required>

<option value="">
-- Select Department --
</option>

<option value="Human Resources">
 Human Resources
</option>

<option value="Information Technology">
 Information Technology
</option>

<option value="Finance">
 Finance
</option>

<option value="Marketing">
 Marketing
</option>

</select>


<label>Monthly Salary</label>

<input
type="number"
name="salary"
min="1"
placeholder="Enter salary"
required
>


<button type="submit">

 Generate Digital ID

</button>


</form>

</div>


<div class="footer">

 WorkID • Smart Employee Identity System

</div>


</div>

</body>

</html>

