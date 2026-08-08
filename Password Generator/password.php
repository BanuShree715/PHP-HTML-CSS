
<html>
<head>
    <title>Smart Password Generator</title>


    <style>
        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;


            /* Background Color */
            background: linear-gradient(135deg, #6f1048, #2575fc);


            display: flex;
            justify-content: center;
            align-items: center;
        }


        .container {
            width: 420px;
            background: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }


        .icon {
            font-size: 50px;
            margin-bottom: 5px;
        }


        h2 {
            color: #333;
            margin-bottom: 5px;
        }


        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }


        label {
            display: block;
            text-align: left;
            font-weight: bold;
            color: #444;
            margin-bottom: 8px;
        }


        input[type=number] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
        }


        input[type=number]:focus {
            border-color: #6a11cb;
        }


        input[type=submit] {
            width: 100%;
            padding: 13px;
            margin-top: 18px;
            border: none;
            border-radius: 10px;


            background: linear-gradient(90deg, #68cb11, #2575fc);


            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }


        input[type=submit]:hover {
            opacity: 0.85;
        }


        .result {
            margin-top: 25px;
            padding: 20px;
            border-radius: 15px;
            background: #f1f8ff;
            border: 2px solid #2575fc;
        }


        .result h3 {
            color: #2575fc;
            margin-top: 0;
        }


        .password {
            background: #222;
            color: #00ff88;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            word-break: break-all;
        }


        .info {
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }
    </style>


</head>


<body>


<div class="container">


    <div class="icon"></div>


    <h2>Smart Password Generator</h2>


    <p class="subtitle">
        Create a strong and secure password instantly
    </p>


    <form method="post">


        <label> Password Length</label>


        <input type="number"
               name="length"
               min="4"
               max="50"
               placeholder="Enter length (4 - 50)"
               required>


        <input type="submit" value="Generate Password">


    </form>




<?php


function generatePassword($length)
{
    $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $digits = "0123456789";
    $special = "@#$%&*!";


    $characters = $uppercase . $lowercase . $digits . $special;


    $password = "";


   
    $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
    $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
    $password .= $digits[rand(0, strlen($digits) - 1)];
    $password .= $special[rand(0, strlen($special) - 1)];


    for ($i = 4; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }


    return str_shuffle($password);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $length = $_POST["length"];


    $password = generatePassword($length);


    echo "<div class='result'>";


    echo "<h3> Your Password</h3>";


    echo "<p class='password' id='password'>$password</p>";


    echo "<div class='info'>";
    echo "✔ Uppercase &nbsp; ✔ Lowercase &nbsp; ✔ Numbers &nbsp; ✔ Symbols";
    echo "</div>";


    echo "</div>";
}


?>


</div>


</body>
</html>
```


