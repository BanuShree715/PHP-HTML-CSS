
<html>
<head>

<title>EduTrack - Student Result System</title>

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#6c5ce7,#0984e3,#00cec9);
    min-height:100vh;
}

/* Header */

.header{
    text-align:center;
    color:white;
    padding:25px 10px;
}

.header .logo{
    font-size:50px;
}

.header h1{
    margin:5px;
    font-size:32px;
}

.header p{
    margin:8px;
}

/* Form Card */

.container{
    width:480px;
    max-width:92%;
    margin:10px auto 30px;
    background:white;
    padding:30px;
    border-radius:22px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

/* Title */

.title{
    text-align:center;
    color:#2d3436;
    margin-bottom:25px;
}

.title h2{
    margin:8px 0;
    color:#6c5ce7;
}

/* Input */

.input-box{
    margin-bottom:15px;
}

label{
    display:block;
    font-weight:bold;
    color:#2d3436;
    margin-bottom:6px;
}

input{
    width:100%;
    padding:12px;
    border:2px solid #dfe6e9;
    border-radius:10px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#6c5ce7;
    box-shadow:0 0 8px rgba(108,92,231,0.25);
}

/* Marks */

.marks-title{
    color:#636e72;
    margin:20px 0 12px;
    border-bottom:2px solid #eee;
    padding-bottom:8px;
}

.mark-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

/* Button */

.submit-btn{
    width:100%;
    padding:15px;
    margin-top:10px;
    border:none;
    border-radius:12px;
    background:linear-gradient(90deg,#6c5ce7,#0984e3);
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.submit-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 8px 18px rgba(0,0,0,0.2);
}

/* Features */

.features{
    display:flex;
    justify-content:space-around;
    margin-top:25px;
    text-align:center;
}

.feature{
    color:#636e72;
    font-size:13px;
}

.feature b{
    display:block;
    font-size:23px;
    margin-bottom:5px;
}

.footer{
    text-align:center;
    color:white;
    padding:15px;
    font-size:13px;
}

/* Mobile */

@media(max-width:500px){

    .mark-row{
        grid-template-columns:1fr;
    }

    .header h1{
        font-size:25px;
    }

}

</style>

</head>

<body>

<div class="header">

    <div class="logo"></div>

    <h1>EduTrack</h1>

    <p>Smart Student Result Processing System</p>

</div>

<div class="container">

    <div class="title">

        <div style="font-size:40px;"></div>

        <h2>Enter Student Details</h2>

        <p>Enter marks to generate the result</p>

    </div>

    <form action="result.php" method="POST">

        <div class="input-box">

            <label> Student Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter student name"
                required>

        </div>

        <h3 class="marks-title">
             Subject Marks
        </h3>

        <div class="mark-row">

            <div class="input-box">

                <label> Subject 1</label>

                <input
                    type="number"
                    name="m1"
                    min="0"
                    max="100"
                    placeholder="0 - 100"
                    required>

            </div>

            <div class="input-box">

                <label> Subject 2</label>

                <input
                    type="number"
                    name="m2"
                    min="0"
                    max="100"
                    placeholder="0 - 100"
                    required>

            </div>

            <div class="input-box">

                <label> Subject 3</label>

                <input
                    type="number"
                    name="m3"
                    min="0"
                    max="100"
                    placeholder="0 - 100"
                    required>

            </div>

            <div class="input-box">

                <label> Subject 4</label>

                <input
                    type="number"
                    name="m4"
                    min="0"
                    max="100"
                    placeholder="0 - 100"
                    required>

            </div>

            <div class="input-box">

                <label> Subject 5</label>

                <input
                    type="number"
                    name="m5"
                    min="0"
                    max="100"
                    placeholder="0 - 100"
                    required>

            </div>

        </div>

        <button
            type="submit"
            class="submit-btn">

             Generate Student Result

        </button>

    </form>

    <div class="features">

        <div class="feature">
            <b></b>
            Calculate
        </div>

        <div class="feature">
            <b></b>
            Grade
        </div>

        <div class="feature">
            <b></b>
            Result
        </div>

    </div>

</div>

<div class="footer">

    © 2026 EduTrack | Learn • Achieve • Succeed 

</div>

</body>
</html>

