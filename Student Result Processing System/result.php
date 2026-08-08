
<html>
<head>

<title>EduTrack - Student Result</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#6c5ce7,#0984e3,#00cec9);
    min-height:100vh;
}



.result{
    width:700px;
    max-width:94%;
    margin:35px auto;
    background:white;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}



.result-header{
    background:linear-gradient(90deg,#6c5ce7,#0984e3);
    color:white;
    text-align:center;
    padding:25px;
}

.result-header .icon{
    font-size:48px;
}

.result-header h1{
    margin:5px;
}

.result-header p{
    margin:5px;
}

.student-card{
    margin:25px 30px;
    padding:18px;
    background:#f1f2ff;
    border-left:6px solid #6c5ce7;
    border-radius:12px;
}

.student-card p{
    margin:6px 0;
    color:#2d3436;
}



.content{
    padding:0 30px 25px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

th{
    background:#0984e3;
    color:white;
    padding:13px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #dfe6e9;
}

tr:hover{
    background:#f5faff;
}



.summary{
    margin-top:25px;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
}

.summary-card{
    padding:18px;
    border-radius:12px;
    text-align:center;
    background:#f8f9fa;
}

.summary-card .number{
    font-size:25px;
    font-weight:bold;
    color:#6c5ce7;
}

.summary-card p{
    margin:5px;
    color:#636e72;
}


.grade-box{
    text-align:center;
    margin:25px 0;
    padding:22px;
    border-radius:15px;
    background:linear-gradient(135deg,#ffeaa7,#fab1a0);
}

.grade-box h2{
    margin:5px;
    color:#2d3436;
}

.grade{
    font-size:42px;
    font-weight:bold;
    color:#6c5ce7;
}

/* Progress */

.progress-container{
    margin:20px 0;
}

.progress-title{
    display:flex;
    justify-content:space-between;
    margin-bottom:7px;
    font-weight:bold;
}

.progress{
    height:18px;
    background:#dfe6e9;
    border-radius:20px;
    overflow:hidden;
}

.progress-bar{
    height:100%;
    background:linear-gradient(90deg,#00b894,#00cec9);
    width:<?php echo min($average, 100); ?>%;
}

.status{
    text-align:center;
    padding:15px;
    border-radius:12px;
    background:#dff9fb;
    color:#00897b;
    font-weight:bold;
    font-size:18px;
}

.buttons{
    text-align:center;
    padding:20px;
    background:#f8f9fa;
}

.btn{
    display:inline-block;
    padding:12px 22px;
    margin:5px;
    border:none;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.print{
    background:#0984e3;
}

.back{
    background:#00b894;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 6px 15px rgba(0,0,0,0.2);
}


@media(max-width:600px){

    .summary{
        grid-template-columns:1fr;
    }

    th,td{
        padding:8px 5px;
        font-size:13px;
    }

}



@media print{

    body{
        background:white;
    }

    .result{
        width:100%;
        margin:0;
        box-shadow:none;
    }

    .buttons{
        display:none;
    }

}

</style>

</head>

<body>

<div class="result">

<?php



function calculateTotal($marks)
{
    return array_sum($marks);
}

function calculateAverage($total, $count)
{
    return $total / $count;
}

function calculateGrade($average)
{
    if($average >= 90)
        return "A+";

    elseif($average >= 80)
        return "A";

    elseif($average >= 70)
        return "B";

    elseif($average >= 60)
        return "C";

    elseif($average >= 50)
        return "D";

    else
        return "F";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name = htmlspecialchars($_POST["name"]);

    $marks = array(
        (int)$_POST["m1"],
        (int)$_POST["m2"],
        (int)$_POST["m3"],
        (int)$_POST["m4"],
        (int)$_POST["m5"]
    );

    $total =
        calculateTotal($marks);

    $average =
        calculateAverage(
            $total,
            count($marks)
        );

    $grade =
        calculateGrade($average);

?>
<div class="result-header">

    <div class="icon"></div>

    <h1>Student Result</h1>

    <p>EduTrack Academic Performance Report</p>

</div>
<div class="student-card">

    <p>
         <b>Student Name:</b>
        <?php echo $name; ?>
    </p>

    <p>
         <b>Result Date:</b>
        <?php echo date("d-m-Y"); ?>
    </p>

</div>


<div class="content">

    <h2 style="color:#6c5ce7;">
         Subject Performance
    </h2>

    <table>

        <tr>

            <th>Subject</th>

            <th>Marks</th>

            <th>Performance</th>

        </tr>


        <?php

        $subjectNames = array(
            "Subject 1",
            "Subject 2",
            "Subject 3",
            "Subject 4",
            "Subject 5"
        );

        for($i=0;$i<5;$i++)
        {

            if($marks[$i] >= 75)
                $performance = "Excellent ";

            elseif($marks[$i] >= 60)
                $performance = "Good ";

            elseif($marks[$i] >= 50)
                $performance = "Average ";

            else
                $performance = "Needs Improvement ";

        ?>

        <tr>

            <td>
                <?php echo $subjectNames[$i]; ?>
            </td>

            <td>
                <b><?php echo $marks[$i]; ?>/100</b>
            </td>

            <td>
                <?php echo $performance; ?>
            </td>

        </tr>

        <?php

        }

        ?>

    </table>
<div class="summary">

        <div class="summary-card">

            <div class="number">
                <?php echo $total; ?>
            </div>

            <p>Total Marks / 500</p>

        </div>


        <div class="summary-card">

            <div class="number">
                <?php
                echo number_format($average,2);
                ?>
            </div>

            <p>Average Marks</p>

        </div>

    </div>
    <div class="progress-container">

        <div class="progress-title">

            <span> Overall Performance</span>

            <span>
                <?php
                echo number_format($average,1);
                ?>%
            </span>

        </div>

        <div class="progress">

            <div class="progress-bar"></div>

        </div>

    </div>
    <div class="grade-box">

        <h2> Final Grade</h2>

        <div class="grade">

            <?php echo $grade; ?>

        </div>

    </div>
    <div class="status">

        <?php

        if($grade == "F")
        {
            echo " Keep Learning! You Can Do Better!";
        }
        else
        {
            echo " Congratulations! You Passed!";
        }

        ?>

    </div>

</div>
<div class="buttons">

    <button
        class="btn print"
        onclick="window.print()">

         Print Result

    </button>


    <a
        href="index.php"
        class="btn back">

         New Result

    </a>

</div>


<?php

}
else
{

?>

<div class="content">

    <h2> Invalid Request</h2>

    <p>Please enter the student details first.</p>

    <a
        href="index.php"
        class="btn back">

         Back to Home

    </a>

</div>

<?php

}

?>

</div>

</body>
</html>
