<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class helperEmail{

        public function sendEmail($email){
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);
            #HOLA DIEGO
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
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
                $mail->Body    = "
                <html >
                <head>
                
                    <style>
                        * {
                            box-sizing: border-box;
                            padding: 0;
                            background-color: white;
                            font-family: sans-serif;
                        }
                
                
                        .titulo {
                
                            width: 500px;
                            text-align: center;
                            padding-top: 20px;
                            padding-bottom: 20px;
                            background-color: #4618AC;
                            font-size: x-large;
                            color: white;
                            font-weight: bold;
                
                        }
                
                        .mesaje1 {
                            margin-top: 60px;
                            font-size: 30px;
                            color: black;
                        }
                
                        .mensaje2 {
                            margin-top: 60px;
                            font-size: 30px;
                            color: black;
            
                        }
                
                        .mensaje3 {
                            margin-top: 50px;
                            font-size: 30px;
                            color: black;
                        }
                
                        button {
                            border: 0;
                            color: aliceblue;
                            padding: 10px 30px;
                            border-radius: 10px;
                            background: rgb(2, 0, 36);
                            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(131, 64, 190, 0.927608543417367) 65%, rgba(0, 212, 255, 1) 100%);
                            margin-top: 30px;
                        }
                
                        .mesaje_para_elguia {
                
                            width: 500px;
                
                        }
                
                        .direcciones_caja_todo {
                
                
                            width: 500px;
                            height: 200px;
                        }
                
                        .caja_correos {
                
                            padding: 10px;
                            width: 250px;
                            float: left;
                            margin-top: 95px;
                            font-weight: bold
                
                        }
                
                        .iconos {
                
                            padding: 5px;
                            width: 100px;
                            float: left;
                            margin-top: 130px;
                            margin-inline-start: 150px;
                        }
                
                        .icono_facebook {
                            float: left;
                            margin-left: 5px;
                        }
                
                        .icono_stam {
                            float: left;
                            margin-left: 5px;
                        }
                
                        .icono_tw {
                            float: left;
                            margin-left: 5px;
                        }
                    </style>
                </head>
                
                <body>
                    <div class='mesaje_para_elguia'>
                
                
                        <div class='titulo'>
                            Guias a la mano
                
                        </div>
                
                        <p class='mesaje1'>
                            Hola Juan &#128521;
                        </p>
                
                        <p class='mensaje2'>
                
                            &#128075; Desde Guias a la mano te infromamos que
                            estas siendo solicitado para hacer de guia
                            hacia el destino '' &#129321;.
                        </p>
                
                        <p class='mensaje3'>
                
                            &#128079; felicitaciones &#128079; estas haciendo un gran
                            trabajo, da todo de ti &#128526;.
                        </p>
                
                        <button>
                            Ir al usuario
                        </button>
                
                        <div class='direcciones_caja_todo'>
                
                            <div class='caja_correos'>
                
                                <p class='mejasewww'>
                                    www.Guiasalamano.com
                                </p>
                                <p class='mejase_gmail'>
                                    Guiasalamano@gmail.com
                                </p>
                            </div>
                            <div class='iconos'>
                            
                              <img width='100px' height='50px'  src='https://static.vecteezy.com/system/resources/previews/002/557/417/large_2x/facebook-whatsapp-instagram-app-icons-and-logos-free-vector.jpg' alt=''>
                
                                
                            </div>
                
                        </div>
            
                    </div>
                </body>
                
                </html>
                ";
                
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        
    }

?>