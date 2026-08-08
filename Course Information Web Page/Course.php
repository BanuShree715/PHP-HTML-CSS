<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Information</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        header{
            background:#0077cc;
            color:white;
            text-align:center;
            padding:20px;
        }

        .container{
            width:90%;
            margin:20px auto;
        }

        .section{
            background:white;
            padding:20px;
            margin-bottom:20px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.2);
        }

        h2{
            color:#0077cc;
            margin-bottom:15px;
        }

        ul{
            margin-left:20px;
        }

        .trainers{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }

        .card{
            flex:1;
            min-width:250px;
            background:#eef7ff;
            padding:15px;
            border-radius:10px;
            text-align:center;
            box-shadow:0 2px 5px rgba(0,0,0,0.2);
        }

        .card img{
            width:120px;
            height:120px;
            border-radius:50%;
            margin-bottom:10px;
        }

        footer{
            background:#0077cc;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:20px;
        }
    </style>
</head>
<body>

<header>
    <h1>ABC Training Institute</h1>
    <p>Learn Today, Lead Tomorrow</p>
</header>

<div class="container">

      <div class="section">
        <h2>Course Details</h2>
        <p><strong>Course Name:</strong> Full Stack Web Development</p>
        <p><strong>Duration:</strong> 3 Months</p>
        <p><strong>Mode:</strong> Online & Offline</p>
        <p><strong>Course Highlights:</strong></p>
        <ul>
            <li>HTML, CSS, JavaScript</li>
            <li>PHP & MySQL</li>
            <li>Bootstrap Framework</li>
            <li>Mini & Final Projects</li>
            <li>Certificate on Completion</li>
        </ul>
    </div>

        <div class="section">
        <h2>Trainer Profiles</h2>

        <div class="trainers">

            <div class="card">
                <img src="https://via.placeholder.com/120" alt="Trainer">
                <h3>Mr. John Smith</h3>
                <p>Senior Web Developer</p>
                <p>8+ Years of Experience</p>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/120" alt="Trainer">
                <h3>Ms. Sarah Johnson</h3>
                <p>PHP & MySQL Expert</p>
                <p>6+ Years of Experience</p>
            </div>

        </div>
    </div>

       <div class="section">
        <h2>Contact Information</h2>
        <p><strong>Institute:</strong> ABC Training Institute</p>
        <p><strong>Address:</strong> 123 Main Road, Chennai</p>
        <p><strong>Phone:</strong> +91 98765 43210</p>
        <p><strong>Email:</strong> info@abctraining.com</p>
        <p><strong>Website:</strong> www.abctraining.com</p>
    </div>

</div>

<footer>
    <p>&copy; 2026 ABC Training Institute | All Rights Reserved</p>
</footer>

</body>
</html>

