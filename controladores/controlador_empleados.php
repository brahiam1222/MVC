<?php


include_once("modelos/empleado.php");
include_once("conexion.php");

DB::crearInstancia(); //como la clase 'DB' tiene un método estático llamado 'crearInstancia()' entonces se le puede llamar directamente usando los '::'


class ControladorEmpleados
{

        public function Inicio()
        {

           $empleados = Empleado::consultar();

            include_once("vistas/empleados/inicio.php");


        }

        public function Crear()
        {

            if ($_POST) {
                print_r($_POST);
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                Empleado::crear($nombre, $correo);
                header("location:./?controlador=empleados&accion=inicio");

            }


            //INSERT INTO `empleados` (`id`, `nombre`, `correo`) VALUES ('406', 'juan', 'juan@gmail.com');
            include_once("vistas/empleados/crear.php");


        }

        public function Editar()
        {

            include_once("vistas/empleados/editar.php");


        }
        public function Borrar()
        {

            $id=$_GET['id']; 
            Empleado::borrar($id);
            header("location:./?controlador=empleados&accion=inicio");
            


        }


}


?>