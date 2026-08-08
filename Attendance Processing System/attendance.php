
<html>

<head>

    <title>Attendify - Attendance System</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* Unique Background */
            background: linear-gradient(135deg, #1d3557, #457b9d, #a8dadc);

            min-height: 100vh;

            padding: 30px 10px;
        }

        .container {
            width: 470px;
            max-width: 95%;

            margin: auto;

            background: #f8fbff;

            border-radius: 22px;

            overflow: hidden;

            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .header {
            background: #1d3557;

            color: white;

            text-align: center;

            padding: 25px;
        }

        .header-icon {
            font-size: 45px;
        }

        .header h1 {
            margin: 5px;

            font-size: 27px;
        }

        .header p {
            margin: 5px;

            color: #a8dadc;

            font-size: 14px;
        }

        .content {
            padding: 25px;
        }

        .title {
            text-align: center;

            color: #1d3557;

            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-top: 13px;
            margin-bottom: 6px;

            font-weight: bold;

            color: #264653;
        }

        input {
            width: 100%;

            padding: 12px;

            border: 2px solid #d7e5eb;

            border-radius: 10px;

            font-size: 14px;

            outline: none;
        }

        input:focus {
            border-color: #457b9d;
        }

        .btn {
            width: 100%;

            margin-top: 22px;

            padding: 13px;

            border: none;

            border-radius: 10px;

            background: #e76f51;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .btn:hover {
            background: #d65a3a;
        }

       
        .result {
            margin-top: 25px;

            padding: 20px;

            background: white;

            border-radius: 16px;

            border-top: 5px solid #457b9d;

            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .result h3 {
            text-align: center;

            color: #1d3557;
        }

        .details {
            line-height: 1.9;

            color: #444;
        }

       
        .percentage {
            width: 120px;
            height: 120px;

            margin: 20px auto;

            border-radius: 50%;

            background: #eaf6f8;

            border: 10px solid #457b9d;

            display: flex;

            justify-content: center;

            align-items: center;

            color: #1d3557;

            font-size: 20px;

            font-weight: bold;
        }

        
        .eligible {
            text-align: center;

            background: #d8f3dc;

            color: #237a3b;

            padding: 12px;

            border-radius: 10px;

            font-weight: bold;
        }

        
        .noteligible {
            text-align: center;

            background: #ffe5e5;

            color: #c62828;

            padding: 12px;

            border-radius: 10px;

            font-weight: bold;
        }

       

        .warning {
            margin-top: 20px;

            background: #fff3cd;

            color: #856404;

            padding: 12px;

            border-radius: 9px;

            text-align: center;

            font-weight: bold;
        }

        

        .footer {
            background: #1d3557;

            color: #a8dadc;

            text-align: center;

            padding: 14px;

            font-size: 13px;
        }

    </style>

</head>


<body>


<div class="container">


   

    <div class="header">

        <div class="header-icon"></div>

        <h1>Attendify</h1>

        <p>Smart Attendance • Simple Results</p>

    </div>


    <div class="content">


        <h2 class="title">
             Attendance Checker
        </h2>


        
        <form method="post">


            <label> Student Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter student name"
                required
            >


            <label> Total Working Days</label>

            <input
                type="number"
                name="total"
                min="1"
                placeholder="Example: 100"
                required
            >


            <label> Days Present</label>

            <input
                type="number"
                name="present"
                min="0"
                placeholder="Example: 85"
                required
            >


            <button class="btn" type="submit">

                 Calculate Attendance

            </button>

        </form>


<?php



function calculatePercentage($present, $total)
{
    return ($present / $total) * 100;
}




function checkEligibility($percentage)
{
    if ($percentage >= 75) {
        return "Eligible for Examination";
    } else {
        return "Not Eligible for Examination";
    }
}




function getMessage($percentage)
{
    if ($percentage >= 90) {
        return " Excellent Attendance!";
    } elseif ($percentage >= 75) {
        return " Good Attendance!";
    } elseif ($percentage >= 60) {
        return " Improve Your Attendance!";
    } else {
        return " Attendance is Very Low!";
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);

    $total = intval($_POST["total"]);

    $present = intval($_POST["present"]);


    if ($total <= 0) {

        echo "
        <div class='warning'>
             Total working days must be greater than 0.
        </div>";

    }

    elseif ($present < 0 || $present > $total) {

        echo "
        <div class='warning'>
             Present days cannot be greater than total working days.
        </div>";

    }

    else {

        $percentage =
            calculatePercentage($present, $total);

        $status =
            checkEligibility($percentage);

        $message =
            getMessage($percentage);


        echo "<div class='result'>";

        echo "<h3> Attendance Report</h3>";


        echo "<div class='details'>";

        echo "<b> Student:</b> $name <br>";

        echo "<b> Working Days:</b> $total <br>";

        echo "<b> Days Present:</b> $present";

        echo "</div>";


        /* PERCENTAGE */

        echo "

        <div class='percentage'>

            " . number_format($percentage, 1) . "%

        </div>";



        /* STATUS */

        if ($percentage >= 75) {

            echo "

            <div class='eligible'>

                 $status

            </div>";

        }

        else {

            echo "

            <div class='noteligible'>

                 $status

            </div>";

        }


        echo "

        <div class='warning'>

            $message

        </div>";


        echo "</div>";

    }

}

?>


    </div>


    <div class="footer">

         Attendify | 75% Attendance Required

    </div>


</div>


</body>

</html>

