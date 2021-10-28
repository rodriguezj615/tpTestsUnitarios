<?php
	require_once 'EmpleadoTest.php';
	
	class EmpleadoPermanenteTest extends EmpleadoTest{
		
		// Funcion para crear empleado
		public function crear(	$nombre="Juan", 
								$apellido="Rodriguez", $dni=37701467, 
								$salario=5000, 
								$fechaIngreso=null){

			$fecha = new \DateTime();
			$empperm = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fechaIngreso);
			return $empperm;
		}

        // 1 - crear y obtener Fecha de Ingreso
		public function testCrearYObtenerFechaIngreso(){
			$hoy = new DateTime();
			$empperm= $this->crear();
			$this->assertEquals($hoy->format('Y-m-d'), $empperm->getFechaIngreso()->format('Y-m-d'));
		}
    
    }
?>