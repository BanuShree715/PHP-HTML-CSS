
<html>
<head>

    <title>Applicant Validation System</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;

            background: linear-gradient(
                135deg,
                #667eea,
                #764ba2
            );
        }

        .container {
            width: 450px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 15px;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.3);
        }

        .icon {
            text-align: center;
            font-size: 45px;
        }

        h2 {
            text-align: center;
            color: #5e35b1;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 7px 0;

            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type=submit] {
            background: #b18335;
            color: white;
            border: none;
            cursor: pointer;

            font-size: 16px;
            margin-top: 15px;
        }

        input[type=submit]:hover {
            background: #9627a0;
        }

        .error {
            background: #ffebee;
            color: #d32f2f;
            padding: 8px;
            border-radius: 5px;
            margin: 5px 0;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 7px;
            font-weight: bold;
            text-align: center;
        }

        .result {
            background: #f5e8e5;
            padding: 15px;
            margin-top: 15px;
            border-radius: 8px;
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            color: #777;
            margin-top: 15px;
            font-size: 12px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="icon"></div>

    <h2>Applicant Validation</h2>

    <form method="post">

        <label> Applicant Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter your name"
            required
        >


        <label> Age</label>

        <input
            type="number"
            name="age"
            min="17"
            max="60"
            placeholder="Enter your age"
            required
        >


        <label> Course</label>

        <select name="course" required>

            <option value="">-- Select Course --</option>

            <option>B.Sc Computer Science</option>
            <option>BCA</option>
            <option>B.Com</option>
            <option>BBA</option>
            <option>M.Sc Computer Science</option>

        </select>


        <label> Email ID</label>

        <input
            type="email"
            name="email"
            placeholder="example@gmail.com"
            required
        >


        <label> Password</label>

        <input
            type="password"
            name="password"
            placeholder="Minimum 8 characters"
            required
        >


        <label> Mobile Number</label>

        <input
            type="text"
            name="mobile"
            maxlength="10"
            placeholder="10-digit mobile number"
            required
        >


        <input
            type="submit"
            value=" Validate Applicant"
        >

    </form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $course = $_POST["course"];
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $mobile = trim($_POST["mobile"]);

    $errors = [];


    

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {

        $errors[] =
        "Name should contain only letters.";

    }


    

    if ($age < 17 || $age > 60) {

        $errors[] =
        "Age must be between 17 and 60.";

    }


    

    if (!filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )) {

        $errors[] =
        "Enter a valid email ID.";

    }


    

    if (strlen($password) < 8) {

        $errors[] =
        "Password must contain at least 8 characters.";

    }

    if (!preg_match(
        "/[A-Z]/",
        $password
    )) {

        $errors[] =
        "Password needs one uppercase letter.";

    }

    if (!preg_match(
        "/[0-9]/",
        $password
    )) {

        $errors[] =
        "Password needs one digit.";

    }


    if (!preg_match(
        "/^[0-9]{10}$/",
        $mobile
    )) {

        $errors[] =
        "Mobile number must contain 10 digits.";

    }


    
    if (empty($errors)) {

        echo "

        <div class='success'>

            Applicant Validation Successful!

        </div>

        ";

        echo "

        <div class='result'>

            <b> Name:</b>
            " . htmlspecialchars($name) . "

            <br>

            <b> Age:</b>
            " . htmlspecialchars($age) . "

            <br>

            <b> Course:</b>
            " . htmlspecialchars($course) . "

            <br>

            <b> Email:</b>
            " . htmlspecialchars($email) . "

            <br>

            <b> Mobile:</b>
            " . htmlspecialchars($mobile) . "

            <br><br>

            <b> Status:</b>
            Application Valid

        </div>

        ";

    }

    else {

        foreach ($errors as $error) {

            echo "

            <div class='error'>
                 " .
                htmlspecialchars($error)
                . "
            </div>

            ";

        }

    }

}

?>


<div class="footer">

     Applicant information is validated securely

</div>

</div>

</body>
</html>

