
<html>

<head>

    <title>BookNest Library Membership</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* Unique Library Background */
            background: linear-gradient(135deg, #3b1f2b, #7a3e48, #d08c60);

            min-height: 100vh;
            padding: 30px 10px;
        }

        .container {
            width: 500px;
            max-width: 95%;
            margin: auto;

            background: #fffaf3;

            border-radius: 20px;

            box-shadow: 0 12px 35px rgba(0,0,0,0.3);

            overflow: hidden;
        }

     

        .header {
            background: #3b1f2b;
            color: #ffe8c2;

            text-align: center;

            padding: 25px;
        }

        .book-icon {
            font-size: 45px;
        }

        .header h1 {
            margin: 5px;
            font-size: 27px;
        }

        .header p {
            margin: 5px;
            color: #f4c095;
            font-size: 14px;
        }

       

        .content {
            padding: 25px;
        }

        .title {
            text-align: center;
            color: #6d2e46;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;

            font-weight: bold;
            color: #4a2633;
        }

        input,
        select {
            width: 100%;
            padding: 11px;

            border: 2px solid #ead5c5;
            border-radius: 9px;

            background: white;

            outline: none;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            border-color: #b85c38;
        }

        

        .register-btn {
            width: 100%;

            margin-top: 22px;

            padding: 13px;

            border: none;
            border-radius: 10px;

            background: #b85c38;

            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;
        }

        .register-btn:hover {
            background: #8f3f2c;
        }

       
        .membership-info {
            display: flex;
            gap: 8px;

            margin-top: 20px;
        }

        .membership-card {
            flex: 1;

            padding: 10px 5px;

            text-align: center;

            border-radius: 10px;

            background: #f8e7d1;

            color: #5b2936;

            font-size: 12px;
        }

        .membership-card b {
            display: block;
            font-size: 14px;
        }

       
        .success {
            margin-bottom: 20px;

            padding: 20px;

            background: #edf6df;

            border-left: 5px solid #668c4a;

            border-radius: 12px;

            color: #365522;
        }

        .success-icon {
            text-align: center;
            font-size: 40px;
        }

        .success h3 {
            text-align: center;
            color: #4d7035;
        }

        .member-id {
            text-align: center;

            background: #fff;

            padding: 10px;

            border-radius: 8px;

            color: #b85c38;

            font-size: 18px;
            font-weight: bold;

            margin: 12px 0;
        }

        .details {
            line-height: 1.8;
        }

       
        .error {
            background: #ffe5e5;

            color: #a30000;

            padding: 9px;

            margin-bottom: 7px;

            border-radius: 7px;

            font-size: 14px;
        }

        

        .footer {
            background: #3b1f2b;

            color: #ffe8c2;

            text-align: center;

            padding: 15px;

            font-size: 13px;
        }

    </style>

</head>


<body>


<div class="container">


    

    <div class="header">

        <div class="book-icon"></div>

        <h1>BookNest Library</h1>

        <p>Read • Learn • Discover</p>

    </div>


    <div class="content">


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = trim($_POST["age"]);
    $membership = $_POST["membership"];

    $errors = [];


    
    if (empty($name)) {
        $errors[] = "Please enter your name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain 10 digits.";
    }

    if (!is_numeric($age) || $age < 5 || $age > 100) {
        $errors[] = "Please enter a valid age.";
    }

    if (empty($membership)) {
        $errors[] = "Please select a membership type.";
    }


    /* SUCCESS */

    if (empty($errors)) {

        $memberID = "BN" . rand(10000, 99999);

        $date = date("d-m-Y");

        echo "

        <div class='success'>

            <div class='success-icon'></div>

            <h3>Membership Created!</h3>

            <div class='member-id'>
                 $memberID
            </div>

            <div class='details'>

                <b> Member:</b> $name <br>

                <b> Email:</b> $email <br>

                <b>Phone:</b> $phone <br>

                <b> Age:</b> $age <br>

                <b> Membership:</b> $membership <br>
                <b> Registered:</b> $date

            </div>

            <br>

            <center>
                Welcome to BookNest Library! 
            </center>

        </div>

        ";

    }


   

    else {

        foreach ($errors as $error) {

            echo "<div class='error'> $error</div>";

        }

    }

}

?>


        <h2 class="title">
             Library Membership
        </h2>


       
        <form method="post">


            <label> Member Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter your full name"
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
                placeholder="10 digit number"
                maxlength="10"
                required
            >


            <label> Age</label>

            <input
                type="number"
                name="age"
                min="5"
                max="100"
                placeholder="Enter your age"
                required
            >


            <label> Membership Type</label>

            <select name="membership" required>

                <option value="">
                    
                </option>

                <option value="Student">
                     Student Membership
                </option>

                <option value="Regular">
                     Regular Membership
                </option>

                <option value="Premium">
                     Premium Membership
                </option>

            </select>


            <button class="register-btn" type="submit">

                 Create My Membership

            </button>


        </form>


       
        <div class="membership-info">

            <div class="membership-card">

                <b> Student</b>

                Budget Friendly

            </div>


            <div class="membership-card">

                <b> Regular</b>

                Standard Access

            </div>


            <div class="membership-card">

                <b> Premium</b>

                Extra Benefits

            </div>

        </div>


    </div>


    <div class="footer">

         A good book is a good friend 

    </div>


</div>


</body>

</html>
```
