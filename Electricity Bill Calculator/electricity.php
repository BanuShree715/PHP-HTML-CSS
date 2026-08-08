
<html>
<head>

<title>Electricity Bill Calculator</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#89f7fe,#66a6ff);
    margin:0;
    padding:40px;
}

.container{
    width:420px;
    margin:auto;
    background:pink;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 20px gray;
}

h2{
    text-align:center;
    color:#1565c0;
}

.icon{
    text-align:center;
    font-size:45px;
}

label{
    font-weight:bold;
}

input[type=number]{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #aaaaaa;
    border-radius:6px;
}

input[type=submit]{
    width:100%;
    padding:11px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
    font-size:16px;
}

input[type=submit]:hover{
    background:yellow;
}

.result{
    margin-top:20px;
    background:#e3f2fd;
    padding:15px;
    border-radius:10px;
    line-height:1.9;
}

.result h3{
    color:#1565c0;
}

.total{
    background:#1565c0;
    color:white;
    padding:10px;
    border-radius:6px;
    font-size:18px;
}

</style>

</head>

<body>

<div class="container">

<div class="icon"></div>

<h2>Electricity Bill Calculator</h2>

<form method="post">

<label>Enter Units Consumed:</label>

<input
type="number"
name="units"
min="0"
placeholder="Enter units"
required
>

<input
type="submit"
value="Calculate Bill"
>

</form>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $units=$_POST["units"];

    $bill=0;
    $rate=0;


    if($units<=100){

        $bill=$units*1.50;
        $rate="₹1.50 per unit";

    }

    elseif($units<=200){

        $bill=(100*1.50)+
              (($units-100)*2.50);

        $rate="₹2.50 per unit";

    }

    elseif($units<=500){

        $bill=(100*1.50)+
              (100*2.50)+
              (($units-200)*4.00);

        $rate="₹4.00 per unit";

    }

    else{

        $bill=(100*1.50)+
              (100*2.50)+
              (300*4.00)+
              (($units-500)*6.00);

        $rate="₹6.00 per unit";

    }



    $fixed_charge=50;

    $total=$bill+$fixed_charge;


    echo "<div class='result'>";

    echo "<h3> Bill Details</h3>";

    echo "<b> Units Consumed:</b>
          $units Units<br>";

    echo "<b> Current Rate:</b>
          $rate<br>";

    echo "<b> Energy Charge:</b>
          ₹".number_format($bill,2)."<br>";

    echo "<b> Fixed Charge:</b>
          ₹".number_format($fixed_charge,2)."<br><br>";


    echo "<div class='total'>";

    echo "Total Bill: ₹".
         number_format($total,2);

    echo "</div>";


    echo "</div>";

}

?>

</div>

</body>
</html>