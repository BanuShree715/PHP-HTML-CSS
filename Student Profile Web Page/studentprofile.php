
<html>

<head>

    <title>Student Profile</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            padding: 30px;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px gray;
        }

        .header {
            background: linear-gradient(90deg, #1565c0, #7b1fa2);
            color: white;
            text-align: center;
            padding: 25px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 10px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .profile {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 25px;
        }

        .section {
            flex: 1;
            min-width: 250px;
            background: #f5f9ff;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #1565c0;
        }

        .section:hover {
            box-shadow: 0 3px 10px #ccc;
        }

        h2 {
            color: #1565c0;
            margin-bottom: 12px;
        }

        p {
            margin: 9px 0;
            line-height: 1.5;
        }

        .skills span {
            display: inline-block;
            background: #1565c0;
            color: white;
            padding: 6px 10px;
            margin: 4px;
            border-radius: 15px;
            font-size: 13px;
        }

        .footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 15px;
        }

        @media(max-width:600px) {

            body {
                padding: 15px;
            }

            .profile {
                flex-direction: column;
            }

            .section {
                width: 100%;
            }

            .header h1 {
                font-size: 25px;
            }
        }

    </style>

</head>

<body>

<div class="container">


   

    <div class="header">

        <img
            src="student.jpg"
            class="profile-img"
            alt="Student Photo"
        >

        <h1> Student Profile</h1>

        <p>Academic & Personal Information</p>

    </div>


    

    <div class="profile">


      

        <div class="section">

            <h2> Personal Details</h2>

            <p><b>Name:</b> Banu Shree</p>

            <p><b>Date of Birth:</b> 15-05-2005</p>

            <p><b>Gender:</b> Female</p>

            <p><b>Address:</b> Tamil Nadu, India</p>

        </div>


        

        <div class="section">

            <h2> Academic Details</h2>

            <p>
                <b>Course:</b>
                B.Sc Computer Science
            </p>

            <p>
                <b>College:</b>
                ABC College
            </p>

            <p>
                <b>Year:</b>
                Final Year
            </p>

            <p>
                <b>CGPA:</b>
                8.5
            </p>

        </div>


        <div class="section">

            <h2>Contact Information</h2>

            <p>
                <b>Email:</b>
                student@gmail.com
            </p>

            <p>
                <b>Phone:</b>
                +91 9876543210
            </p>

            <p>
                <b>Location:</b>
                Tamil Nadu
            </p>

        </div>



        <div class="section">

            <h2>💻 Skills</h2>

            <div class="skills">

                <span>HTML</span>

                <span>CSS</span>

                <span>PHP</span>

                <span>Python</span>

                <span>SQL</span>

            </div>

        </div>


      

        <div class="section">

            <h2> Hobbies</h2>

            <p> Reading</p>

            <p> Coding</p>

            <p> Designing</p>

            <p> Cooking</p>

        </div>


       

        <div class="section">

            <h2> Achievements</h2>

            <p> Completed Web Development Course</p>

            <p> Participated in College Hackathon</p>

            <p> Completed Mini Project</p>

        </div>


    </div>


    <!-- FOOTER -->

    <div class="footer">

        © 2026 | Student Profile

    </div>

</div>

</body>

</html>
```
