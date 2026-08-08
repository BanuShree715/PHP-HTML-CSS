```php
<html>
<head>
    <title>Student Profile Registration</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 850px;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .header {
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: white;
            text-align: center;
            padding: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .header p {
            margin-top: 8px;
        }

        .form-area {
            padding: 35px;
        }

        .row {
            display: flex;
            gap: 25px;
            margin-bottom: 20px;
        }

        .field {
            flex: 1;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px;
            border: 2px solid #ddd;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106,17,203,0.25);
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .gender {
            display: flex;
            gap: 20px;
            padding-top: 10px;
        }

        .gender label {
            font-weight: normal;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding-top: 8px;
        }

        .skills label {
            font-weight: normal;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37,117,252,0.4);
        }

        .section-title {
            color: #6a11cb;
            border-left: 5px solid #dd2476;
            padding-left: 10px;
            margin: 25px 0 20px;
        }

        @media(max-width: 700px) {
            .row {
                flex-direction: column;
                gap: 15px;
            }

            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🎓 Student Profile</h1>
        <p>Create Your Smart Student Identity</p>
    </div>

    <div class="form-area">

        <form action="display.php" method="POST">

            <h2 class="section-title"> Personal Information</h2>

            <div class="row">

                <div class="field">
                    <label>Student Name</label>
                    <input type="text"
                           name="name"
                           placeholder="Enter your full name"
                           required>
                </div>

                <div class="field">
                    <label>Roll Number</label>
                    <input type="text"
                           name="roll"
                           placeholder="Example: CS101"
                           required>
                </div>

            </div>

            <div class="row">

                <div class="field">
                    <label>Date of Birth</label>
                    <input type="date"
                           name="dob"
                           required>
                </div>

                <div class="field">
                    <label>Gender</label>

                    <div class="gender">
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
                </div>

            </div>


            <h2 class="section-title"> Academic Information</h2>

            <div class="row">

                <div class="field">
                    <label>Department</label>

                    <select name="department" required>
                        <option value="">-- Select Department --</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Computer Applications">Computer Applications</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Physics">Physics</option>
                    </select>
                </div>

                <div class="field">
                    <label>Year of Study</label>

                    <select name="year" required>
                        <option value="">-- Select Year --</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                    </select>
                </div>

            </div>

            <div class="field">
                <label>Skills</label>

                <div class="skills">

                    <label>
                        <input type="checkbox"
                               name="skills[]"
                               value="HTML">
                        HTML
                    </label>

                    <label>
                        <input type="checkbox"
                               name="skills[]"
                               value="CSS">
                        CSS
                    </label>

                    <label>
                        <input type="checkbox"
                               name="skills[]"
                               value="JavaScript">
                        JavaScript
                    </label>

                    <label>
                        <input type="checkbox"
                               name="skills[]"
                               value="PHP">
                        PHP
                    </label>

                    <label>
                        <input type="checkbox"
                               name="skills[]"
                               value="Python">
                        Python
                    </label>

                </div>
            </div>


            <h2 class="section-title"> Contact Information</h2>

            <div class="row">

                <div class="field">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           placeholder="example@gmail.com"
                           required>
                </div>

                <div class="field">
                    <label>Phone Number</label>

                    <input type="tel"
                           name="phone"
                           placeholder="10 digit mobile number"
                           pattern="[0-9]{10}"
                           maxlength="10"
                           required>
                </div>

            </div>

            <div class="field">

                <label>Address</label>

                <textarea name="address"
                          placeholder="Enter your address"
                          required></textarea>

            </div>


            <button type="submit" class="submit-btn">
                Submit Student Profile
            </button>

        </form>

    </div>

</div>

</body>
</html>
```

