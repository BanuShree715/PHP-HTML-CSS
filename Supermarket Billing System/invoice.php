```php

<html>
<head>

<title>FreshMart - Customer Invoice</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#dff9fb,#c7ecee,#f6e58d);
    min-height:100vh;
}

.invoice{
    width:700px;
    max-width:94%;
    margin:35px auto;
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

/* Header */

.invoice-header{
    background:linear-gradient(90deg,#00b894,#0984e3);
    color:white;
    padding:25px;
    text-align:center;
}

.invoice-header .logo{
    font-size:45px;
}

.invoice-header h1{
    margin:5px 0;
    font-size:30px;
}

.invoice-header p{
    margin:5px;
}

/* Invoice information */

.info{
    padding:20px 30px;
    display:flex;
    justify-content:space-between;
    background:#f8f9fa;
}

.info p{
    margin:5px 0;
    color:#2d3436;
}

/* Content */

.content{
    padding:25px 30px;
}

.customer{
    background:#e8fff7;
    border-left:5px solid #00b894;
    padding:12px 15px;
    border-radius:8px;
    margin-bottom:20px;
}

/* Table */

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
    background:#f1faff;
}

/* Summary */

.summary{
    margin-top:20px;
    margin-left:auto;
    width:55%;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    padding:10px;
    border-bottom:1px solid #eee;
}

.discount-row{
    color:#e17055;
}

.tax-row{
    color:#0984e3;
}

.total{
    margin-top:8px;
    padding:17px;
    border-radius:10px;
    background:linear-gradient(90deg,#00b894,#55efc4);
    color:white;
    font-size:21px;
    font-weight:bold;
    display:flex;
    justify-content:space-between;
}

/* Thank you */

.thankyou{
    text-align:center;
    padding:20px;
    background:#f8f9fa;
}

.thankyou h3{
    color:#00a884;
    margin:5px;
}

.thankyou p{
    color:#636e72;
}

/* Buttons */

.buttons{
    text-align:center;
    padding:20px;
}

.btn{
    display:inline-block;
    padding:12px 22px;
    margin:5px;
    border:none;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
    cursor:pointer;
    color:white;
}

.print{
    background:#0984e3;
}

.back{
    background:#00b894;
}

.btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(0,0,0,0.2);
}

/* Print */

@media print{

    body{
        background:white;
    }

    .buttons{
        display:none;
    }

    .invoice{
        width:100%;
        margin:0;
        box-shadow:none;
    }
}

/* Mobile */

@media(max-width:600px){

    .info{
        display:block;
    }

    .summary{
        width:100%;
    }

    th,td{
        padding:8px 4px;
        font-size:13px;
    }

}

</style>

</head>

<body>

<div class="invoice">

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $customer = htmlspecialchars($_POST["customer"]);
    $product = htmlspecialchars($_POST["product"]);

    $price = (float)$_POST["price"];
    $quantity = (int)$_POST["quantity"];

    $discount = (float)$_POST["discount"];
    $tax = (float)$_POST["tax"];

    /* Billing Calculation */

    $subtotal = $price * $quantity;

    $discountAmount =
        ($subtotal * $discount) / 100;

    $amountAfterDiscount =
        $subtotal - $discountAmount;

    $taxAmount =
        ($amountAfterDiscount * $tax) / 100;

    $grandTotal =
        $amountAfterDiscount + $taxAmount;

    /* Bill Number */

    $billNumber =
        "FM" . date("YmdHis");

?>



<div class="invoice-header">

    <div class="logo"></div>

    <h1>FRESHMART</h1>

    <p>Supermarket & Daily Essentials</p>

</div>



<div class="info">

    <div>

        <p>
            <b> Bill No:</b>
            <?php echo $billNumber; ?>
        </p>

        <p>
            <b> Date:</b>
            <?php echo date("d-m-Y"); ?>
        </p>

    </div>

    <div>

        <p>
            <b> Time:</b>
            <?php echo date("h:i A"); ?>
        </p>

        <p>
            <b> Payment:</b>
            Cash / UPI
        </p>

    </div>

</div>

<div class="content">

   
    <div class="customer">

        
        <b>Customer:</b>
        <?php echo $customer; ?>

    </div>

    

    <table>

        <tr>

            <th> Product</th>

            <th> Price</th>

            <th> Qty</th>

            <th> Subtotal</th>

        </tr>

        <tr>

            <td>
                <?php echo $product; ?>
            </td>

            <td>
                ₹<?php echo number_format($price,2); ?>
            </td>

            <td>
                <?php echo $quantity; ?>
            </td>

            <td>
                ₹<?php
                echo number_format($subtotal,2);
                ?>
            </td>

        </tr>

    </table>

    

    <div class="summary">

        <div class="summary-row">

            <span>Subtotal</span>

            <b>
                ₹<?php
                echo number_format($subtotal,2);
                ?>
            </b>

        </div>

        <div class="summary-row discount-row">

            <span>
                Discount
                (<?php echo $discount; ?>%)
            </span>

            <b>
                - ₹<?php
                echo number_format($discountAmount,2);
                ?>
            </b>

        </div>

        <div class="summary-row">

            <span>
                Amount After Discount
            </span>

            <b>
                ₹<?php
                echo number_format(
                    $amountAfterDiscount,
                    2
                );
                ?>
            </b>

        </div>

        <div class="summary-row tax-row">

            <span>
                 Tax
                (<?php echo $tax; ?>%)
            </span>

            <b>
                + ₹<?php
                echo number_format($taxAmount,2);
                ?>
            </b>

        </div>

        <div class="total">

            <span> GRAND TOTAL</span>

            <span>
                ₹<?php
                echo number_format($grandTotal,2);
                ?>
            </span>

        </div>

    </div>

</div>


<div class="thankyou">

    <h3> Thank You for Shopping!</h3>

    <p>
        We hope to see you again at FreshMart.
    </p>

    <p>
         Happy Shopping • Save More • Shop Smart 
    </p>

</div>


<div class="buttons">

    <button
        class="btn print"
        onclick="window.print()">

         Print Bill

    </button>

    <a
        href="index.php"
        class="btn back">

         New Bill

    </a>

</div>

<?php

}
else
{

?>

<div class="content">

    <h2> Invalid Request</h2>

    <p>
        Please return to the billing page.
    </p>

    <a
        href="index.php"
        class="btn back">

         Back to Billing

    </a>

</div>

<?php

}

?>

</div>

</body>
</html>
```
