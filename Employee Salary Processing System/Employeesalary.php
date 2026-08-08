
<html>

<head>

    <title>PayPulse - Salary Processing</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* Unique Background */
            background: linear-gradient(135deg, #134e5e, #71b280);

            min-height: 100vh;

            padding: 30px 10px;
        }

        .container {
            width: 500px;
            max-width: 95%;

            margin: auto;

            background: #fffdf7;

            border-radius: 22px;

            overflow: hidden;

            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }


        .header {
            background: #134e5e;

            color: white;

            text-align: center;

            padding: 25px;
        }

        .icon {
            font-size: 45px;
        }

        .header h1 {
            margin: 5px;

            font-size: 28px;
        }

        .header p {
            margin: 5px;

            color: #b7ead8;

            font-size: 14px;
        }

       
        .content {
            padding: 25px;
        }

        .title {
            text-align: center;

            color: #134e5e;

            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-top: 13px;
            margin-bottom: 6px;

            font-weight: bold;

            color: #264653;
        }

        input[type=text],
        input[type=number] {

            width: 100%;

            padding: 12px;

            border: 2px solid #d9e8e3;

            border-radius: 10px;

            outline: none;

            font-size: 14px;
        }

        input:focus {
            border-color: #2a9d8f;
        }

        .calculate-btn {

            width: 100%;

            margin-top: 22px;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background: #e76f51;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .calculate-btn:hover {
            background: #d65a3a;
        }

        

        .result {

            margin-top: 25px;

            padding: 20px;

            background: #f4fbf8;

            border-radius: 16px;

            border-top: 5px solid #2a9d8f;

            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .result h3 {

            text-align: center;

            color: #134e5e;

            margin-top: 0;
        }

        .employee {

            text-align: center;

            background: #e8f5f1;

            padding: 12px;

            border-radius: 10px;

            margin-bottom: 15px;

            color: #134e5e;

            font-weight: bold;
        }

       

        .salary-box {

            display: flex;

            gap: 10px;

            margin-top: 15px;
        }

        .card {

            flex: 1;

            padding: 15px 8px;

            text-align: center;

            border-radius: 12px;

            color: white;
        }

        .gross {
            background: #2a9d8f;
        }

        .deduction {
            background: #e76f51;
        }

        .net {
            background: #264653;
        }

        .card-title {

            font-size: 12px;

            margin-bottom: 8px;
        }

        .amount {

            font-size: 17px;

            font-weight: bold;
        }

       
        .details {

            margin-top: 18px;

            padding: 15px;

            background: white;

            border-radius: 10px;

            line-height: 1.9;

            color: #444;
        }

        .success {

            margin-top: 15px;

            padding: 10px;

            text-align: center;

            background: #e8f5e9;

            color: #287a35;

            border-radius: 8px;

            font-weight: bold;
        }

        .error {

            margin-top: 15px;

            padding: 10px;

            background: #ffe5e5;

            color: #c62828;

            border-radius: 8px;

            text-align: center;
        }

        

        .footer {

            background: #134e5e;

            color: #b7ead8;

            text-align: center;

            padding: 14px;

            font-size: 13px;
        }

        @media(max-width:500px) {

            .salary-box {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>


<div class="container">


    

    <div class="header">

        <div class="icon"></div>

        <h1>PayPulse</h1>

        <p>Smart Employee Salary Calculator</p>

    </div>


    <div class="content">


        <h2 class="title">
             Salary Processing
        </h2>


<?php



function calculateGrossSalary($basic, $hra, $allowance)
{
    return $basic + $hra + $allowance;
}




function calculateDeductions($gross)
{
    return $gross * 0.10;
}




function calculateNetSalary($gross, $deduction)
{
    return $gross - $deduction;
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);

    $basic = floatval($_POST["basic"]);

    $hra = floatval($_POST["hra"]);

    $allowance = floatval($_POST["allowance"]);


    if ($name == "" || $basic < 0 || $hra < 0 || $allowance < 0) {

        echo "
        <div class='error'>
             Please enter valid salary details.
        </div>";

    }

    else {

        /* CALCULATIONS */

        $grossSalary =
            calculateGrossSalary(
                $basic,
                $hra,
                $allowance
            );


        $deduction =
            calculateDeductions($grossSalary);


        $netSalary =
            calculateNetSalary(
                $grossSalary,
                $deduction
            );


       
        echo "

        <div class='result'>

            <h3> Salary Report</h3>


            <div class='employee'>

                 Employee: $name

            </div>


            <div class='details'>

                <b>Basic Salary:</b>
                ₹" . number_format($basic, 2) . "

                <br>

                <b>HRA:</b>
                ₹" . number_format($hra, 2) . "

                <br>

                <b>Allowance:</b>
                ₹" . number_format($allowance, 2) . "

            </div>


            <div class='salary-box'>


                <div class='card gross'>

                    <div class='card-title'>
                        GROSS SALARY
                    </div>

                    <div class='amount'>
                        ₹" . number_format($grossSalary, 2) . "
                    </div>

                </div>


                <div class='card deduction'>

                    <div class='card-title'>
                        DEDUCTION 10%
                    </div>

                    <div class='amount'>
                        ₹" . number_format($deduction, 2) . "
                    </div>

                </div>


                <div class='card net'>

                    <div class='card-title'>
                        NET SALARY
                    </div>

                    <div class='amount'>
                        ₹" . number_format($netSalary, 2) . "
                    </div>

                </div>


            </div>


            <div class='success'>

                 Salary calculated successfully!

            </div>


        </div>

        ";

    }

}

?>


     
        <form method="post">


            <label> Employee Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter employee name"
                required
            >


            <label> Basic Salary</label>

            <input
                type="number"
                name="basic"
                min="0"
                step="0.01"
                placeholder="Enter basic salary"
                required
            >


            <label> HRA</label>

            <input
                type="number"
                name="hra"
                min="0"
                step="0.01"
                placeholder="Enter HRA"
                required
            >


            <label> Allowance</label>

            <input
                type="number"
                name="allowance"
                min="0"
                step="0.01"
                placeholder="Enter allowance"
                required
            >


            <button
                type="submit"
                class="calculate-btn"
            >

                 Calculate Salary

            </button>


        </form>


    </div>


    <div class="footer">

         PayPulse | Simple • Smart • Accurate

    </div>


</div>


</body>

</html>
```
