
<html>

<head>

<title>Parent Teacher Connect</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;

    background:linear-gradient(
        135deg,
        #ff9a9e,
        #fad0c4,
        #a18cd1
    );

    min-height:100vh;
    padding:30px 10px;
}

.container{
    width:480px;
    max-width:95%;
    margin:auto;

    background:white;

    border-radius:22px;
    overflow:hidden;

    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}




.header{
    background:linear-gradient(
        135deg,
        #6a1b9a,
        #8e24aa,
        #ec407a
    );

    color:white;
    text-align:center;
    padding:25px;
}

.header .icon{
    font-size:48px;
}

.header h1{
    margin:5px;
    color:#fff3e0;
}

.header p{
    margin:5px;
    font-size:14px;
}




.form{
    padding:25px;
}

.title{
    text-align:center;
    color:#7b1fa2;
    margin-bottom:20px;
}

label{
    display:block;

    margin-top:12px;
    margin-bottom:5px;

    color:#6a1b9a;
    font-weight:bold;
}

input,
select,
textarea{

    width:100%;

    padding:11px;

    border:2px solid #eadcf0;

    border-radius:10px;

    outline:none;

    font-size:14px;
}

input:focus,
select:focus,
textarea:focus{

    border-color:#ab47bc;

    box-shadow:0 0 5px #e1bee7;
}




button{

    width:100%;

    padding:13px;

    margin-top:20px;

    border:0;

    border-radius:10px;

    background:linear-gradient(
        90deg,
        #7b1fa2,
        #ec407a
    );

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;
}

button:hover{

    background:linear-gradient(
        90deg,
        #ec407a,
        #7b1fa2
    );
}




.success{

    margin:20px 25px 0;

    padding:14px;

    text-align:center;

    background:#e8f5e9;

    color:#2e7d32;

    border-radius:12px;

    font-weight:bold;
}




.confirmation{

    margin:20px 25px;

    padding:20px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #7b1fa2,
        #ab47bc,
        #ec407a
    );

    color:white;

    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.confirmation-icon{

    width:70px;
    height:70px;

    margin:auto;

    background:white;

    color:#7b1fa2;

    border-radius:50%;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:35px;
}

.confirmation h3{

    text-align:center;

    margin:12px 0 5px;

}

.appointment-id{

    display:block;

    width:max-content;

    margin:8px auto 15px;

    padding:5px 12px;

    border-radius:20px;

    background:rgba(255,255,255,0.2);

    font-size:13px;
}

.details{

    background:rgba(255,255,255,0.15);

    padding:15px;

    border-radius:12px;

    line-height:2;
}

.message{

    margin-top:12px;

    background:rgba(255,255,255,0.2);

    padding:10px;

    border-radius:8px;
}




.error{

    margin:15px 25px;

    padding:12px;

    background:#ffebee;

    color:#c62828;

    border-radius:10px;

    font-weight:bold;
}



.footer{

    background:#4a148c;

    color:#f3d9ff;

    text-align:center;

    padding:13px;

    font-size:13px;
}

</style>

</head>


<body>


<div class="container">




<div class="header">

    <div class="icon"></div>

    <h1>Parent–Teacher Connect</h1>

    <p>Building Better Communication Together</p>

</div>


<div class="form">


<h2 class="title">

     Book Your Meeting

</h2>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $parent=trim($_POST["parent"]);

    $student=trim($_POST["student"]);

    $email=trim($_POST["email"]);

    $phone=trim($_POST["phone"]);

    $slot=$_POST["slot"];

    $message=trim($_POST["message"]);


    $errors=[];


    

    if(empty($parent)){

        $errors[]="Parent name is required.";

    }


    if(empty($student)){

        $errors[]="Student name is required.";

    }


    if(!filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )){

        $errors[]="Enter a valid email address.";

    }


    if(!preg_match(
        "/^[0-9]{10}$/",
        $phone
    )){

        $errors[]=
        "Phone number must contain 10 digits.";

    }


    if(empty($slot)){

        $errors[]=
        "Please select a meeting slot.";

    }


   

    if(!empty($errors)){

        foreach($errors as $error){

            echo "

            <div class='error'>

                 $error

            </div>

            ";

        }

    }


    
    else{

        $appointmentID=
        "PTM".rand(1000,9999);


        echo "

        <div class='success'>

             Appointment Confirmed!

        </div>


        <div class='confirmation'>


            <div class='confirmation-icon'>

                

            </div>


            <h3>

                Meeting Successfully Booked

            </h3>


            <span class='appointment-id'>

                Appointment ID : $appointmentID

            </span>


            <div class='details'>

                 <b>Parent:</b>
                ".htmlspecialchars($parent)."

                <br>

                 <b>Student:</b>
                ".htmlspecialchars($student)."

                <br>

                 <b>Email:</b>
                ".htmlspecialchars($email)."

                <br>

                 <b>Phone:</b>
                ".htmlspecialchars($phone)."

                <br>

                 <b>Meeting Slot:</b>
                ".htmlspecialchars($slot)."

            </div>


            <div class='message'>

                 <b>Message:</b><br>

                ".(
                    empty($message)
                    ? "No additional message."
                    : htmlspecialchars($message)
                )."

            </div>


        </div>

        ";

    }

}

?>



<form method="post">


<label> Parent Name</label>

<input
type="text"
name="parent"
placeholder="Enter parent name"
required
>


<label> Student Name</label>

<input
type="text"
name="student"
placeholder="Enter student name"
required
>


<label> Email Address</label>

<input
type="email"
name="email"
placeholder="example@gmail.com"
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


<label> Select Meeting Slot</label>

<select name="slot" required>

<option value="">
-- Choose Your Time --
</option>

<option value="10:00 AM - 10:30 AM">
 10:00 AM - 10:30 AM
</option>

<option value="11:00 AM - 11:30 AM">
 11:00 AM - 11:30 AM
</option>

<option value="2:00 PM - 2:30 PM">
 2:00 PM - 2:30 PM
</option>

<option value="3:00 PM - 3:30 PM">
 3:00 PM - 3:30 PM
</option>

</select>


<label> Additional Message</label>

<textarea
name="message"
rows="3"
placeholder="Write your message (optional)"
></textarea>


<button type="submit">

 Confirm Appointment

</button>


</form>


</div>


<div class="footer">

 Parent–Teacher Connect | Together for Every Child

</div>


</div>


</body>

</html>

