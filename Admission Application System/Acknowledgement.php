```php
 
<html>
<head>

    <title>Application Submitted</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            min-height: 100vh;
            padding: 40px 10px;
        }

        .box {
            width: 650px;
            max-width: 95%;
            margin: auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .success {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            text-align: center;
            padding: 35px 20px;
        }

        .success-icon {
            font-size: 60px;
        }

        .success h1 {
            margin: 10px 0;
        }

        .application-id {
            background: rgba(255,255,255,0.2);
            display: inline-block;
            padding: 10px 20px;
            border-radius: 20px;
            margin-top: 10px;
        }

        .content {
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #5a4fcf;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f5f5ff;
        }

        .thankyou {
            text-align: center;
            color: #555;
            margin-top: 25px;
            line-height: 1.6;
        }

        .home-btn {
            display: block;
            width: 220px;
            margin: 25px auto 0;
            padding: 13px;
            text-align: center;
            text-decoration: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 25px;
            font-weight: bold;
        }

        .home-btn:hover {
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #f5f5f5;
            color: #777;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="box">

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $address = trim($_POST["address"] ?? "");

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($course) ||
        empty($gender)
    ) {

        echo "
        <div class='content'>
            <h2 style='color:red;text-align:center;'>
                 All mandatory fields are required!
            </h2>

            <a href='index.html' class='home-btn'>
                ← Go Back
            </a>
        </div>
        ";

    } else {

        // Generate unique application number
        $application_id = "FP" . date("Ymd") . rand(1000,9999);

        echo "
        <div class='success'>

            <div class='success-icon'></div>

            <h1>Application Submitted!</h1>

            <p>Your admission application was successfully received.</p>

            <div class='application-id'>
                Application ID: <strong>$application_id</strong>
            </div>

        </div>
        ";

        echo "<div class='content'>";

        echo "<h2 style='color:#5a4fcf;text-align:center;'>
                 Application Details
              </h2>";

        echo "<table>";

        echo "<tr>
                <th>Information</th>
                <th>Details</th>
              </tr>";

        echo "<tr>
                <td> Full Name</td>
                <td>" . htmlspecialchars($name) . "</td>
              </tr>";

        echo "<tr>
                <td> Email</td>
                <td>" . htmlspecialchars($email) . "</td>
              </tr>";

        echo "<tr>
                <td> Phone</td>
                <td>" . htmlspecialchars($phone) . "</td>
              </tr>";

        echo "<tr>
                <td> Course</td>
                <td>" . htmlspecialchars($course) . "</td>
              </tr>";

        echo "<tr>
                <td> Gender</td>
                <td>" . htmlspecialchars($gender) . "</td>
              </tr>";

        echo "<tr>
                <td> Address</td>
                <td>" . nl2br(htmlspecialchars($address)) . "</td>
              </tr>";

        echo "</table>";

        echo "
            <div class='thankyou'>

                <h3>Thank You for Applying!</h3>

                <p>
                    Your application has been received successfully.
                    Please keep your Application ID for future reference.
                </p>

            </div>

            <a href='index.html' class='home-btn'>
                 Apply Another Application
            </a>
        ";

        echo "</div>";
    }

} else {

    echo "
        <div class='content'>

            <h2 style='color:red;text-align:center;'>
                 Invalid Request!
            </h2>

            <a href='index.html' class='home-btn'>
                ← Return to Application
            </a>

        </div>
    ";
}

?>

<div class="footer">
    FuturePath Admissions © 2026 | Empowering Your Future 🚀
</div>

</div>

</body>
</html>
```
