
<html>

<head>

    <title>Smart Sales Calculator</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 420px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px gray;
        }

        .icon {
            text-align: center;
            font-size: 45px;
        }

        h2 {
            text-align: center;
            color: #e91e63;
        }

        label {
            font-weight: bold;
        }

        input[type=number] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type=submit] {
            width: 100%;
            padding: 11px;
            background: #e91e63;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background: #c2185b;
        }

        .result {
            margin-top: 20px;
            background: #fce4ec;
            padding: 15px;
            border-radius: 10px;
            line-height: 1.9;
        }

        .total {
            background: #e91e63;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            font-size: 18px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="icon"></div>

    <h2>Smart Sales Calculator</h2>

    <form method="post">

        <label> Product Quantity:</label>

        <input
            type="number"
            name="quantity"
            min="1"
            placeholder="Enter quantity"
            required
        >


        <label> Product Price:</label>

        <input
            type="number"
            name="price"
            min="0"
            step="0.01"
            placeholder="Enter price"
            required
        >


        <label> Discount (%):</label>

        <input
            type="number"
            name="discount"
            min="0"
            max="100"
            value="0"
            placeholder="Enter discount"
        >


        <input
            type="submit"
            value="Calculate Sales"
        >

    </form>


<?php

function calculateSales($quantity, $price)
{
    return $quantity * $price;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantity = $_POST["quantity"];

    $price = $_POST["price"];

    $discount = $_POST["discount"];


    /* Total Sales */

    $total = calculateSales(
        $quantity,
        $price
    );


    /* Discount Amount */

    $discountAmount =
        ($total * $discount) / 100;


    /* Final Amount */

    $finalAmount =
        $total - $discountAmount;


    echo "<div class='result'>";

    echo "<h3> Sales Details</h3>";

    echo "<b> Quantity:</b> "
        . $quantity . "<br>";

    echo "<b> Price:</b> ₹"
        . number_format($price, 2)
        . "<br>";

    echo "<b> Total Sales:</b> ₹"
        . number_format($total, 2)
        . "<br>";

    echo "<b> Discount:</b> "
        . $discount . "%<br>";

    echo "<b> Discount Amount:</b> ₹"
        . number_format(
            $discountAmount,
            2
        )
        . "<br><br>";


    echo "<div class='total'>";

    echo " Final Amount: ₹"
        . number_format(
            $finalAmount,
            2
        );

    echo "</div>";

    echo "</div>";
}

?>

</div>

</body>

</html>

