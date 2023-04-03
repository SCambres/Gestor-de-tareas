<?php

class Proyectos {
    public $IdProyecto;

    public $Name;
    public $Descripcion;

    public $Categoria;

    public $allProyectos;

    //METODO CONSTRUCTOR PARA CREAR UNN OBJETO DE LA CLASE PROYECTOS CON TODOS LOS ATRIBUTOS
    public function __construct(){
    }

    //METODO PARA CARGAR UNA PROYECTO FILTRADO POR SU ID
    public function load (){

        global $conexion;

        $query = "SELECT * FROM `Proyectos` WHERE `IdProyecto`='{$this->IdProyecto}'";

        $resultado = $conexion ->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc())
                    foreach ($row as $key => $value) {
                        $name_column = str_replace('-', '_', $key);
                        $this->{"set$name_column"}($value);
                    }
                    return true;
            }
            else{
                return false;
            }
        }
    }

    //METODO PARA CARGAR TODAS LOS PROYECTOS DE LA TABLA ORDERS
    public function load_all () {
        global $conexion;

        $query = "SELECT * FROM `Proyectos`";

        $resultado = $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            if ($resultado->num_rows>0){
                while ($row = $resultado->fetch_assoc()){
                    $this->allProyectos[] = array(
                        "IdProyecto" => $row["IdProyecto"],
                        "Name" => $row["Name"],
                        "Descripcion" => $row["Descripcion"],
                        "Categoria" => $row["Categoria"],
                    );
            }
            return true;
        }
            else {
                return false;
            }
        }
    }

    //METODO PARA INSERTAR UN NUEVO PROYECTO EN LA TABLA ORDERS
    public function create()
    {
        global $conexion;

        $query = "INSERT INTO `Proyectos` (`Name`, `Descripcion`, `Categoria`)
                                VALUES ('" . $conexion->real_escape_string($this->getName()) . "',
                                        '" . $conexion->real_escape_string($this->getDescripcion()) . "',
                                        '" . $conexion->real_escape_string($this->getCategoria()) . "');";

        $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            $this->setIdProyecto($conexion->insert_id);
            self::load();
            return true;
        }
    }

    //METODO PARA ACTUALIZAR LOS DATOS DE UN PROYECTO SELECCIONADO POR SU ID DE LA TABLA PROYECTOS
    public function save () {
        global $conexion;

        $query = "UPDATE `Proyectos` SET 
                  `Name` = '". $conexion->real_escape_string($this->getName())."',
                  `Descripcion` = '".$conexion->real_escape_string($this->getDescripcion())."',
                  `Categoria` = '".$conexion->real_escape_string($this->getCategoria())."'
                  WHERE `IdProyecto` = '{$this->getIdProyecto()}'";
        
       $conexion->query($query);

       if ($conexion->error){
           return false;
       }
       else {
           return true;
       }
    }

    //METODO PARA BORRAR UN PROYECTO SELECCIONADO POR SU ID DE LA TABLA PROYECTOS
    public function delete () {
        global $conexion;

        $query = "DELETE FROM `Proyectos` WHERE `IdProyecto` = '{$this->getIdProyecto()}'";

        $conexion->query($query);

        if ($conexion->error){
            return false;
        }
        else {
            return true;
        }
    }

    //GETTERES Y SETTERS DE LOS ATRIBUTOS

    /**
     * @return mixed
     */
    public function getIdProyecto()
    {
        return $this->IdProyecto;
    }

    /**
     * @param mixed $IdProyecto
     */
    public function setIdProyecto($IdProyecto): void
    {
        $this->IdProyecto = $IdProyecto;
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
    public function getCategoria()
    {
        return $this->Categoria;
    }

    /**
     * @param mixed $Categoria
     */
    public function setCategoria($Categoria): void
    {
        $this->Categoria = $Categoria;
    }




}