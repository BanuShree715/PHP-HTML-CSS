

<html>
<head>
    <title>Restaurant Menu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8f8f8;
        }

        .header {
            background: #d35400;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .header h1 {
            font-size: 35px;
        }

        .menu-container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .category {
            background: white;
            flex: 1;
            min-width: 280px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .category h2 {
            color: #d35400;
            text-align: center;
            margin-bottom: 15px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .price {
            color: green;
            font-weight: bold;
        }

        .order {
            width: 90%;
            max-width: 700px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }

        .order h2 {
            color: #d35400;
            margin-bottom: 10px;
        }

        .order p {
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            margin-top: 15px;
            background: #27ae60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background: #1e8449;
        }

        @media(max-width:600px) {
            .menu-container {
                flex-direction: column;
            }

            .header h1 {
                font-size: 25px;
            }
        }

    </style>

</head>

<body>

<div class="header">
    <h1>Delicious Food Restaurant</h1>
    <p>Fresh Food | Quality Service | Best Taste</p>
</div>


<div class="menu-container">

        <div class="category">
        <h2>Starters</h2>

        <div class="item">
            <span>Veg Spring Roll</span>
            <span class="price">₹120</span>
        </div>

        <div class="item">
            <span>Paneer Tikka</span>
            <span class="price">₹180</span>
        </div>

        <div class="item">
            <span>Chicken 65</span>
            <span class="price">₹220</span>
        </div>
    </div>


        <div class="category">
        <h2>Main Course</h2>

        <div class="item">
            <span>Veg Fried Rice</span>
            <span class="price">₹150</span>
        </div>

        <div class="item">
            <span>Chicken Biryani</span>
            <span class="price">₹250</span>
        </div>

        <div class="item">
            <span>Butter Naan</span>
            <span class="price">₹60</span>
        </div>
    </div>


      <div class="category">
        <h2>Desserts</h2>

        <div class="item">
            <span>Ice Cream</span>
            <span class="price">₹100</span>
        </div>

        <div class="item">
            <span>Chocolate Cake</span>
            <span class="price">₹150</span>
        </div>

        <div class="item">
            <span>Gulab Jamun</span>
            <span class="price">₹80</span>
        </div>
    </div>

</div>


<div class="order">

    <h2>Ordering Information</h2>

    <p>
        To place an order, call us at:
        <b>+91 9876543210</b>
    </p>

    <p>
        Home delivery available from 10:00 AM to 10:00 PM.
    </p>

    <a href="#" class="button">Order Now</a>

</div>


</body>
</html>


