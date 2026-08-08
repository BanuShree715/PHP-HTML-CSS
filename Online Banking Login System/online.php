
<html>

<head>

    <title>Online Banking Login</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;

            background: linear-gradient(
                135deg,
                #74d5eb,
                #c0aa5c
            );
        }

        .container {
            width: 400px;
            max-width: 95%;
            margin: auto;

            background: white;
            padding: 25px;

            border-radius: 15px;

            box-shadow: 0 5px 20px gray;
        }

        .bank-icon {
            text-align: center;
            font-size: 50px;
        }

        h2 {
            text-align: center;
            color: #283593;
        }

        .welcome {
            text-align: center;
            color: #777;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;

            border: 1px solid #cccccc;
            border-radius: 7px;
        }

        input[type=submit] {
            background: #283593;
            color: white;
            border: none;

            font-size: 16px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background: #7e1a62;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;

            padding: 15px;
            border-radius: 10px;

            line-height: 1.8;
            margin-bottom: 15px;
        }

        .error {
            background: #ffebee;
            color: #5d28c6;

            padding: 10px;
            border-radius: 7px;

            text-align: center;
        }

        .balance {
            background: #283593;
            color: white;

            padding: 12px;
            margin-top: 10px;

            border-radius: 8px;
            text-align: center;

            font-size: 18px;
        }

        .features {
            display: flex;
            justify-content: space-around;

            margin-top: 20px;
            padding: 10px;

            background: #f5f5f5;
            border-radius: 8px;

            font-size: 13px;
        }

        .security {
            text-align: center;
            color: #777;

            font-size: 12px;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            color: #777;

            font-size: 12px;
            margin-top: 15px;
        }

    </style>

</head>


<body>


<div class="container">


    <div class="bank-icon"></div>

    <h2>MyBank Online</h2>

    <p class="welcome">
        Welcome! Login to access your account.
    </p>


<?php

$validUsername = "customer123";

$validPassword = "bank@123";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];

    $password = $_POST["password"];


    if (
        $username == $validUsername &&
        $password == $validPassword
    ) {

        echo "

        <div class='success'>

            <h3> Login Successful!</h3>

            <b>Customer:</b>
            John Smith<br>

            <b> Account:</b>
            XXXX123456<br>

            <b> Type:</b>
            Savings Account<br>

            <b> Branch:</b>
            Chennai Main Branch<br>

            <b> Status:</b>
            Active

            <div class='balance'>

                 Balance: ₹50,000

            </div>

        </div>

        ";

    } else {

        echo "

        <div class='error'>

             Invalid Username or Password

        </div>

        ";

    }

}

?>


<form method="post">

    <label> Username</label>

    <input
        type="text"
        name="username"
        placeholder="Enter username"
        required
    >


    <label> Password</label>

    <input
        type="password"
        name="password"
        placeholder="Enter password"
        required
    >


    <input
        type="submit"
        value=" Login Securely"
    >

</form>


<div class="features">

    <span> Payments</span>

    <span> Balance</span>

    <span> Secure</span>

</div>


<div class="security">

     Never share your password or OTP.

</div>


<div class="footer">

    © 2026 MyBank Online

</div>


</div>


</body>

</html>
```
