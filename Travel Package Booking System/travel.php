
<html>
<head>

    <title>WanderWish - Travel Booking</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            
            background:
                linear-gradient(rgba(0, 70, 100, 0.75),
                rgba(0, 120, 150, 0.65)),
                url("travel.jpg");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            min-height: 100vh;
            padding: 30px 10px;
        }

        .container {
            width: 850px;
            max-width: 95%;
            margin: auto;

            background: rgba(255,255,255,0.96);

            border-radius: 25px;
            overflow: hidden;

            box-shadow: 0 15px 45px rgba(0,0,0,0.35);
        }

        
        .header {
            background: linear-gradient(135deg, #00b4db, #0083b0);
            color: white;
            text-align: center;
            padding: 30px;
        }

        .header .logo {
            font-size: 55px;
        }

        .header h1 {
            margin: 5px 0;
            font-size: 34px;
        }

        .header p {
            margin: 8px;
            font-size: 15px;
        }


        .content {
            padding: 30px;
        }

        .section-title {
            text-align: center;
            color: #006d77;
            margin-bottom: 20px;
        }

 

        .packages {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 25px;
        }

        .package {
            border-radius: 15px;
            padding: 18px 8px;
            text-align: center;

            background: #f0fbff;
            border: 2px solid #d5f3f7;

            cursor: pointer;
            transition: 0.3s;
        }

        .package:hover {
            transform: translateY(-7px);
            background: #dff9ff;
            border-color: #00a8cc;
        }

        .package-icon {
            font-size: 35px;
        }

        .package h3 {
            font-size: 15px;
            color: #005f73;
        }

        .package p {
            font-size: 13px;
            color: #555;
        }

        .price {
            color: #e76f51;
            font-weight: bold;
        }


        .form-box {
            background: #f8fdff;
            padding: 25px;
            border-radius: 18px;
            border-left: 5px solid #00a8cc;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            color: #174a5b;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;

            border: 2px solid #d8e9ed;
            border-radius: 10px;

            outline: none;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            border-color: #00a8cc;
            box-shadow: 0 0 5px rgba(0,168,204,0.3);
        }

        .book-btn {
            width: 100%;
            margin-top: 25px;
            padding: 15px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(90deg, #ff7e5f, #feb47b);

            color: white;
            font-size: 17px;
            font-weight: bold;

            cursor: pointer;
            transition: 0.3s;
        }

        .book-btn:hover {
            transform: scale(1.02);
            background: linear-gradient(90deg, #ff6a4d, #ff9b63);
        }

        .confirmation {
            background: linear-gradient(135deg, #d4fc79, #96e6a1);

            padding: 25px;
            margin-bottom: 25px;

            border-radius: 18px;

            text-align: center;

            color: #164d24;

            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .confirmation-icon {
            font-size: 55px;
        }

        .booking-id {
            display: inline-block;

            background: white;
            padding: 10px 18px;

            border-radius: 20px;

            font-weight: bold;
            color: #008000;
        }

        .details {
            background: rgba(255,255,255,0.7);
            padding: 15px;
            margin-top: 15px;

            border-radius: 12px;
            text-align: left;
        }

        .error {
            background: #ffe5e5;
            color: #d00000;

            padding: 10px;
            border-radius: 8px;

            margin-bottom: 8px;
        }

     

        .footer {
            text-align: center;
            padding: 18px;

            background: #003f5c;
            color: white;

            font-size: 13px;
        }

        @media(max-width:700px) {

            .packages {
                grid-template-columns: 1fr 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .header h1 {
                font-size: 26px;
            }
        }

    </style>

</head>

<body>


<div class="container">

    
    <div class="header">

        <div class="logo"></div>

        <h1>WanderWish</h1>

        <p> Your Journey Begins Here </p>

        <p>Explore • Experience • Enjoy</p>

    </div>


    <div class="content">

        <h2 class="section-title">
             Choose Your Dream Destination
        </h2>


        

        <div class="packages">

            <div class="package">

                <div class="package-icon"></div>

                <h3>Goa Escape</h3>

                <p>Beaches & Fun</p>

                <div class="price">₹8,999</div>

            </div>


            <div class="package">

                <div class="package-icon"></div>

                <h3>Kerala Bliss</h3>

                <p>Backwaters & Nature</p>

                <div class="price">₹10,999</div>

            </div>


            <div class="package">

                <div class="package-icon"></div>

                <h3>Manali Adventure</h3>

                <p>Mountains & Snow</p>

                <div class="price">₹14,999</div>

            </div>


            <div class="package">

                <div class="package-icon"></div>

                <h3>Rajasthan Royal</h3>

                <p>Forts & Culture</p>

                <div class="price">₹12,999</div>

            </div>

        </div>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $package = $_POST["package"];
    $date = $_POST["date"];
    $persons = intval($_POST["persons"]);

    $errors = [];


   

    if (empty($name)) {
        $errors[] = " Please enter your name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = " Please enter a valid email address.";
    }

    if (empty($phone)) {
        $errors[] = " Please enter your phone number.";
    }

    if (empty($package)) {
        $errors[] = " Please select a destination.";
    }

    if (empty($date)) {
        $errors[] = " Please select your travel date.";
    }

    if ($persons < 1) {
        $errors[] = " Number of travelers must be at least 1.";
    }


    /* SHOW ERRORS */

    if (!empty($errors)) {

        foreach ($errors as $error) {

            echo "<div class='error'>$error</div>";

        }

    }


    /* SUCCESS */

    else {

        $bookingID = "WW" . rand(10000,99999);

        

        $prices = [

            "Goa Escape" => 8999,

            "Kerala Bliss" => 10999,

            "Manali Adventure" => 14999,

            "Rajasthan Royal" => 12999

        ];


        $total = $prices[$package] * $persons;


        echo "

        <div class='confirmation'>

            <div class='confirmation-icon'></div>

            <h2>Booking Confirmed!</h2>

            <p>Your dream trip is officially booked.</p>

            <p class='booking-id'>
                Booking ID: $bookingID
            </p>


            <div class='details'>

                <p><b> Traveler:</b> $name</p>

                <p><b> Email:</b> $email</p>

                <p><b> Phone:</b> $phone</p>

                <p><b> Destination:</b> $package</p>

                <p><b> Travel Date:</b> $date</p>

                <p><b> Travelers:</b> $persons</p>

                <p><b> Total Amount:</b> ₹$total</p>

            </div>


            <p>
                 Thank you for choosing WanderWish!
            </p>

        </div>

        ";

    }

}

?>


        <div class="form-box">

            <h2 class="section-title">
                 Book Your Adventure
            </h2>


            <form method="post">


                <div class="form-row">

                    <div>

                        <label> Full Name</label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>


                    <div>

                        <label> Email Address</label>

                        <input
                            type="email"
                            name="email"
                            placeholder="example@gmail.com"
                            required
                        >

                    </div>

                </div>


                <div class="form-row">

                    <div>

                        <label> Phone Number</label>

                        <input
                            type="tel"
                            name="phone"
                            placeholder="Enter phone number"
                            required
                        >

                    </div>


                    <div>

                        <label> Travel Package</label>

                        <select name="package" required>

                            <option value="">
                                -- Choose Destination --
                            </option>

                            <option value="Goa Escape">
                                 Goa Escape - ₹8,999
                            </option>

                            <option value="Kerala Bliss">
                                 Kerala Bliss - ₹10,999
                            </option>

                            <option value="Manali Adventure">
                                 Manali Adventure - ₹14,999
                            </option>

                            <option value="Rajasthan Royal">
                                 Rajasthan Royal - ₹12,999
                            </option>

                        </select>

                    </div>

                </div>


                <div class="form-row">

                    <div>

                        <label> Travel Date</label>

                        <input
                            type="date"
                            name="date"
                            required
                        >

                    </div>


                    <div>

                        <label> Number of Travelers</label>

                        <input
                            type="number"
                            name="persons"
                            min="1"
                            max="20"
                            placeholder="Number of people"
                            required
                        >

                    </div>

                </div>


                <button class="book-btn" type="submit">

                     Confirm My Trip

                </button>


            </form>

        </div>

    </div>


    <div class="footer">

         WanderWish Travel &nbsp; | &nbsp;
        Make Memories, Not Just Trips 

    </div>

</div>

</body>
</html>

