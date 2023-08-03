<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
*{
    margin:0;
    padding:0;
    font-family: sans-serif;
}
.header{
    height:150px;
    width: 500px;
    background: url('images/login_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
.header img{
    position: absolute;
    top:30px;
    left:85px;
}
h1{
    padding:10px;
}
p {
    font-size: 20px;
    text-align: justify;
    line-height: 1.3;
    padding:10px;
}
button{
    color:#fff;
    height:50px;
    padding: 10px;
    cursor:pointer;
    margin-top: 10px;
    padding: 20px;
    background: #286090;
    border: none;
    border-radius: 50px;
}
</style>
    <div class="header">
        <img src="images/asf_logo.png" alt="">
    </div>
    <h1>EMAIL CONFIRMATION</h1>
    <p>Hi, Jotti</p>
    <p>We are happy you signed up for company NAME.<br>
    To Start exploring the company NAME and neighborhood,<br>
    please confirm your email address.
    </p>
    <a href='$url' target='_blank' data-saferedirecturl='$url' type="submit">Verify Account</a>
</body>
</html>