
<html>

<head>

<title>Customer Connect</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;

    background:linear-gradient(
        135deg,
        #ff6a88,
        #ff99ac,
        #6a5acd
    );

    min-height:100vh;

    padding:30px 10px;
}

.container{
    width:470px;
    max-width:95%;

    margin:auto;

    background:white;

    border-radius:22px;

    overflow:hidden;

    box-shadow:0 15px 40px rgba(0,0,0,0.3);
}



.header{
    background:linear-gradient(
        135deg,
        #6a1b9a,
        #ab47bc
    );

    color:white;

    text-align:center;

    padding:25px;
}

.header .icon{
    font-size:50px;
}

.header h1{
    margin:5px;

    color:#ffe082;
}

.header p{
    margin:5px;

    color:#f5e6ff;
}



.form{
    padding:25px;
}

.title{
    text-align:center;

    color:#6a1b9a;

    margin-bottom:20px;
}

label{
    display:block;

    margin-top:12px;
    margin-bottom:6px;

    color:#6a1b9a;

    font-weight:bold;
}

input,select,textarea{

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

/* BUTTON */

button{

    width:100%;

    padding:14px;

    margin-top:20px;

    border:none;

    border-radius:10px;

    background:linear-gradient(
        90deg,
        #ff4081,
        #7b1fa2
    );

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;
}

button:hover{

    background:linear-gradient(
        90deg,
        #7b1fa2,
        #ff4081
    );
}

.success{

    margin:20px 25px 0;

    padding:15px;

    text-align:center;

    background:#e8f5e9;

    color:#2e7d32;

    border-radius:12px;

    font-weight:bold;
}


.profile{

    margin:20px 25px;

    padding:20px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #6a1b9a,
        #ab47bc,
        #ec407a
    );

    color:white;

    box-shadow:0 8px 20px rgba(0,0,0,0.2);

    text-align:center;
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

.profile h3{

    margin:10px 0 5px;

    font-size:21px;
}

.customer-id{

    display:inline-block;

    background:rgba(255,255,255,0.2);

    padding:5px 12px;

    border-radius:20px;

    font-size:13px;
}

.details{

    margin-top:18px;

    background:rgba(255,255,255,0.15);

    padding:15px;

    border-radius:12px;

    text-align:left;

    line-height:2;
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

    <h1>Customer Connect</h1>

    <p>Smart Customer Registration Portal</p>

</div>


<div class="form">


<h2 class="title">

     Create Your Profile

</h2>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=trim($_POST["name"]);

    $email=trim($_POST["email"]);

    $phone=trim($_POST["phone"]);

    $gender=$_POST["gender"];

    $city=trim($_POST["city"]);

    $address=trim($_POST["address"]);


    $errors=[];


    if(empty($name)){

        $errors[]="Customer name is required.";

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


    if(empty($gender)){

        $errors[]=
        "Please select gender.";

    }


    if(empty($city)){

        $errors[]=
        "City is required.";

    }


    if(empty($address)){

        $errors[]=
        "Address is required.";

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

        $customerID=
        "CUS".rand(1000,9999);


        echo "

        <div class='success'>

             Registration Successful!

        </div>


        <div class='profile'>


            <div class='avatar'>

                

            </div>


            <h3>

                ".htmlspecialchars($name)."

            </h3>


            <span class='customer-id'>

                Customer ID : $customerID

            </span>


            <div class='details'>

                 <b>Email:</b>
                ".htmlspecialchars($email)."

                <br>

                 <b>Phone:</b>
                ".htmlspecialchars($phone)."

                <br>

                 <b>Gender:</b>
                ".htmlspecialchars($gender)."

                <br>

                 <b>City:</b>
                ".htmlspecialchars($city)."

                <br>

                <b>Address:</b>
                ".htmlspecialchars($address)."

            </div>


        </div>

        ";

    }

}

?>



<form method="post">


<label> Customer Name</label>

<input
type="text"
name="name"
placeholder="Enter your name"
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


<label> Gender</label>

<select name="gender" required>

<option value="">
-- Select Gender --
</option>

<option value="Male">
 Male
</option>

<option value="Female">
 Female
</option>

<option value="Other">
 Other
</option>

</select>


<label> City</label>

<input
type="text"
name="city"
placeholder="Enter your city"
required
>


<label> Address</label>

<textarea
name="address"
rows="3"
placeholder="Enter your address"
required
></textarea>


<button type="submit">

 Register Customer

</button>


</form>


</div>


<div class="footer">

 Customer Connect | Simple • Smart • Secure

</div>


</div>


</body>

</html>

