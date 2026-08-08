
<html>
<head>
    <title>FuturePath Admission Portal</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            padding: 30px 10px;
        }

        .container {
            width: 650px;
            max-width: 95%;
            margin: auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .header {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .header .icon {
            font-size: 50px;
        }

        .header h1 {
            margin: 10px 0 5px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            font-size: 15px;
        }

        form {
            padding: 30px;
        }

        .section-title {
            color: #5a4fcf;
            border-left: 5px solid #5a4fcf;
            padding-left: 10px;
            margin: 20px 0;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 7px;
        }

        .required {
            color: red;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            margin-bottom: 18px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102,126,234,0.3);
        }

        textarea {
            height: 90px;
            resize: none;
        }

        .gender-box {
            display: flex;
            gap: 25px;
            margin-bottom: 20px;
        }

        .gender-box label {
            font-weight: normal;
            background: #f3f4ff;
            padding: 10px 18px;
            border-radius: 20px;
            cursor: pointer;
        }

        .gender-box input {
            width: auto;
            margin: 0 5px 0 0;
        }

        .course-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .course-card {
            padding: 12px;
            border-radius: 10px;
            background: #f4f6ff;
            color: #444;
            text-align: center;
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #f5f5f5;
            color: #777;
            font-size: 13px;
        }

        @media(max-width:600px) {
            .course-info {
                grid-template-columns: 1fr;
            }

            .gender-box {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div class="icon"></div>
        <h1>FuturePath Admissions</h1>
        <p>Start Your Journey Towards a Bright Future</p>
    </div>

    <form action="acknowledgement.php" method="POST">

        <h3 class="section-title"> Personal Information</h3>

        <label>Full Name <span class="required">*</span></label>
        <input type="text" name="name"
               placeholder="Enter your full name"
               required>

        <label>Email Address <span class="required">*</span></label>
        <input type="email" name="email"
               placeholder="example@gmail.com"
               required>

        <label>Phone Number <span class="required">*</span></label>
        <input type="tel" name="phone"
               placeholder="Enter 10-digit phone number"
               pattern="[0-9]{10}"
               maxlength="10"
               required>

        <h3 class="section-title"> Course Selection</h3>

        <div class="course-info">
            <div class="course-card"> BCA</div>
            <div class="course-card"> B.Sc Computer Science</div>
            <div class="course-card"> B.Com</div>
            <div class="course-card"> BBA</div>
        </div>

        <label>Select Course <span class="required">*</span></label>

        <select name="course" required>
            <option value="">-- Choose Your Course --</option>
            <option value="BCA"> BCA</option>
            <option value="B.Sc Computer Science">
                 B.Sc Computer Science
            </option>
            <option value="B.Com"> B.Com</option>
            <option value="BBA"> BBA</option>
        </select>

        <h3 class="section-title"> Gender</h3>

        <div class="gender-box">

            <label>
                <input type="radio"
                       name="gender"
                       value="Male"
                       required>
                 Male
            </label>

            <label>
                <input type="radio"
                       name="gender"
                       value="Female">
                 Female
            </label>

            <label>
                <input type="radio"
                       name="gender"
                       value="Other">
                 Other
            </label>

        </div>

        <h3 class="section-title"> Contact Address</h3>

        <label>Address</label>

        <textarea name="address"
                  placeholder="Enter your complete address"></textarea>

        <button type="submit" class="submit-btn">
            Submit Application
        </button>

    </form>

    <div class="footer">
         2026 FuturePath Admissions | Your Future Starts Here 
    </div>

</div>

</body>
</html>
```
