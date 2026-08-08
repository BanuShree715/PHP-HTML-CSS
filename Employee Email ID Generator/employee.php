
<html>

<head>

    <title>Employee Email ID Generator</title>

    <style>

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            font-family:Arial,sans-serif;
            min-height:100vh;
            background:linear-gradient(135deg,#6c5ce7,#0984e3,#00cec9);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        /* Main Card */

        .container{
            width:500px;
            max-width:92%;
            background:white;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 18px 45px rgba(0,0,0,0.25);
        }

        /* Header */

        .header{
            background:linear-gradient(135deg,#6c5ce7,#0984e3);
            color:white;
            text-align:center;
            padding:30px 20px;
        }

        .header .icon{
            font-size:55px;
        }

        .header h1{
            margin:8px 0;
            font-size:28px;
        }

        .header p{
            margin:5px;
            opacity:0.9;
        }

        /* Form */

        .form-area{
            padding:30px;
        }

        .form-title{
            text-align:center;
            color:#2d3436;
            margin-bottom:25px;
        }

        .form-title h2{
            color:#6c5ce7;
            margin:5px;
        }

        .form-title p{
            color:#636e72;
            font-size:14px;
        }

        label{
            display:block;
            font-weight:bold;
            color:#2d3436;
            margin-bottom:8px;
        }

        .input-box{
            position:relative;
            margin-bottom:20px;
        }

        .input-icon{
            position:absolute;
            left:13px;
            top:12px;
            font-size:18px;
        }

        input[type=text]{
            width:100%;
            padding:13px 13px 13px 42px;
            border:2px solid #dfe6e9;
            border-radius:12px;
            font-size:15px;
            outline:none;
            transition:0.3s;
        }

        input[type=text]:focus{
            border-color:#6c5ce7;
            box-shadow:0 0 10px rgba(108,92,231,0.2);
        }

        

        .generate-btn{
            width:100%;
            padding:14px;
            border:none;
            border-radius:12px;
            background:linear-gradient(90deg,#6c5ce7,#0984e3);
            color:white;
            font-size:17px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .generate-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 18px rgba(0,0,0,0.2);
        }

      

        .result{
            margin-top:25px;
            padding:20px;
            background:linear-gradient(135deg,#e8f8ff,#f1eaff);
            border-radius:15px;
            text-align:center;
            border:2px solid #dfe6e9;
        }

        .result-icon{
            font-size:40px;
        }

        .result h3{
            margin:8px;
            color:#2d3436;
        }

        .email-box{
            background:white;
            padding:15px;
            border-radius:10px;
            color:#6c5ce7;
            font-weight:bold;
            font-size:17px;
            word-break:break-all;
            border:1px dashed #6c5ce7;
        }

        

        .copy-btn{
            margin-top:12px;
            padding:10px 18px;
            border:none;
            border-radius:8px;
            background:#00b894;
            color:white;
            font-weight:bold;
            cursor:pointer;
        }

        .copy-btn:hover{
            background:#009874;
        }

        /* Reset */

        .reset{
            display:inline-block;
            margin-top:15px;
            color:#636e72;
            text-decoration:none;
            font-size:14px;
        }

        .reset:hover{
            color:#6c5ce7;
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

        .feature-icon{
            display:block;
            font-size:22px;
            margin-bottom:5px;
        }

        

        .footer{
            text-align:center;
            background:#f8f9fa;
            padding:15px;
            color:#636e72;
            font-size:12px;
        }

    </style>

</head>


<body>


<div class="container">


   

    <div class="header">

        <div class="icon"></div>

        <h1>Employee Email Generator</h1>

        <p>Smart • Fast • Professional</p>

    </div>


    <div class="form-area">


        

        <div class="form-title">

            <h2> Create Employee Email</h2>

            <p>
                Enter the employee's full name
                to generate an official email ID.
            </p>

        </div>

        <form method="post">

            <div class="input-box">

                <span class="input-icon"></span>

                <label>Employee Name</label>

                <input
                    type="text"
                    name="empName"
                    placeholder="Example: Banu Shree"
                    required>

            </div>


            <button
                type="submit"
                class="generate-btn">

                 Generate Email ID

            </button>

        </form>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $name = trim($_POST["empName"]);
    $emailName = strtolower($name);
    $emailName = str_replace(
        " ",
        ".",
        $emailName
    );

    $emailName = preg_replace(
        "/[^a-z.]/",
        "",
        $emailName
    );

    $email = $emailName . "@company.com";

?>

        
        <div class="result">

            <div class="result-icon">
                
            </div>

            <h3>
                Email ID Generated Successfully!
            </h3>

            <p>
                Official Employee Email
            </p>

            <div
                class="email-box"
                id="email">

                <?php echo htmlspecialchars($email); ?>

            </div>


            <button
                class="copy-btn"
                onclick="copyEmail()">

                 Copy Email

            </button>


            <div>

                <a
                    href="index.php"
                    class="reset">

                     Generate Another Email

                </a>

            </div>

        </div>

<?php

}

?>


      

        <div class="features">

            <div class="feature">

                <span class="feature-icon">
                    
                </span>

                Lowercase

            </div>


            <div class="feature">

                <span class="feature-icon">
                    
                </span>

                Clean Name

            </div>


            <div class="feature">

                <span class="feature-icon">
                    
                </span>

                Company Email

            </div>

        </div>


    </div>


    

    <div class="footer">

        © 2026 Company HR Portal
        | Professional Email Management 

    </div>


</div>


<script>

function copyEmail()
{
    let email =
        document.getElementById("email").innerText;

    navigator.clipboard.writeText(email);

    alert(" Email ID copied successfully!");
}

</script>


</body>

</html>
