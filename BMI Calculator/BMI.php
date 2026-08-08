
<html>

<head>

    <title>Smart BMI Calculator</title>

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
                #a8edea,
                #fed6e3
            );
        }

        .container {
            width: 430px;
            max-width: 95%;
            margin: auto;

            background: white;
            padding: 25px;

            border-radius: 20px;

            box-shadow:
                0 8px 25px
                rgba(0,0,0,0.2);
        }

        .icon {
            text-align: center;
            font-size: 50px;
        }

        h2 {
            text-align: center;
            color: #00897b;
            margin: 5px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #444;
        }

        input[type="number"] {
            width: 100%;
            padding: 11px;

            margin: 8px 0 15px;

            border: 1px solid #ccc;
            border-radius: 8px;

            font-size: 15px;
        }

        input[type="number"]:focus {
            border-color: #00897b;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;

            background: #00897b;
            color: white;

            border: none;
            border-radius: 8px;

            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #00695c;
        }

        .result {
            margin-top: 20px;

            background: #e0f2f1;

            padding: 18px;

            border-radius: 12px;

            line-height: 1.8;
        }

        .bmi-value {
            text-align: center;

            font-size: 30px;

            font-weight: bold;

            color: #00897b;

            margin: 10px;
        }

        .status {
            text-align: center;

            background: white;

            padding: 10px;

            border-radius: 8px;

            font-weight: bold;
        }

        .scale {
            margin-top: 15px;

            padding: 10px;

            background: #f5f5f5;

            border-radius: 8px;

            text-align: center;

            font-size: 13px;
        }

        .tip {
            margin-top: 15px;

            background: #fff8e1;

            padding: 12px;

            border-radius: 8px;

            color: #795548;
        }

        .warning {
            margin-top: 15px;

            background: #ffebee;

            color: #c62828;

            padding: 10px;

            border-radius: 8px;

            text-align: center;
        }

        .footer {
            text-align: center;

            color: #888;

            font-size: 12px;

            margin-top: 15px;
        }

    </style>

</head>


<body>


<div class="container">


    <div class="icon"></div>

    <h2>Smart BMI Calculator</h2>

    <p class="subtitle">
        Check your Body Mass Index
    </p>


    <form method="post">


        <label> Height (meters)</label>

        <input
            type="number"
            name="height"
            step="0.01"
            min="0.5"
            max="2.5"
            placeholder="Example: 1.65"
            required
        >


        <label> Weight (kilograms)</label>

        <input
            type="number"
            name="weight"
            step="0.1"
            min="10"
            max="300"
            placeholder="Example: 60"
            required
        >


        <input
            type="submit"
            value="Calculate My BMI"
        >

    </form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $height = $_POST["height"];

    $weight = $_POST["weight"];


    if ($height > 0 && $weight > 0) {


        /* BMI CALCULATION */

        $bmi =
            $weight /
            ($height * $height);


        echo "<div class='result'>";


        echo "<h3> Your BMI Report</h3>";


        echo "<b> Height:</b> "
            . htmlspecialchars($height)
            . " m<br>";


        echo "<b> Weight:</b> "
            . htmlspecialchars($weight)
            . " kg";


        echo "<div class='bmi-value'>";

        echo number_format(
            $bmi,
            2
        );

        echo "</div>";


        

        if ($bmi < 18.5) {

            $status = "Underweight";

            $tip =
                "Focus on nutritious and balanced meals.";

        }

        elseif ($bmi < 25) {

            $status = "Normal Weight";

            $tip =
                "Great! Maintain a balanced diet and regular activity.";

        }

        elseif ($bmi < 30) {

            $status = "Overweight";

            $tip =
                "Regular physical activity and balanced meals can help.";

        }

        else {

            $status = "Obese";

            $tip =
                "Consider discussing your health goals with a healthcare professional.";

        }


        echo "<div class='status'>";

        echo "Status: " .
            $status;

        echo "</div>";


        /* BMI SCALE */

        echo "

        <div class='scale'>

            <b> BMI Scale</b><br><br>

            Below 18.5 → Underweight<br>

            18.5  24.9 → Normal<br>

            25  29.9 → Overweight<br>

            30 and above → Obese

        </div>

        ";


        /* HEALTH TIP */

        echo "

        <div class='tip'>

             <b>Health Tip:</b><br>

            $tip

        </div>

        ";


        echo "</div>";


    }

    else {


        echo "

        <div class='warning'>

             Please enter valid
            height and weight values.

        </div>

        ";

    }

}

?>


    <div class="footer">

         Healthy habits • Balanced food • Regular activity

    </div>


</div>


</body>

</html>

