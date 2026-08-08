
<html>

<head>

    <title>Student Profile</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .profile {
            width: 650px;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .profile-header {
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: white;
            text-align: center;
            padding: 30px;
        }

        .profile-icon {
            width: 90px;
            height: 90px;
            background: white;
            color: #dd2476;
            border-radius: 50%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 45px;
        }

        .profile-header h1 {
            margin-bottom: 5px;
        }

        .details {
            padding: 30px;
        }

        .detail {
            display: flex;
            justify-content: space-between;
            padding: 14px;
            margin-bottom: 10px;
            background: #f7f8ff;
            border-radius: 10px;
            border-left: 5px solid #6a11cb;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #222;
            text-align: right;
        }

        .skills {
            margin-top: 20px;
        }

        .skill {
            display: inline-block;
            background: #6a11cb;
            color: white;
            padding: 7px 12px;
            border-radius: 20px;
            margin: 5px;
            font-size: 13px;
        }

        .back-btn {
            display: block;
            text-align: center;
            text-decoration: none;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 14px;
            border-radius: 12px;
            margin-top: 25px;
            font-weight: bold;
        }

        .back-btn:hover {
            opacity: 0.9;
        }

    </style>

</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $roll = htmlspecialchars($_POST["roll"]);
    $dob = htmlspecialchars($_POST["dob"]);
    $department = htmlspecialchars($_POST["department"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $year = htmlspecialchars($_POST["year"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $address = htmlspecialchars($_POST["address"]);

    if (isset($_POST["skills"])) {

        $skills = $_POST["skills"];

    } else {

        $skills = [];

    }

?>

<div class="profile">

    <div class="profile-header">

        <div class="profile-icon">
            
        </div>

        <h1>
            <?php echo $name; ?>
        </h1>

        <p>
            Student Profile Card
        </p>

    </div>


    <div class="details">

        <div class="detail">
            <span class="label"> Roll Number</span>
            <span class="value">
                <?php echo $roll; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label"> Date of Birth</span>
            <span class="value">
                <?php echo $dob; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label"> Department</span>
            <span class="value">
                <?php echo $department; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label"> Year</span>
            <span class="value">
                <?php echo $year; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label">⚧ Gender</span>
            <span class="value">
                <?php echo $gender; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label">📧 Email</span>
            <span class="value">
                <?php echo $email; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label"> Phone</span>
            <span class="value">
                <?php echo $phone; ?>
            </span>
        </div>

        <div class="detail">
            <span class="label"> Address</span>
            <span class="value">
                <?php echo $address; ?>
            </span>
        </div>


        <div class="skills">

            <strong>💡 Skills:</strong>

            <br>

            <?php

            if (count($skills) > 0) {

                foreach ($skills as $skill) {

                    echo "<span class='skill'>" .
                         htmlspecialchars($skill) .
                         "</span>";

                }

            } else {

                echo "No skills selected.";

            }

            ?>

        </div>


        <a href="index.php" class="back-btn">
            ← Back to Registration
        </a>

    </div>

</div>

<?php

} else {

    echo "<h2>No student data received.</h2>";

}

?>

</body>

</html>

