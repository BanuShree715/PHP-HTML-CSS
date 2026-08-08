```html
<html>
<head>
    <title>FreshMart - Supermarket Billing</title>

    <style>
        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#dff9fb,#c7ecee,#f6e58d);
            min-height:100vh;
        }

        .header{
            background:linear-gradient(90deg,#00b894,#0984e3);
            color:white;
            padding:22px;
            text-align:center;
            box-shadow:0 4px 12px rgba(0,0,0,0.2);
        }

        .header h1{
            margin:0;
            font-size:32px;
        }

        .header p{
            margin:7px 0 0;
            font-size:14px;
        }

        .container{
            width:500px;
            max-width:92%;
            margin:35px auto;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 12px 35px rgba(0,0,0,0.18);
        }

        .title{
            text-align:center;
            color:#0984e3;
            margin-bottom:25px;
        }

        .title span{
            font-size:45px;
        }

        .title h2{
            margin:5px 0;
        }

        .input-box{
            margin-bottom:17px;
        }

        label{
            display:block;
            font-weight:bold;
            color:#2d3436;
            margin-bottom:7px;
        }

        input{
            width:100%;
            padding:12px;
            border:2px solid #dfe6e9;
            border-radius:10px;
            font-size:15px;
            outline:none;
            transition:0.3s;
        }

        input:focus{
            border-color:#00b894;
            box-shadow:0 0 7px rgba(0,184,148,0.3);
        }

        .row{
            display:flex;
            gap:15px;
        }

        .row .input-box{
            width:50%;
        }

        .discount{
            background:#fff4e6;
        }

        .tax{
            background:#eef9ff;
        }

        .submit-btn{
            width:100%;
            padding:15px;
            border:none;
            border-radius:12px;
            background:linear-gradient(90deg,#00b894,#0984e3);
            color:white;
            font-size:17px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .submit-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 7px 15px rgba(0,0,0,0.2);
        }

        .features{
            display:flex;
            justify-content:space-around;
            margin-top:25px;
            text-align:center;
        }

        .feature{
            font-size:13px;
            color:#636e72;
        }

        .feature b{
            display:block;
            font-size:22px;
            margin-bottom:5px;
        }

        .footer{
            text-align:center;
            color:#636e72;
            font-size:13px;
            padding:15px;
        }

        @media(max-width:550px){
            .row{
                display:block;
            }

            .row .input-box{
                width:100%;
            }

            .header h1{
                font-size:25px;
            }
        }
    </style>
</head>

<body>

<div class="header">
    <h1> FreshMart Supermarket</h1>
    <p>Smart Shopping • Easy Billing • Happy Customers</p>
</div>

<div class="container">

    <div class="title">
        <span></span>
        <h2>Generate Your Bill</h2>
        <p>Enter the product details below</p>
    </div>

    <form action="invoice.php" method="POST">

        <div class="input-box">
            <label> Customer Name</label>
            <input type="text" name="customer"
                   placeholder="Enter customer name" required>
        </div>

        <div class="input-box">
            <label> Product Name</label>
            <input type="text" name="product"
                   placeholder="Enter product name" required>
        </div>

        <div class="row">

            <div class="input-box">
                <label> Price (₹)</label>
                <input type="number" name="price"
                       step="0.01"
                       min="0"
                       placeholder="0.00"
                       required>
            </div>

            <div class="input-box">
                <label> Quantity</label>
                <input type="number" name="quantity"
                       min="1"
                       placeholder="1"
                       required>
            </div>

        </div>

        <div class="row">

            <div class="input-box">
                <label> Discount (%)</label>
                <input class="discount"
                       type="number"
                       name="discount"
                       value="10"
                       min="0"
                       max="100"
                       required>
            </div>

            <div class="input-box">
                <label> Tax (%)</label>
                <input class="tax"
                       type="number"
                       name="tax"
                       value="5"
                       min="0"
                       required>
            </div>

        </div>

        <button type="submit" class="submit-btn">
             Generate Invoice
        </button>

    </form>

    <div class="features">
        <div class="feature">
            <b></b>
            Fast Billing
        </div>

        <div class="feature">
            <b></b>
            Smart Discount
        </div>

        <div class="feature">
            <b></b>
            Easy Invoice
        </div>
    </div>

</div>

<div class="footer">
    © 2026 FreshMart Supermarket | Thank You for Shopping With Us 
</div>

</body>
</html>
```
