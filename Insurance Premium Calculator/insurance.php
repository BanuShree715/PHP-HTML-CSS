
<html>

<head>

    <title>ShieldSure - Insurance Calculator</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

           
            background: linear-gradient(135deg, #24104f, #512b81, #a66cff);

            min-height: 100vh;

            padding: 30px 10px;
        }

        .container {
            width: 480px;
            max-width: 95%;

            margin: auto;

            background: #fffdf8;

            border-radius: 22px;

            overflow: hidden;

            box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        }

        

        .header {
            background: #24104f;

            color: white;

            text-align: center;

            padding: 25px;
        }

        .shield {
            font-size: 50px;
        }

        .header h1 {
            margin: 5px;

            font-size: 28px;

            color: #ffd166;
        }

        .header p {
            margin: 5px;

            color: #e5d8ff;

            font-size: 14px;
        }

       

        .content {
            padding: 25px;
        }

        .title {
            text-align: center;

            color: #512b81;

            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-top: 13px;
            margin-bottom: 6px;

            font-weight: bold;

            color: #38204f;
        }

        input[type=number] {

            width: 100%;

            padding: 12px;

            border: 2px solid #e2d8ef;

            border-radius: 10px;

            outline: none;

            font-size: 14px;
        }

        input[type=number]:focus {
            border-color: #8e5bd9;
        }

      

        .calculate-btn {

            width: 100%;

            margin-top: 22px;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background: #d89b25;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .calculate-btn:hover {
            background: #b77c14;
        }

        
        .summary {

            margin-top: 25px;

            padding: 20px;

            background: #f7f1ff;

            border-radius: 16px;

            border-top: 5px solid #8e5bd9;

        }

        .summary h3 {

            text-align: center;

            color: #512b81;

            margin-top: 0;
        }

        .details {

            background: white;

            padding: 15px;

            border-radius: 10px;

            line-height: 2;

            color: #444;

        }

       

        .premium {

            margin-top: 18px;

            background: #24104f;

            color: #ffd166;

            padding: 18px;

            text-align: center;

            border-radius: 12px;
        }

        .premium small {

            display: block;

            color: #e5d8ff;

            margin-bottom: 5px;

        }

        .premium strong {

            font-size: 25px;
        }

        

        .category {

            margin-top: 12px;

            text-align: center;

            padding: 10px;

            border-radius: 8px;

            background: #fff0c7;

            color: #805b00;

            font-weight: bold;
        }

        

        .error {

            margin-top: 20px;

            background: #ffe5e5;

            color: #c62828;

            padding: 12px;

            border-radius: 8px;

            text-align: center;

            font-weight: bold;
        }

        

        .footer {

            background: #24104f;

            color: #e5d8ff;

            text-align: center;

            padding: 14px;

            font-size: 13px;
        }

    </style>

</head>


<body>


<div class="container">


    

    <div class="header">

        <div class="shield"></div>

        <h1>ShieldSure</h1>

        <p>Protect Today • Secure Tomorrow</p>

    </div>


    <div class="content">


        <h2 class="title">
             Premium Calculator
        </h2>


<?php


function calculatePremium($age, $term, $coverage)
{

    $rate = 0.02;


    /* Age Based Rate */

    if ($age > 50) {

        $rate += 0.01;

    }

    elseif ($age > 35) {

        $rate += 0.005;

    }


    $premium =
        $coverage * $rate * $term;


    return $premium;
}




function getCategory($age)
{

    if ($age <= 35) {

        return " Standard Plan";

    }

    elseif ($age <= 50) {

        return " Enhanced Plan";

    }

    else {

        return " Secure Plan";

    }

}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $age = intval($_POST["age"]);

    $term = intval($_POST["term"]);

    $coverage = floatval($_POST["coverage"]);


    /* VALIDATION */

    if ($age <= 0 || $term <= 0 || $coverage < 10000) {

        echo "

        <div class='error'>

             Please enter valid policy details.

        </div>";

    }

    else {

       

        $premium =
            calculatePremium(
                $age,
                $term,
                $coverage
            );


        $category =
            getCategory($age);


        
        echo "

        <div class='summary'>

            <h3> Policy Summary</h3>


            <div class='details'>

                <b> Age:</b>
                $age years

                <br>

                <b> Policy Term:</b>
                $term years

                <br>

                <b> Coverage:</b>
                ₹" . number_format($coverage, 2) . "

            </div>


            <div class='premium'>

                <small>Total Premium Amount</small>

                <strong>
                    ₹" . number_format($premium, 2) . "
                </strong>

            </div>


            <div class='category'>

                $category

            </div>


        </div>";

    }

}

?>


      
        <form method="post">


            <label> Enter Your Age</label>

            <input
                type="number"
                name="age"
                min="1"
                max="100"
                placeholder="Example: 30"
                required
            >


            <label> Policy Term (Years)</label>

            <input
                type="number"
                name="term"
                min="1"
                max="50"
                placeholder="Example: 10"
                required
            >


            <label> Coverage Amount (₹)</label>

            <input
                type="number"
                name="coverage"
                min="10000"
                placeholder="Minimum ₹10,000"
                required
            >


            <button
                type="submit"
                class="calculate-btn"
            >

                 Calculate My Premium

            </button>


        </form>


    </div>


    <div class="footer">

         ShieldSure | Simple • Smart • Secure

    </div>


</div>


</body>

</html>

