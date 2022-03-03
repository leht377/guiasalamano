<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class clienteDashboardController
{
    private $sitioFamosos;
    
    


    public function __construct()
    {
        require_once("./models/categorias_model.php");
        require_once("./models/sitios_model.php");
        require_once("./models/guia_model.php");
        require_once("./models/cliente_model.php");
        require_once("./models/contrato_model.php");
        
        $this->sitioFamosos = array();
    }

    public function index()
    {
        session_start();
        if ($_SESSION["user"] != null || $_SESSION["user"] != "") {
            $dataRank["sitios_famosos"] = $this->getSitiosFamosos();

            require_once("./view/clienteDashboard.php");
        } else {

            require_once("./view/noAutenticado.php");
            die();
        }
    }

    public function getSitiosFamosos()
    {
        $modelSitios = new sitios_model();
        $this->sitioFamosos = $modelSitios->sitiosFamosos();
        return $this->sitioFamosos;
    }

    public function viewCategorias()
    {
        session_start();
        if ($_SESSION["user"] != null || $_SESSION["user"] != "") {
            $modelCategoria = new categorias_model();
            $dataCategorias = $modelCategoria->getCategorias();
            $dataJson = json_encode($dataCategorias);
            echo $dataJson;
        } else {
            require_once("./view/noAutenticado.php");
            die();
        }
    }

    public function viewSitios($id)
    {
        $modelSitios = new sitios_model();
        $datasitios = $modelSitios->getSitiosbyCategoria($id);
        $dataJson = json_encode($datasitios);
        echo $dataJson;
        // $data[ "viewRequerida"]= "./view/component/sectionsitios.php";
        // require_once("./view/clienteDashboard.php");
    }

    public function viewguias($id)
    {
        $modelguia = new guia_model();
        $dataguias = $modelguia->getGuiasbySitios($id);
        $dataguiasjson = json_encode($dataguias);
        echo $dataguiasjson;
        // $data[ "viewRequerida"]= "./view/component/sectionGuias.php";
        // require_once("./view/clienteDashboard.php");
    }

    public function getInformationFormUser($id)
    {

        $cliente = new cliente_model();
        $dataCliente = $cliente->getInfoCliente($id);
        $dataClientejson = json_encode($dataCliente);
        echo $dataClientejson;
    }

    public function updateClientInformation($id)
    {
        $cliente = new cliente_model();

        $nombres = $_POST["nombres_cli"];
        $apellidos = $_POST["apellidos_cli"];
        $documento = (int) $_POST["cedula_cli"];
        $celular = $_POST["celular_cli"];
        $edad = $_POST["edad_cli"];
        $email = $_POST["email_cli"];
        $password = $_POST["password_cli"];
        session_start();
        $_SESSION['nombres'] = $nombres;
        $_SESSION['apellidos'] = $apellidos;

        $res = $cliente->updateInformation($nombres, $apellidos, $celular, $edad, $email, $password, $documento, $id);
        $res = json_encode($res);
        echo $res;
    }

    public function updatePhotoCliente()
    {
        $cliente = new cliente_model();
        $id = $_POST['id'];
        [$ruta, $stado, $msg] = $this->upload();
        echo $stado . '  ' . $ruta . ' ' . $id;
        if ($stado) {
            $res = $cliente->UpdatePhoto($id, $ruta);
        }
    }

    public function logout()
    {
        session_start();
        if (session_destroy()) {
            echo true;
        }
        echo false;
    }

    private function upload()
    {

        $directorio = "./recursos_img_usuarios/";

        $archivo = $directorio . basename($_FILES["file-1"]["name"]);

        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        // valida que es imagen
        $checarSiImagen = getimagesize($_FILES["file-1"]["tmp_name"]);


        //var_dump($size);

        if ($checarSiImagen != false) {

            //validando tamaño del archivo
            $size = $_FILES["file-1"]["size"];

            if ($size > 500000) {
                echo "El archivo tiene que ser menor a 500kb";
            } else {

                //validar tipo de imagen
                if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg") {
                    // se validó el archivo correctamente
                    if (move_uploaded_file($_FILES["file-1"]["tmp_name"], $archivo)) {
                        return [$archivo, true, "Se subio correctamente"];
                    } else {
                        return ["", false, "Hubo un error en la subida del archivo"];
                    }
                } else {
                    return ["", false, "Solo se admiten archivos jpg/jpeg"];
                }
            }
        } else {
            return ["", false, "El documento no es una image"];
        }
    }


    public function getinformacionContratacionguia(){
        $id_guia = $_POST['id_guia'];
        $id_sitio = $_POST['id_sitio'];
       
        $guia = new guia_model();
        $dataguia = $guia->getGuiabyid($id_guia);

        $sitio = new sitios_model();
        $datasitio = $sitio->getSitiosbyId($id_sitio);

        $dataContratacion = array_merge($dataguia,$datasitio);

        echo json_encode($dataContratacion) ;

    }
    private function mailer($email){
        require_once( './PHPMailer/Exception.php');
        require_once('./PHPMailer/PHPMailer.php');
        require_once( './PHPMailer/SMTP.php');
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
            $mail->Subject = 'PRUEBA';
            $mail->Body    = 'HOLA DIEGO PUTO !</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function solcitarguia(){
        session_start();
        $hora_solicitud = $_POST["hora_solicitud"];
        $fecha_solicitud =$_POST["fecha_solicitud"];
        $id_guia = $_POST["id_guia"];
        $id_sitio = $_POST["id_sitio"];
        $id_cliente = $_SESSION["id"];

        $contrato = new contrato_model();
        $res = $contrato->crearContrato($id_cliente,$id_sitio, $id_guia,$fecha_solicitud,$hora_solicitud);
        if($res ==1){
        //    $this-> mailer("bhgespinel@gmail.com");
        }
        echo $res;
    }
}
