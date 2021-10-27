<?php

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{

    // Funcion para crear empleado

    public function crear ($nombre = "Juan", 
                            $apellido = "Rodriguez", 
                            $dni = 37701467, 
                            $salario = 5000, 
                            $sector = "No especificado"){
                                
        $c = new \App\Empleado ($nombre, $apellido, $dni, $salario, $sector);
        return $c;
    }
    // 1 - Crear y obtener Nombre Y Apellido
    public function testCrearYObtenerNombreYApellido(){
        $c = $this->crear();
        $this->assertEquals("Juan Rodriguez", $c->getNombreApellido());
    }

    // public function testArrojarDNI()
    // {
    //     $r= $this->crear (38597947);
    //     $this->assertEquals("38597947", $r->getDNI());
    // }
    

    // public function testArrojarSalario()
    // {
    //     $r= $this->create (20000);
    //     $this->assertEquals("20000", $r->getSalario());
    // }

    // public function testSeleccionarSector()
    // {
    //     $r = new \App\Empleado(sector);
    //     $this->assertEquals (sector, $r->sector());
    // }

    // public function testObtenerSector()
    // {
    //     return $this->sector;
    // }


    // public function test__toString()
    // {
    //     $r = $this->create ("Adrian", "Gimenez", 30852194, 23500);
    //     $this->assertEquals("Adrian Gimenez 30852194 23500", $r->__toString());
    // }

};

