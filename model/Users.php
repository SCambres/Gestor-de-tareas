<?php

class Users {
    public $IdUser;

    public $Name;

    public $Email;
    public $Password;

    public $Type;

    public $Image;

    public $allUsers;
    public $infUser;


    //METODO CONSTRUCTOR PARA CREAR UNN OBJETO DE LA CLASE USERS
    public function __construct(){

    }

    public function login (){
        global $conexion;

        $query = "SELECT * FROM `Users` WHERE `Email` = '{$this->Email}'
                                                    AND `Password` = '{$this->Password}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo $conexion->error;
            return false;
        } else {
            if ($resultado->num_rows==1){
                $usuario = mysqli_fetch_assoc($resultado);

                $_SESSION['IdUser'] = $usuario['IdUser'];
                $_SESSION['Email'] = $usuario['Email'];
                $_SESSION['Password'] = $usuario['Password'];
                $_SESSION['Name'] = $usuario['Name'];
                $_SESSION['Type'] = $usuario['Type'];
                $_SESSION['Image'] = $usuario['Image'];

                return true;

            } else{

                return false;
            }
        }
    }

    //METODO PARA CARGAR UN USUARIO FILTRADO POR SU ID
    public function load (){
        global $conexion;

        $query = "SELECT * FROM `Users` WHERE `IdUser`='{$this->IdUser}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else{
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc())
                    foreach ($row as $key => $value){
                        $nombre_columna = str_replace("-", "_", $key);
                        $this->{"set$nombre_columna"}($value);
                    }
                    return true;
            }
            else{
                return false;
            }
        }

    }

    //METODO PARA CARGAR TODOS LOS USUARIOS DE LA TABLA USERS
    public function load_all () {
        global $conexion;

        $query = "SELECT * FROM `Users`";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){

                    $this->allUsers[] = array(
                        "IdUser" => $row["IdUser"],
                        "Name" => $row["Name"],
                        "Email" => $row["Email"],
                        "Password" => $row["Password"],
                        "Type" => $row["Type"],
                        "Image" => $row["Image"],
                    );
                }
                return true;

            }
            else {
                return false;
            }
        }
    }

    public function loadInfoUser (){
        global $conexion;

        $query = "SELECT * FROM `Users` WHERE `IdUser` = '{$this->IdUser}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc())
                    $this->infUser[] = array(
                        "IdUser" => $row["IdUser"],
                        "Name" => $row["Name"],
                        "Email" => $row["Email"],
                        "Password" => $row["Password"],
                        "Type" => $row["Type"],
                        "Image" => $row["Image"],
                    );

                return true;
            }
            else{
                return false;
            }
        }
    }

    //METODO PARA INSERTAR UN NUEVO USUARIO EN LA TABLA USERS
    public function create () {
        global $conexion;

        $query = "INSERT INTO `Users` (`Name`, `Email`, `Password`, `Image`)
                                VALUES ('".$conexion->real_escape_string($this->getName())."',
                                        '".$conexion->real_escape_string($this->getEmail())."',
                                        '".$conexion->real_escape_string($this->getPassword())."',
                                        '".$conexion->real_escape_string($this->getImage())."');";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            $this->setIdUser($conexion->insert_id);
            self::load();
            return true;
        }

    }

    //METODO PARA ACTUALIZAR LOS DATOS DE UN USUARIO SELECCIONADO POR SU ID DE LA TABLA USERS
    public function save () {
        global $conexion;

        $query = "UPDATE `Users` SET 
                  `Name` = '". $conexion->real_escape_string($this->getName())."',
                  `Email` = '".$conexion->real_escape_string($this->getEmail())."',
                  `Password` = '".$conexion->real_escape_string($this->getPassword())."',
                  `Type` = '".$conexion->real_escape_string($this->getType())."',
                  `Image` = '".$conexion->real_escape_string($this->getImage())."'
                  WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA ACTUALIZAR EL NOMBRE DEL USER POR SU ID
    public function saveName () {
        global $conexion;

        $query = "UPDATE `Users` SET 
                  `Name` = '". $conexion->real_escape_string($this->getName())."'
                  WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA ACTUALIZAR EL PASSWORD DEL USER POR SU ID
    public function savePassword () {
        global $conexion;

        $query = "UPDATE `Users` SET 
                  `Password` = '". $conexion->real_escape_string($this->getPassword())."'
                  WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA ACTUALIZAR EL EMAIL DEL USER POR SU ID
    public function saveEmail () {
        global $conexion;

        $query = "UPDATE `Users` SET 
                  `Email` = '". $conexion->real_escape_string($this->getEmail())."'
                  WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA ACTUALIZAR LA IMAGEN DEL USER POR SU ID
    public function saveImage () {
        global $conexion;

        $query = "UPDATE `Users` SET 
                  `Image` = '". $conexion->real_escape_string($this->getImage())."'
                  WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA BORRAR UN USUARIO SELECCIONADO POR SU ID DE LA TABLA USERS
    public function delete () {
        global $conexion;

        $query = "DELETE FROM `Users` WHERE `IdUser` = '{$this->getIdUser()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //METODO PARA COMPROBAR SI YA EXISTE UN USUARIO SEGUN SU EMAIL
    public function existsEmail ($Email) {
        global $conexion;

        $query = "SELECT Email FROM `Users` WHERE `Email` = '$Email'";

        $resultado = $conexion->query($query);

        if (!$conexion->error) {
            if ($resultado->num_rows > 0) {
                return true;
            }
        }
        return false;
    }

    //GETTERS Y SETTERS DE LOS ATRIBUTOS
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * @param mixed $IdUser
     */
    public function setIdUser($IdUser): void
    {
        $this->IdUser = $IdUser;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password): void
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $Image
     */
    public function setImage($Image): void
    {
        $this->Image = $Image;
    }





}