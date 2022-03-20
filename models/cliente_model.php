<?php

use function PHPSTORM_META\type;

class cliente_model
{
    private $db;
    private $clientes;
    private $procedencia;
    private $clientes2;
    public function __construct()
    {
        $this->db = connect::connection();
        $this->clientes = array();
        $this->procedencia = array();
        $this->tipoDocumento = array();
    }

    public function getinfoProcedencia()
    {

        $sql = "SELECT id,nombre FROM procedencia";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->procedencia[] = $row;
        }
        return $this->procedencia;
    }

    public function getinfotipodocumento()
    {

        $sql = "SELECT id,nombre FROM tipodocumento";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->tipoDocumento[] = $row;
        }
        return $this->tipoDocumento;
    }

    private function createCredencials($user, $password)
    {
        $passwordCryp = password_hash($password,PASSWORD_DEFAULT,['cost'=>10]);
        $sql = "INSERT INTO `guiasalamano`.`credenciales` (`user`, `password`,`Rol_id`) VALUES ('$user', '$passwordCryp',1);";

        $res = $this->db->query($sql);

        if ($res === false) {
            echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
        }


        return $res;
    }
    private function existeUsuario($user)
    {
        $sql = "SELECT `user` FROM credenciales WHERE `user` = '$user'; ";
        $result = $this->db->query($sql);
        if (empty($result) || mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    private function existeCedula($cedula)
    {
        $sql = "SELECT `nombres` FROM cliente WHERE `documento` = '$cedula'; ";
        $result = $this->db->query($sql);
        if (empty($result) || mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }
    private function existeCorreo($correo)
    {
        $sql = "SELECT `nombres` FROM cliente WHERE `email` = '$correo'; ";
        $result = $this->db->query($sql);
        if (empty($result)  || mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    public function registrar_cliente($nombres, $apellidos, $documento, $celular, $edad, $email, $procedencia_id, $tipodocumento_id, $user, $password)
    {

        if ($this->existeCedula($documento) === false) {

            if ($this->existeCorreo($email) === false) {

                if ($this->existeUsuario($user) === false) {

                    if ($this->createCredencials($user, $password)) {
                        $credencialid = $this->db->insert_id;
                        $sql = "INSERT INTO cliente (`nombres`, `apellidos`, `documento`, `celular`, `edad`, `email`, `estado`, `procedencia_id`, `tipodocumento_id`, `credenciales_id`,`foto`)
                            VALUES ('$nombres', '$apellidos', '$documento', '$celular', '$edad', '$email', 'activo', '$procedencia_id', '$tipodocumento_id', '$credencialid','./recursos_img_usuarios/avatarhombre.jpg');";

                        $res = $this->db->query($sql);

                        if ($res === false) {
                            echo "<br> <p class='text-white'> SQL Error en registrar: " . $this->db->error . "</p>";
                        }
                        return "creado";
                    }
                } else {
                    return "existe usuario";
                }
            } else {
                return "existe correo";
            }
        } else {
            return "existe cedula";
        }
    }

    public function getInfoCliente($id)
    {

        $sql = "
            SELECT cliente.nombres,cliente.apellidos,cliente.documento,cliente.celular,cliente.edad,cliente.email,
            procedencia.nombre as procedencia ,tipodocumento.nombre as tipo_documento,credenciales.user,credenciales.password
            FROM cliente,procedencia,tipodocumento,credenciales WHERE credenciales.id = cliente.credenciales_id AND
                                                                      cliente.procedencia_id = procedencia.id AND
                                                                      cliente.tipodocumento_id = tipodocumento.id AND
                                                                      cliente.id ='$id';
            ";


        $res = $this->db->query($sql);

        if ($res === false) {
            echo "<br> <p class='text-white'> SQL Error en registrar: " . $this->db->error . "</p>";
        }

        while ($row = $res->fetch_assoc()) {
            $this->clientes[] = $row;
        }

        return $this->clientes;
    }

    public function updateInformation($nombres, $apellidos, $celular, $edad, $email, $password, $documento, $id)
    {
        $sql = "UPDATE `cliente` SET `nombres` = '$nombres',`apellidos` = '$apellidos',`celular` = '$celular',`edad` = '$edad',`email` = '$email' WHERE (`id` = '$id');";
        $res = $this->db->query($sql);

        if ($res === false) {
            echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
            return false;
        }

        $sql2 = "UPDATE `credenciales` SET  `password` = '$password' WHERE (`id` = '$documento'); ";
        $res2 = $this->db->query($sql2);

        if ($res2 === false) {
            echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
            return false;
        }

        return true;
    }


    public function getInfoClienteSession($id)
    {
        $sql = "SELECT `nombres`,`id`,`apellidos`,`documento`,`foto` FROM `cliente` WHERE `credenciales_id` = '$id';";
        $res = $this->db->query($sql);
        while ($row = $res->fetch_assoc()) {
            $this->clientes2[] = $row;
        }
        return $this->clientes2;
    }

    public function UpdatePhoto($ruta, $id)
    {
        $sql = "UPDATE `cliente` SET `foto` = '$ruta' WHERE `id` = '$id';";
        $res = $this->db->query($sql);
        if ($res === false) {
            echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
            return false;
        }
        return true;
    }
}
