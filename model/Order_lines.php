<?php

class Order_lines
{
    public $Id;
    public $OrderId;
    public $ProductId;
    public $Quantity;

    public $allOrders_line;
    public $infoOrder_lines;


    //METODO CONSTRUCTOR PARA CREAR UNN OBJETO DE LA CLASE ORDERS CON TODOS LOS ATRIBUTOS
    public function __construct()
    {
    }

    //METODO PARA CARGAR UNA ORDEN FILTRADO POR SU ID
    public function load() {

        global $conexion;

        $query = "SELECT * FROM `Order_lines` WHERE `Id`='{$this->Id}'";

        $resultado = $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc())
                    foreach ($row as $key => $value) {
                        $name_column = str_replace('-', '_', $key);
                        $this->{"set$name_column"}($value);
                    }
                return true;
            } else {
                return false;
            }
        }
    }

    //METODO PARA CARGAR TODAS LAS ORDENES DE LA TABLA ORDERS
    public function load_all()
    {
        global $conexion;

        $query = "SELECT * FROM `Order_lines`";

        $resultado = $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $this->allOrders_line[] = array(
                        "Id" => $row["Id"],
                        "OrderId" => $row["OrderId"],
                        "ProductId" => $row["ProductId"],
                        "Quantity" => $row["Quantity"],
                    );
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function loadInfoOrdersLines()
    {
        global $conexion;

        $query = "SELECT * FROM `Order_lines` WHERE `OrderId` = '{$this->OrderId}'";

        $resultado = $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $this->infoOrder_lines[] = array(
                        "Id" => $row["Id"],
                        "OrderId" => $row["OrderId"],
                        "ProductId" => $row["ProductId"],
                        "Quantity" => $row["Quantity"],
                    );
                }
                return true;
            } else {
                return false;
            }
        }
    }

    //METODO PARA INSERTAR UNA NUEVA ORDEN EN LA TABLA ORDERS
    public function create()
    {
        global $conexion;

        $query = "INSERT INTO `Order_lines` (`OrderId`, `ProductId`, `Quantity`)
                                VALUES ('" . $conexion->real_escape_string($this->getOrderId()) . "',
                                        '" . $conexion->real_escape_string($this->getProductId()) . "',
                                        '" . $conexion->real_escape_string($this->getQuantity()) . "');";

        $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            $this->setId($conexion->insert_id);
            self::load();
            return true;
        }
    }

    //METODO PARA ACTUALIZAR LOS DATOS DE UNA ORDEN SELECCIONADO POR SU ID DE LA TABLA ORDERS
    public function save()
    {
        global $conexion;

        $query = "UPDATE `Order_lines` SET 
                  `OrderId` = '" . $conexion->real_escape_string($this->getOrderId()) . "',
                  `ProductId` = '" . $conexion->real_escape_string($this->getProductId()) . "',
                  `Quantity` = '" . $conexion->real_escape_string($this->getQuantity()) . "'
                  WHERE `Id` = '{$this->getId()}'";

        $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            return true;
        }
    }

    //METODO PARA BORRAR UNA ORDEN SELECCIONADA POR SU ID DE LA TABLA ORDERS
    public function delete()
    {
        global $conexion;

        $query = "DELETE FROM `Order_lines` WHERE `Id` = '{$this->getId()}'";

        $conexion->query($query);

        if ($conexion->error) {
            return false;
        } else {
            return true;
        }
    }

    //GETTERS Y SETTERS DE LOS ATRIBUTOS

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id): void
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->OrderId;
    }

    /**
     * @param mixed $OrderId
     */
    public function setOrderId($OrderId): void
    {
        $this->OrderId = $OrderId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * @param mixed $ProductId
     */
    public function setProductId($ProductId): void
    {
        $this->ProductId = $ProductId;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * @param mixed $Quantity
     */
    public function setQuantity($Quantity): void
    {
        $this->Quantity = $Quantity;
    }

}
