<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class helperEmail{

        public function sendEmail($email){
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);

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
                        }
                
                        .mensaje2 {
                            margin-top: 60px;
                            font-size: 30px;
                        }
                
                        .mensaje3 {
                            margin-top: 50px;
                            font-size: 30px;
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
                            Hola Juan.🌎
                        </p>
                
                        <p class='mensaje2'>
                
                            Desde Guias a la mano te infromamos que
                            estas siendo solicitado para hacer de guia
                            hacia el destino '' 🤠
                        </p>
                
                        <p class='mensaje3'>
                
                            ✨felicitaciones✨ estas haciendo un gran
                            trabajo, da todo de ti 😎.
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
                                <p class='icono_facebook'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                        <path
                                            d='M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z' />
                                    </svg>
                                </p>
                
                                <p class='icono_stam'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                        <path
                                            d='M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z' />
                                    </svg>
                                </p>
                
                                <p class='icono_tw'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                        <path
                                            d='M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z' />
                                    </svg>
                                </p>
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