
<html>

<head>

    <title>Smart Mobile Bill</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px;

            background: linear-gradient(
                135deg,
                #1a1a2e,
                #16213e,
                #0f3460
            );

            min-height: 100vh;
        }

        .container {
            width: 450px;
            max-width: 95%;
            margin: auto;

            background: #ffffff;

            padding: 25px;

            border-radius: 20px;

            box-shadow:
                0 10px 30px
                rgba(0,0,0,0.4);
        }

        .phone {
            text-align: center;
            font-size: 55px;
        }

        h2 {
            text-align: center;
            color: #e91e63;
            margin: 5px;
        }

        .tagline {
            text-align: center;
            color: #777;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;

            padding: 11px;

            margin: 7px 0 15px;

            border: 1px solid #ccc;

            border-radius: 8px;

            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #e91e63;
        }

        input[type=submit] {
            background: linear-gradient(
                90deg,
                #e91e63,
                #9c27b0
            );

            color: white;

            border: none;

            padding: 12px;

            font-size: 16px;

            cursor: pointer;

            border-radius: 8px;
        }

        input[type=submit]:hover {
            opacity: 0.9;
        }

        .plans {
            display: flex;
            gap: 8px;
            margin-bottom: 18px;
        }

        .plan {
            flex: 1;
            padding: 10px;

            text-align: center;

            border-radius: 8px;

            color: white;

            font-size: 12px;
        }

        .basic {
            background: #2196f3;
        }

        .premium {
            background: #9c27b0;
        }

        .unlimited {
            background: #e91e63;
        }

        .bill {
            margin-top: 20px;

            background: #fce4ec;

            padding: 18px;

            border-radius: 12px;

            line-height: 1.9;
        }

        .bill h3 {
            text-align: center;
            color: #c2185b;
        }

        .total {
            background: linear-gradient(
                90deg,
                #e91e63,
                #9c27b0
            );

            color: white;

            padding: 13px;

            border-radius: 8px;

            text-align: center;

            font-size: 19px;

            font-weight: bold;

            margin-top: 12px;
        }

        .info {
            margin-top: 15px;

            background: #fff3e0;

            padding: 10px;

            border-radius: 8px;

            text-align: center;

            font-size: 13px;

            color: #795548;
        }

        .footer {
            text-align: center;

            color: #999;

            font-size: 12px;

            margin-top: 15px;
        }

        @media(max-width:500px) {

            body {
                padding: 15px;
            }

            .plans {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <div class="phone"></div>

    <h2>Smart Mobile Bill</h2>

    <p class="tagline">
        Fast • Simple • Smart Billing
    </p>


    <div class="plans">

        <div class="plan basic">
            <br>
            Basic<br>
            ₹199
        </div>

        <div class="plan premium">
            <br>
            Premium<br>
            ₹499
        </div>

        <div class="plan unlimited">
            <br>
            Unlimited<br>
            ₹799
        </div>

    </div>



    <form method="post">


        <label> Customer Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter your name"
            required
        >


        <label> Select Tariff Plan</label>

        <select name="plan">

            <option value="Basic">
                Basic Plan - ₹199
            </option>

            <option value="Premium">
                Premium Plan - ₹499
            </option>

            <option value="Unlimited">
                Unlimited Plan - ₹799
            </option>

        </select>


        <label> Data Usage (GB)</label>

        <input
            type="number"
            name="data"
            min="0"
            placeholder="Example: 5"
            required
        >


        <label> Call Minutes Used</label>

        <input
            type="number"
            name="minutes"
            min="0"
            placeholder="Example: 600"
            required
        >


        <input
            type="submit"
            value=" Generate My Bill"
        >


    </form>


<?php

function calculateBill(
    $plan,
    $data,
    $minutes
) {

    if ($plan == "Basic") {

        $bill = 199;

        if ($data > 2) {

            $bill +=
            ($data - 2) * 50;

        }

        if ($minutes > 500) {

            $bill +=
            ($minutes - 500) * 0.50;

        }

    }

    elseif ($plan == "Premium") {

        $bill = 499;

        if ($data > 10) {

            $bill +=
            ($data - 10) * 40;

        }

        if ($minutes > 1500) {

            $bill +=
            ($minutes - 1500) * 0.30;

        }

    }

    else {

        $bill = 799;

    }

    return $bill;

}


if (
    $_SERVER["REQUEST_METHOD"]
    == "POST"
) {

    $name =
    htmlspecialchars($_POST["name"]);

    $plan =
    $_POST["plan"];

    $data =
    $_POST["data"];

    $minutes =
    $_POST["minutes"];


    $totalBill =
    calculateBill(
        $plan,
        $data,
        $minutes
    );


    echo "<div class='bill'>";

    echo "<h3> Bill Summary</h3>";

    echo "<b>Customer:</b> "
        . $name . "<br>";

    echo "<b> Plan:</b> "
        . $plan . "<br>";

    echo "<b> Data Used:</b> "
        . $data . " GB<br>";

    echo "<b>Call Usage:</b> "
        . $minutes . " minutes<br>";


    echo "<div class='total'>";

    echo " Total Bill: ₹"
        . number_format(
            $totalBill,
            2
        );

    echo "</div>";

    echo "</div>";


    echo "

    <div class='info'>

         <b>Smart Tip:</b><br>

        Choose a plan according to
        your monthly data and call usage.

    </div>

    ";

}

?>


    <div class="footer">

         Smart Mobile Billing System © 2026

    </div>


</div>


</body>

</html>
```
