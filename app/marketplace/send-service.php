<?php 
include($_SERVER['DOCUMENT_ROOT']."/classes/DB.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth__loggedd.php");
if(isset($_POST['recoveryaccount'])) {
    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $email = "kleshersecond@gmail.com";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $namedev = $_POST['namedev'];

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "noreply@catbox-gr.ru";
    $to = $email;
    $subject = "Заявка CBXMarketplace";
    $message = "Имя: $fname<br>Фамилия: $lname<br>Имя разработчика: $namedev<br>Исходный код проекта: $link";
    $headers = 'From: noreply@catbox-gr.ru' . "\r\n" .
               'Reply-To: noreply@catbox-gr.ru' . "\r\n" .
               'MIME-Version: 1.0' . "\r\n" .
               'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($to,$subject,$message, $headers);
    echo '<br>
    <div class="main">
        <div class="alert alert-successnew" role="alert">
           Спасибо, мы приняли вашу заявку и она сейчас на рассмотрении.
          </div>
        </div>';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | Авторизация</title>
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <link rel="stylesheet" href="/static/fonts/avenir/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background-image: url(/static/images/login__header__background.jpg);
            background-position: top;
            background-size: cover;
            font-family: SF UI Text;
        }
        
        .input__slider {
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
        }
        
        a,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            color: aliceblue;
            font-family: SF UI Text;
            text-decoration: none;
        }
        
        .login__header {
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 500;
        }
        
        .alert-dangernew {
            background-color: rgb(83, 0, 18);
            border-color: rgb(255, 0, 64);
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 300;
            border-radius: 15px;
        }
        
        .alert-successnew {
            background-color: rgb(0, 112, 60);
            border-color: rgb(0, 196, 137);
            font-family: Avenir Next Cyr;
            color: rgb(191, 255, 247);
            font-weight: 300;
            border-radius: 15px;
        }
        
        .content {
            background-image: url(/static/images/login__background.jpg);
            background-position: top;
            background-size: cover;
        }
        
        .btn-login {
            background-color: #372d47;
            border-radius: 10px;
            color: #fff;
            font-family: Avenir Next Cyr;
            color: aliceblue;
            font-weight: 500;
        }
        
        .btn-login:hover,
        .btn-login:active {
            background-color: #59667e;
            color: #fff;
        }
        
        @media screen and (min-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                margin-right: 100px;
                margin-left: 100px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 50px;
                margin-left: 50px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 30px;
                transition: 0.3s;
            }
        }
        
        @media screen and (min-width: 1250px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
                transition: 0.3s;
            }
            .main {
                margin-right: 225px;
                margin-left: 225px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 150px;
                margin-left: 150px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 35px;
                transition: 0.3s;
            }
        }
        
        @media screen and (max-width: 768px) {
            .content {
                border-radius: 5px;
                border: 1px solid aliceblue;
            }
            .main {
                margin-right: 25px;
                margin-left: 25px;
                transition: 0.3s;
            }
            .inputs__group {
                margin-right: 35px;
                margin-left: 35px;
                transition: 0.3s;
            }
            .login__header {
                font-size: 25px;
                transition: 0.3s;
            }
        }
        
        .alertlog {
            width: 920px;
            height: 100px;
            border-radius: 10px;
        }
        
        @media (min-width: 801px) {
            .alertlog {
                width: 920px;
                height: 100px;
                border-radius: 10px;
            }
        }
        
        @media (max-width: 1024px) {
            .alertlog {
                width: 600px;
                height: 100px;
                border-radius: 10px;
            }
        }
    </style>
</head>

<body>
        <div class="main">
        <br><br><br>
        <p class="login__header"><b>Подача заявки в CBXMarketplace</b></p>
        <br>
        <div class="content">
            <br><br>
            <form action="send-service" method="post">
                <div class="inputs__group">
                    <p class="input__slider">Имя</p>
                    <div class="input-group mb-3">
                        <input name="fname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <p class="input__slider">Фамилия</p>
                    <div class="input-group mb-3">
                        <input name="lname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <p class="input__slider">Имя разработчика(это может быть название компании)</p>
                    <div class="input-group mb-3">
                        <input name="namedev" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <p class="input__slider">Ссылка на исходный код сервиса</p>
                    <div class="input-group mb-3">
                        <input name="link" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                    <label style="color: aliceblue;" class="form-check-label" for="flexCheckChecked">
                        Я прочитал <a style="color:rgb(191, 255, 247);" href="terms">правила</a>
                    </label>
                    </div>
                    <br><br>
                    <div class="d-grid gap-2">
                        <button name="recoveryaccount" class="btn btn-login" type="submit">Отправить заявку</button>
                    </div>
                    <br><br>
                </div>
            </form>
        </div>
        <br><br>
    </div>
</body>

</html>