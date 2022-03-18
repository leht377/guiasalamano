<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class helperEmail{

        public function sendEmail($email){
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 1;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'guiasalamano377@gmail.com';                     //SMTP username
                $mail->Password   = '12345678fjtt';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('guiasalamano377@gmail.com', 'Guiasalamano');
                $mail->addAddress($email, 'Joe User');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Solicitud';
                $mail->Body    = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
        }

        .caja_del_todo {
            background-color: blue;
            width: 100%;
            height: 100vh;


            background: url("https://www.xtrafondos.com/wallpapers/atardecer-morado-en-la-playa-1414.jpg");
            background-repeat: no-repeat;
            background-size: cover;

            display: flex;
            justify-content: space-around;
            align-items: center;

        }

        .caja_del-mensaje {

            width: 190px;
            color: aliceblue;
            font-size: 1.5rem;

        }

        .caja_logop {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;


        }

        .caja_logoh {
            border-radius: 50%;
            width: 300px;
            height: 300px;
            background-color: #4618AC;
            margin-bottom: 100px;
            font-size: 15rem;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .caja_img_guia {

            width: 200px;
            height: 200px;

            background: url("https://i.pinimg.com/originals/00/46/c4/0046c4f1a55d18faa30b3b083084bb77.jpg");
            background-repeat: no-repeat;
            background-size: cover;


        }

        button {
            border: 0;
            color: aliceblue;
            padding: 10px 30px;
            border-radius: 10px;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(131, 64, 190, 0.927608543417367) 65%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <main class="caja_del_todo ">

        <div class="caja_del-mensaje">
            Hola "Nombre del guia ", el dia de hoy has sido solicitado por el usuario "tal" para el destino de "" con
            inicio de contratacion de "" y terminacion de "".
        </div>

        <main class="caja_logop">

            <div class="caja_logoh">
                G
            </div>

            <button>
                Ir al usuario
            </button>

        </main>

        <div class="caja_img_guia">

        </div>


    </main>
</body>

</html>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        
    }

?>