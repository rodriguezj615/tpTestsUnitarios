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
        
    		//2 - crear y obtener calculo de Comision
		public function testCalculoDeComisionEnBaseALaAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$empperm= $this->crear('Juan','Rodriguez','37701467','5000', $ingreso); 
			$this->assertEquals("10%",$empperm->calcularComision());
		}

        // 3 - crear y obtener calculo de Ingreso Total
		public function testCalculoDeIngresoTotal(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$empperm= $this->crear('Juan','Rodriguez','37701467','5000', $ingreso); 
			$this->assertEquals(5500,$empperm->calcularIngresoTotal());
		}

		// 4 - crear y obtener calculo de Antiguedad 
		public function testSePuedeCalcularAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$empperm= $this->crear('Juan','Rodriguez','37701467','5000', $ingreso);
			$this->assertEquals(10,$empperm->calcularAntiguedad());
		}

        // 5 - Fecha de ingreso posterior a la de hoy, excepción
		public function testNoSeCreaConFechaPosteriorAHoy(){
			$ingreso = new DateTime();
			$ingreso->modify('+10 years');
			$this->expectException(\Exception::class);
			$empperm= $this->crear('Juan','Rodriguez','37701467','5000', $ingreso);
		}
    }
?>