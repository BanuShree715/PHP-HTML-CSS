
<html>
<head>

<title>String Analysis System</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(135deg,#74ebd5,#ACB6E5);
    margin:0;
    padding:40px;
}

.container{
    width:450px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 20px gray;
}

h2{
    text-align:center;
    color:#4b0082;
}

h3{
    color:#4b0082;
}

input[type=text]{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #901919;
    border-radius:6px;
}

input[type=submit]{
    width:100%;
    padding:10px;
    background:#4b0082;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

input[type=submit]:hover{
    background:#6a0dad;
}

.result{
    margin-top:20px;
    background:#f3e5f5;
    padding:15px;
    border-radius:10px;
    line-height:1.8;
}

.box{
    background:#e0f7fa;
    padding:10px;
    margin-top:10px;
    border-radius:6px;
}

</style>

</head>

<body>

<div class="container">

<h2> String Analysis System</h2>

<form method="post">

<label>Enter a Text:</label>

<input
type="text"
name="title"
placeholder="Enter your text"
required
>

<input
type="submit"
value="Analyze"
>

</form>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

$title=$_POST["title"];

$vowels=0;
$consonants=0;
$digits=0;
$special=0;

$length=strlen($title);

for($i=0;$i<$length;$i++){

$ch=$title[$i];

if(ctype_alpha($ch)){

if(strpos("AEIOUaeiou",$ch)!==false)

$vowels++;

else

$consonants++;

}

elseif(ctype_digit($ch)){

$digits++;

}

elseif(!ctype_space($ch)){

$special++;

}

}

$words=str_word_count($title);

$reverse=strrev($title);

?>

<div class="result">

<h3> Analysis Result</h3>

<div class="box">
<b>Entered Text:</b>
<?php echo htmlspecialchars($title); ?>
</div>

<div class="box">
<b>Number of Words:</b>
<?php echo $words; ?>
</div>

<div class="box">
<b>Number of Characters:</b>
<?php echo $length; ?>
</div>

<div class="box">
<b>Number of Vowels:</b>
<?php echo $vowels; ?>
</div>

<div class="box">
<b>Number of Consonants:</b>
<?php echo $consonants; ?>
</div>

<div class="box">
<b>Number of Digits:</b>
<?php echo $digits; ?>
</div>

<div class="box">
<b>Special Characters:</b>
<?php echo $special; ?>
</div>

<div class="box">
<b>Reverse Text:</b>
<?php echo htmlspecialchars($reverse); ?>
</div>

</div>

<?php
}
?>

</div>

</body>
</html>