<?php

class Tarea {
    public $IdTarea;
    
    public $Name;
    public $Descripcion;
    public $fechaComienzo;
    public $fechaFinalizacion;
    public $Estado;
    public $ProyectoId;
    public $UserId;
    public $allTareas;
    public $InfTarea;
    public $tareaPendiente;
    public $tareaProceso;
    public $tareaCompletada;
//    public $allDetails;

    public function __construct(){

    }

    //METODO PARA CARGAR UN PRODUCTO FILTRADO POR SU ID
    public function load (){
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `IdTarea` = '{$this->IdTarea}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
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

    public function loadInfoTarea (){
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `IdTarea` = '{$this->IdTarea}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc())
                    $this->InfTarea[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],

                    );
                return true;
            }
            else{
                return false;
            }
        }
    }

    //INFORMACION COMPLETA DEL UN PRODUCTO, USUARIO Y ORDENEES
//    public function loadAllDetails(){
//        global $conexion;
//
//        $query = "SELECT p.Id, p.Name, p.Stock, p.Price, p.Image, ol.Quantity
//                            FROM Tarea p
//                            LEFT JOIN Order_lines ol
//                            ON ol.ProductId = p.Id
//                            WHERE p.Id = '{$this->Id}'";
//         var_dump($query);
//         exit;
//        $resultado = $conexion->query($query);
//
//        if ($conexion->error){
//            return false;
//        }
//        else {
//            if ($resultado->num_rows>0){
//                while ($row = $resultado->fetch_assoc())
//                    $this->allDetails[] = array(
//                        "Id" => $row["Id"],
//                        "Name" => $row["Name"],
//                        "Stock" => $row["Stock"],
//                        "Quantity" => $row["Quantity"],
//                        "Price" => $row["Price"],
//                        "Image" => $row["Image"],
//                    );
//
//                return true;
//            }
//            else{
//                return false;
//            }
//        }
//    }

    //METODO PARA CARGAR TODOS LOS PRODUCTOS DE LA TABLA PRODUCT
    public function load_all () {
        global $conexion;

        $query = "SELECT * FROM `Tarea`";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo "error de conexion";
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->allTareas[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],
                    );
                }
                return true;
            }
            else {
                return false;
            }
        }
    }

    //FUNCION PARA RECUPERAR LOS DATOS DE LA TAREAS CON ESTADO PENDIENTE
    public function load_pendientes () {
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `Estado` = 'Pendiente'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo "error de conexion";
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->tareaPendiente[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],
                    );
                }
                return true;
            }
            else {
                return false;
            }
        }
    }

    //CONSULTA QUE ME DEVUELVA LOS DATOS DE LA TAREA SEGUN EL PROYECTO AL QUE PERTENECE Y EL ESTADO DE LA TAREA
    public function loadTaskForProyectStatus () {
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `ProyectoId` = '{$this->ProyectoId}' and `Estado` = '{$this->Estado}'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo "error de conexion";
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->tareaProceso[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],
                    );
                }
                return true;
            }
            else {
                return false;
            }
        }
    }
    //FUNCION PARA RECUPERAR LOS DATOS DE LA TAREAS CON ESTADO PROCESO
    public function load_proceso () {
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `Estado` = 'Proceso'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo "error de conexion";
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->tareaProceso[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],
                    );
                }
                return true;
            }
            else {
                return false;
            }
        }
    }
    //FUNCION PARA RECUPERAR LOS DATOS DE LA TAREAS CON ESTADO COMPLETADA
    public function load_completada () {
        global $conexion;

        $query = "SELECT * FROM `Tarea` WHERE `Estado` = 'Completada'";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            echo "error de conexion";
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->tareaCompletada[] = array(
                        "IdTarea" => $row["IdTarea"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "FechaComienzo" => $row["FechaComienzo"],
                        "FechaFinalizacion" => $row["FechaFinalizacion"],
                        "Estado" => $row["Estado"],
                        "ProyectoId" => $row["ProyectoId"],
                        "UserId" => $row["UserId"],
                    );
                }
                return true;
            }
            else {
                return false;
            }
        }
    }

    //METODO PARA INSERTAR UN NUEVO PRODUCTO EN LA TABLA PRODUCT
    public function create () {
        global $conexion;

        $query = "INSERT INTO `Tarea` (`Name`, `Descripcion`, `FechaComienzo`, `FechaFinalizacion`, `ProyectoId`, `UserId`)
                                VALUES ('".$conexion->real_escape_string($this->getName())."',
                                        '".$conexion->real_escape_string($this->getDescripcion())."',
                                        '".$conexion->real_escape_string($this->getFechaComienzo())."',
                                        '".$conexion->real_escape_string($this->getFechaFinalizacion())."',
                                        ".$conexion->real_escape_string($this->getProyectoId()).",
                                        ".$conexion->real_escape_string($this->getUserId()).")";

        $conexion->query($query);

        if ($conexion->error){
            echo "error en la conexion";
            return false;
        }
        else {
            $this->setIdTarea($conexion->insert_id);
            self::load();
            return true;
        }
    }

    //METODO PARA ACTUALIZAR LOS DATOS DE UN PRODUCTO SELECCIONADO POR SU ID DE LA TABLA PRODUCT
    public function save () {
        global $conexion;

        $query = "UPDATE `Tarea` SET
                   `Name` = '". $conexion->real_escape_string($this->getName())."',
                   `Descripcion` = ". $conexion->real_escape_string($this->getDescripcion()).",
                   `FechaComienzo` = ". $conexion->real_escape_string($this->getFechaComienzo()).",
                   `FechaFinalizacion` = ". $conexion->real_escape_string($this->getFechaFinalizacion()).",
                   `Estado` = ". $conexion->real_escape_string($this->getEstado()).",
                   `ProyectoId` = ". $conexion->real_escape_string($this->getProyectoId()).",
                   `UserId` = '". $conexion->real_escape_string($this->getUserId())."'
                    WHERE `IdTarea` = {$this->getIdTarea()}";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else{
            return true;
        }
    }

    public function save_Estado () {
        global $conexion;

        $query = "UPDATE `Tarea` SET
                   `Estado` = '". $conexion->real_escape_string($this->getEstado())."'
                    WHERE `IdTarea` = {$this->getIdTarea()}";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else{
            return true;
        }
    }

    //METODO PARA BORRAR UN PRODUCTO SELECCIONADO POR SU ID DE LA TABLA PRODUCT
    public function delete () {
        global $conexion;

        $query = "DELETE FROM Tarea WHERE `IdTarea` = '{$this->getIdTarea()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //GETTERS Y SETTERS DE LOS ATRIBUTOS
    /**
     * @return mixed
     */
    public function getIdTarea()
    {
        return $this->IdTarea;
    }

    /**
     * @param mixed $IdTarea
     */
    public function setIdTarea($IdTarea): void
    {
        $this->IdTarea = $IdTarea;
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
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion): void
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return mixed
     */
    public function getFechaComienzo()
    {
        return $this->fechaComienzo;
    }

    /**
     * @param mixed $fechaComienzo
     */
    public function setFechaComienzo($fechaComienzo): void
    {
        $this->fechaComienzo = $fechaComienzo;
    }

    /**
     * @return mixed
     */
    public function getFechaFinalizacion()
    {
        return $this->fechaFinalizacion;
    }

    /**
     * @param mixed $fechaFinalizacion
     */
    public function setFechaFinalizacion($fechaFinalizacion): void
    {
        $this->fechaFinalizacion = $fechaFinalizacion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado): void
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getProyectoId()
    {
        return $this->ProyectoId;
    }

    /**
     * @param mixed $ProyectoId
     */
    public function setProyectoId($ProyectoId): void
    {
        $this->ProyectoId = $ProyectoId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param mixed $UserId
     */
    public function setUserId($UserId): void
    {
        $this->UserId = $UserId;
    }

}