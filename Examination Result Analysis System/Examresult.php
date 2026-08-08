
<html>
<head>

<title>Smart Result Card</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#667eea,#764ba2);
    padding:30px 10px;
}

.container{
    width:430px;
    max-width:95%;
    margin:auto;
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 35px #333;
}



.header{
    background:linear-gradient(135deg,#ff512f,#dd2476);
    color:white;
    text-align:center;
    padding:22px;
}

.header h1{
    margin:5px;
    font-size:27px;
}

.header p{
    margin:5px;
}



.form{
    padding:22px;
}

h2{
    text-align:center;
    color:#764ba2;
}

label{
    display:block;
    margin-top:12px;
    font-weight:bold;
    color:#555;
}

input{
    width:100%;
    padding:11px;
    margin-top:5px;
    border:2px solid #ddd;
    border-radius:9px;
    box-sizing:border-box;
}

input:focus{
    border-color:#764ba2;
    outline:none;
}

button{
    width:100%;
    padding:13px;
    margin-top:20px;
    border:0;
    border-radius:10px;
    background:linear-gradient(90deg,#667eea,#764ba2);
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}



.result{
    margin:20px;
    padding:18px;
    border-radius:15px;
    background:#f8f4ff;
    border:3px solid #764ba2;
    text-align:center;
}

.student{
    background:#764ba2;
    color:white;
    padding:10px;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;
}

.marks{
    display:flex;
    gap:8px;
    margin-top:15px;
}

.subject{
    flex:1;
    background:#ffe5ec;
    padding:10px;
    border-radius:8px;
    color:#c2185b;
}

.subject b{
    display:block;
    font-size:20px;
    margin-top:5px;
}

.total{
    margin-top:15px;
    color:#555;
    font-weight:bold;
}

.percentage{
    width:100px;
    height:100px;
    margin:18px auto;
    border-radius:50%;
    background:#fff3cd;
    border:8px solid #ffc107;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:21px;
    font-weight:bold;
    color:#764ba2;
}

.class{
    background:#e8e0ff;
    color:#5e35b1;
    padding:12px;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;
}

.pass{
    margin-top:12px;
    background:#d4edda;
    color:#218838;
    padding:10px;
    border-radius:8px;
    font-weight:bold;
}

.fail{
    margin-top:12px;
    background:#ffd6d6;
    color:#c62828;
    padding:10px;
    border-radius:8px;
    font-weight:bold;
}

.error{
    margin:15px;
    padding:10px;
    background:#ffd6d6;
    color:#c62828;
    text-align:center;
    border-radius:8px;
    font-weight:bold;
}

.footer{
    background:#302b63;
    color:white;
    text-align:center;
    padding:12px;
    font-size:13px;
}

</style>

</head>

<body>

<div class="container">



<div class="header">

    <div style="font-size:40px;"></div>

    <h1>Smart Result</h1>

    <p>Examination Result Analysis</p>

</div>


<div class="form">

<h2> Enter Student Details</h2>


<form method="post">

<label> Student Name</label>

<input
type="text"
name="name"
placeholder="Enter student name"
required
>


<label> Subject 1 Marks</label>

<input
type="number"
name="mark1"
min="0"
max="100"
placeholder="0 - 100"
required
>


<label> Subject 2 Marks</label>

<input
type="number"
name="mark2"
min="0"
max="100"
placeholder="0 - 100"
required
>


<label> Subject 3 Marks</label>

<input
type="number"
name="mark3"
min="0"
max="100"
placeholder="0 - 100"
required
>


<button type="submit">
 Generate Result

</button>

</form>


<?php


function calculatePercentage($m1,$m2,$m3)
{
    $total=$m1+$m2+$m3;

    return ($total/300)*100;
}




function getClass($percentage)
{
    if($percentage>=75)
        return " Distinction";

    elseif($percentage>=60)
        return " First Class";

    elseif($percentage>=50)
        return " Second Class";

    elseif($percentage>=35)
        return " Pass Class";

    else
        return " Fail";
}




if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=trim($_POST["name"]);

    $m1=$_POST["mark1"];
    $m2=$_POST["mark2"];
    $m3=$_POST["mark3"];


    if($m1<0 || $m1>100 ||
       $m2<0 || $m2>100 ||
       $m3<0 || $m3>100){

        echo "
        <div class='error'>
         Marks must be between 0 and 100.
        </div>";

    }

    else{

        $total=$m1+$m2+$m3;

        $percentage=
        calculatePercentage($m1,$m2,$m3);

        $class=getClass($percentage);


        echo "

        <div class='result'>

        <h3> RESULT CARD</h3>

        <div class='student'>
         $name
        </div>


        <div class='marks'>

        <div class='subject'>
        Subject 1
        <b>$m1</b>
        </div>

        <div class='subject'>
        Subject 2
        <b>$m2</b>
        </div>

        <div class='subject'>
        Subject 3
        <b>$m3</b>
        </div>

        </div>


        <div class='total'>

        Total Marks: $total / 300

        </div>


        <div class='percentage'>

        ".number_format($percentage,2)."% 

        </div>


        <div class='class'>

        $class

        </div>
        ";


        if($percentage>=35){

            echo "

            <div class='pass'>

             RESULT: PASSED

            </div>";

        }

        else{

            echo "

            <div class='fail'>

             RESULT: FAILED

            </div>";

        }


        echo "

        </div>";

    }

}

?>

</div>


<div class="footer">

 Smart Result • Learn • Achieve • Succeed

</div>


</div>

</body>
</html>

