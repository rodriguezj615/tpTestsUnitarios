<?php
	require_once 'EmpleadoTest.php';
	
    class EmpleadoEventualTest extends EmpleadoTest{
        //Funcion para crear empleado eventual
		public function crear(  $nombre='Juan', 
								$apellido ='Rodriguez', 
								$dni=37701467, 
								$salario = 5000,
								$montos = [500,600,700]){

			$empevent = new \App\EmpleadoEventual($nombre,$apellido, $dni, $salario, $montos);
			return $empevent;
		}
        // 1 - Crea y obtiene la comision
		public function testLaComisionPorVentasFuncionaCorrectamente(){
			$empevent= $this->crear(); //( (500+600+700) /3 ) *0,05 = $30
			$this-> assertEquals(30,$empevent->calcularComision()); 
		}
        // 2 - Crea y obtiene el ingreso total
		public function testCalculoDeIngresoTotal(){
			$empevent=$this->crear();
			$this->assertEquals(5030,$empevent->calcularIngresoTotal());
		}
        // 3 - Crea y obtiene el monto en caso de que la venta obtenga negativo o cero
		public function testNoSePuedeCrearConMontoDeVentaNegativoOCero(){
			$this->expectException(\Exception::class);
			$ventas = [0,-500, 600];
			$empevent = $this->crear(null,null,$ventas);
		}
		
	}
?>