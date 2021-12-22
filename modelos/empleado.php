<?php 

    class Empleado{


        public $id;
        public $nombre;
        public $correo;
        public function __construct($id, $nombre, $correo){

            $this->id = $id;
            $this->nombre = $nombre;
            $this->correo = $correo;


        }

        public static function consultar(){

            $listaEmpleados=[];
            $conexionBD = DB::crearInstancia();
            $sql = $conexionBD->query("SELECT * FROM empleados");

            foreach($sql->fetchAll() as $empleado){

                $listaEmpleados[]= new Empleado($empleado['id'], $empleado['nombre'], $empleado['correo']);
            }
            return $listaEmpleados;




        }


        public static function crear($nombre, $correo){

            $conexionBD = DB::crearInstancia();

            $sql = $conexionBD->prepare("INSERT INTO empleados(nombre, correo) VALUES(?,?)");
            $sql->execute(array($nombre, $correo));


        }

        public static function borrar($id){

            $conexionBD = DB::crearInstancia();

            $sql = $conexionBD->prepare("DELETE FROM empleados WHERE id=?");
            $sql->execute(array($id));




        }


    }


?>