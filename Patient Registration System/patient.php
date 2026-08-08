
<html>
<head>
    <title>MedCare - Patient Registration</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* Medical Background */
            background:
                linear-gradient(rgba(0, 150, 136, 0.85), rgba(0, 188, 212, 0.85)),
                url("hospital.jpg");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            min-height: 100vh;
            padding: 30px;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 25px;
        }

        .header .icon {
            font-size: 55px;
        }

        .header h1 {
            margin: 5px;
            font-size: 35px;
        }

        .header p {
            margin: 5px;
            font-size: 16px;
        }

        .container {
            width: 850px;
            max-width: 95%;
            margin: auto;

            background: rgba(255,255,255,0.97);
            padding: 30px;
            border-radius: 20px;

            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        h2 {
            text-align: center;
            color: #00796b;
            margin-bottom: 25px;
        }

        .section {
            margin-top: 20px;
            margin-bottom: 10px;

            color: #00796b;
            font-size: 18px;
            font-weight: bold;

            border-bottom: 2px solid #b2dfdb;
            padding-bottom: 7px;
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .field {
            flex: 1;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;

            border: 1px solid #ccc;
            border-radius: 8px;

            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #00a896;
            box-shadow: 0 0 6px rgba(0,150,136,0.3);
        }

        textarea {
            height: 80px;
            resize: none;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            margin-top: 25px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(
                90deg,
                #00796b,
                #00acc1
            );

            color: white;
            font-size: 17px;
            font-weight: bold;

            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(0,0,0,0.2);
        }

        .error {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            margin: 7px 0;
            border-radius: 7px;
            font-weight: bold;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }

        .report {
            margin-top: 20px;
            padding: 20px;

            background: #f1fdfb;
            border-left: 6px solid #009688;

            border-radius: 10px;
            line-height: 1.9;
        }

        .report h3 {
            color: #00796b;
            margin-top: 0;
        }

        .badge {
            display: inline-block;
            background: #00acc1;
            color: white;

            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            color: white;
            margin-top: 20px;
            font-size: 13px;
        }

        @media(max-width:700px) {
            .row {
                flex-direction: column;
                gap: 0;
            }
        }

    </style>
</head>

<body>

<div class="header">

    <div class="icon"></div>

    <h1>MedCare+</h1>

    <p>
        Smart Patient Registration & Appointment System
    </p>

</div>


<div class="container">

    <h2>🩺 Patient Registration Form</h2>


<?php

$name = $age = $gender = $phone = "";
$email = $blood = $department = "";
$appointment = $emergency = $address = "";
$symptoms = "";

$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $gender = $_POST["gender"] ?? "";
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);

    $blood = $_POST["blood"] ?? "";
    $department = $_POST["department"] ?? "";

    $appointment = $_POST["appointment"] ?? "";

    $emergency = trim($_POST["emergency"]);
    $address = trim($_POST["address"]);

    $symptoms = trim($_POST["symptoms"]);


   

    if (empty($name)) {

        $errors[] = "Patient name is required.";

    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {

        $errors[] = "Patient name should contain only letters.";

    }



    if (!is_numeric($age) || $age < 1 || $age > 120) {

        $errors[] = "Enter a valid age between 1 and 120.";

    }


  

    if (empty($gender)) {

        $errors[] = "Please select gender.";

    }



    if (!preg_match("/^[0-9]{10}$/", $phone)) {

        $errors[] = "Enter a valid 10-digit phone number.";

    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Enter a valid email address.";

    }



    if (empty($blood)) {

        $errors[] = "Please select blood group.";

    }



    if (empty($department)) {

        $errors[] = "Please select a department.";

    }



    if (empty($appointment)) {

        $errors[] = "Please select appointment date.";

    }


    
    if (!preg_match("/^[0-9]{10}$/", $emergency)) {

        $errors[] =
        "Enter a valid 10-digit emergency contact.";

    }


    

    if (empty($address)) {

        $errors[] = "Address is required.";

    }


    

    if (empty($errors)) {

        echo "
        <div class='success'>

             Patient Registered Successfully!

            <br>

            <span class='badge'>
                MedCare Registration Completed
            </span>

        </div>
        ";


        echo "

        <div class='report'>

            <h3> Patient Confirmation Report</h3>

            <b> Patient Name:</b>
            " . htmlspecialchars($name) . "

            <br>

            <b> Age:</b>
            " . htmlspecialchars($age) . "

            <br>

            <b>⚧ Gender:</b>
            " . htmlspecialchars($gender) . "

            <br>

            <b> Phone:</b>
            " . htmlspecialchars($phone) . "

            <br>

            <b> Email:</b>
            " . htmlspecialchars($email) . "

            <br>

            <b> Blood Group:</b>
            " . htmlspecialchars($blood) . "

            <br>

            <b> Department:</b>
            " . htmlspecialchars($department) . "

            <br>

            <b> Appointment:</b>
            " . htmlspecialchars($appointment) . "

            <br>

            <b> Emergency Contact:</b>
            " . htmlspecialchars($emergency) . "

            <br>

            <b> Address:</b>
            " . htmlspecialchars($address) . "

            <br>

            <b> Symptoms:</b>
            " . htmlspecialchars($symptoms) . "

        </div>

        ";

    } else {

        foreach ($errors as $error) {

            echo "
            <div class='error'>
                 " .
                htmlspecialchars($error)
                . "
            </div>
            ";

        }

    }

}

?>


<form method="post">



<div class="section">
     Personal Information
</div>


<div class="row">

    <div class="field">

        <label>Patient Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter full name"
            value="<?php echo htmlspecialchars($name); ?>"
        >

    </div>


    <div class="field">

        <label>Age</label>

        <input
            type="number"
            name="age"
            placeholder="Enter age"
            min="1"
            max="120"
            value="<?php echo htmlspecialchars($age); ?>"
        >

    </div>

</div>


<div class="row">

    <div class="field">

        <label>Gender</label>

        <select name="gender">

            <option value="">
               
            </option>

            <option value="Male"
            <?php if($gender=="Male") echo "selected"; ?>>
                Male
            </option>

            <option value="Female"
            <?php if($gender=="Female") echo "selected"; ?>>
                Female
            </option>

            <option value="Other"
            <?php if($gender=="Other") echo "selected"; ?>>
                Other
            </option>

        </select>

    </div>


    <div class="field">

        <label>Blood Group</label>

        <select name="blood">

            <option value="">
                
            </option>

            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>O+</option>
            <option>O-</option>
            <option>AB+</option>
            <option>AB-</option>

        </select>

    </div>

</div>




<div class="section">
     Contact Information
</div>


<div class="row">

    <div class="field">

        <label>Phone Number</label>

        <input
            type="text"
            name="phone"
            maxlength="10"
            placeholder="10-digit phone number"
            value="<?php echo htmlspecialchars($phone); ?>"
        >

    </div>


    <div class="field">

        <label>Email Address</label>

        <input
            type="email"
            name="email"
            placeholder="example@gmail.com"
            value="<?php echo htmlspecialchars($email); ?>"
        >

    </div>

</div>


<label> Address</label>

<textarea
    name="address"
    placeholder="Enter complete address"
><?php echo htmlspecialchars($address); ?></textarea>




<div class="section">
     Medical Information
</div>


<div class="row">

    <div class="field">

        <label>Hospital Department</label>

        <select name="department">

            <option value="">
                
            </option>

            <option>General Medicine</option>
            <option>Cardiology</option>
            <option>Dermatology</option>
            <option>Neurology</option>
            <option>Orthopedics</option>
            <option>Pediatrics</option>
            <option>ENT</option>
            <option>Dental</option>
            <option>Gynecology</option>

        </select>

    </div>


    <div class="field">

        <label>Appointment Date</label>

        <input
            type="date"
            name="appointment"
            value="<?php echo htmlspecialchars($appointment); ?>"
        >

    </div>

</div>


<label> Current Symptoms</label>

<textarea
    name="symptoms"
    placeholder="Describe your symptoms..."
><?php echo htmlspecialchars($symptoms); ?></textarea>


<div class="section">
     Emergency Contact
</div>


<label>Emergency Contact Number</label>

<input
    type="text"
    name="emergency"
    maxlength="10"
    placeholder="Enter emergency contact number"
    value="<?php echo htmlspecialchars($emergency); ?>"
>


<input
    type="submit"
    class="submit-btn"
    value=" Register Patient"
>


</form>

</div>


<div class="footer">

     MedCare+ | Patient information is handled securely

</div>


</body>
</html>