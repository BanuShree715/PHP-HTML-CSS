
<html>

<head>

    <title>TalentTrack - Performance Evaluation</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

           
            background: linear-gradient(
                135deg,
                #141e30,
                #243b55,
                #00b4db
            );

            min-height: 100vh;

            padding: 30px 10px;
        }

        .container {
            width: 470px;
            max-width: 95%;

            margin: auto;

            background: #ffffff;

            border-radius: 22px;

            overflow: hidden;

            box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        }

       
        .header {
            background: linear-gradient(
                135deg,
                #141e30,
                #243b55
            );

            color: white;

            text-align: center;

            padding: 25px;
        }

        .icon {
            font-size: 48px;
        }

        .header h1 {
            margin: 5px;

            color: #00e5ff;

            font-size: 28px;
        }

        .header p {
            margin: 5px;

            color: #b8f5ff;

            font-size: 14px;
        }

       

        .content {
            padding: 25px;
        }

        .title {
            text-align: center;

            color: #243b55;

            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-top: 13px;

            margin-bottom: 6px;

            font-weight: bold;

            color: #243b55;
        }

        input[type=text],
        input[type=number] {

            width: 100%;

            padding: 12px;

            border: 2px solid #d9e8ed;

            border-radius: 10px;

            outline: none;

            font-size: 14px;
        }

        input:focus {
            border-color: #00b4db;

            box-shadow: 0 0 5px #9beaf5;
        }


        .evaluate-btn {

            width: 100%;

            padding: 14px;

            margin-top: 22px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                90deg,
                #00b4db,
                #00e5ff
            );

            color: #073642;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .evaluate-btn:hover {
            background: linear-gradient(
                90deg,
                #00e5ff,
                #00b4db
            );
        }

       
        .result {

            margin-top: 25px;

            padding: 20px;

            background: #f5fcff;

            border-radius: 18px;

            border-top: 5px solid #00b4db;

            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .result h3 {

            text-align: center;

            color: #243b55;

            margin-top: 0;
        }

        .employee {

            text-align: center;

            font-size: 18px;

            font-weight: bold;

            color: #007c91;

            margin-bottom: 15px;
        }

        

        .score-circle {

            width: 120px;

            height: 120px;

            margin: 15px auto;

            border-radius: 50%;

            background: #e0faff;

            border: 10px solid #00b4db;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #243b55;

            font-size: 25px;

            font-weight: bold;
        }

        

        .progress-bg {

            width: 100%;

            height: 12px;

            background: #dceff3;

            border-radius: 20px;

            overflow: hidden;

            margin: 15px 0;
        }

        .progress {

            height: 100%;

            background: linear-gradient(
                90deg,
                #00b4db,
                #00e5ff
            );

            border-radius: 20px;
        }

       

        .rating {

            text-align: center;

            padding: 12px;

            border-radius: 10px;

            background: #e7f9fc;

            color: #007c91;

            font-size: 20px;

            font-weight: bold;

            margin-top: 15px;
        }

        .remark {

            margin-top: 12px;

            padding: 12px;

            background: white;

            border-radius: 10px;

            color: #555;

            line-height: 1.6;

            text-align: center;
        }

        

        .error {

            margin-top: 15px;

            padding: 12px;

            background: #ffe6e6;

            color: #c62828;

            border-radius: 8px;

            text-align: center;

            font-weight: bold;
        }

       

        .footer {

            background: #141e30;

            color: #b8f5ff;

            text-align: center;

            padding: 14px;

            font-size: 13px;
        }

    </style>

</head>


<body>


<div class="container">


    

    <div class="header">

        <div class="icon"></div>

        <h1>TalentTrack</h1>

        <p>Smart Employee Performance System</p>

    </div>


    <div class="content">


        <h2 class="title">
             Performance Evaluation
        </h2>


        

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = trim($_POST["name"]);

            $score = intval($_POST["score"]);


            if ($name == "") {

                echo "
                <div class='error'>
                     Please enter employee name.
                </div>";

            }

            elseif ($score < 0 || $score > 100) {

                echo "
                <div class='error'>
                     Score must be between 0 and 100.
                </div>";

            }

            else {


               
                if ($score >= 90) {

                    $rating = " Excellent";

                    $remark =
                    "Outstanding performance! Eligible for highest incentives.";

                }

                elseif ($score >= 75) {

                    $rating = " Very Good";

                    $remark =
                    "Great performance! Keep maintaining the quality of work.";

                }

                elseif ($score >= 60) {

                    $rating = " Good";

                    $remark =
                    "Good performance with opportunities for improvement.";

                }

                elseif ($score >= 40) {

                    $rating = " Average";

                    $remark =
                    "Additional training and improvement are recommended.";

                }

                else {

                    $rating = " Needs Improvement";

                    $remark =
                    "Performance improvement and proper guidance are required.";

                }


                

                echo "

                <div class='result'>

                    <h3>
                         Performance Score Card
                    </h3>


                    <div class='employee'>

                         $name

                    </div>


                    <div class='score-circle'>

                        $score%

                    </div>


                    <div class='progress-bg'>

                        <div
                            class='progress'
                            style='width: {$score}%'
                        ></div>

                    </div>


                    <div class='rating'>

                        $rating

                    </div>


                    <div class='remark'>

                        <b> Remarks</b>

                        <br>

                        $remark

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


            <label> Performance Score (0 - 100)</label>

            <input
                type="number"
                name="score"
                min="0"
                max="100"
                placeholder="Example: 85"
                required
            >


            <button
                type="submit"
                class="evaluate-btn"
            >

                 Evaluate Performance

            </button>


        </form>


    </div>


    <div class="footer">

         TalentTrack | Measure • Improve • Succeed

    </div>


</div>


</body>

</html>

