<?php

class EmpleadoTest extends \PHPUnit\Framework\TestCase
{

    public function crear(
        $nombre="Juan", $apellido="Rodriguez", $dni=37701467, $salario=50000, $sector="No especificado"
    ){
        $crear= new \app\Empleado($nombre, $apellido, $dni, $salario, $sector);
        return $crear;
    }
    public function testNombreyApellido($nombre,$apellido) 
    {
        $c= $this->crear ();
        $this->assertSame($nombre.$apellido, $c->getNombreApellido());
    }

    public function testFunctionName()
    {
        $a=1;
        $a2=1;

        $this->assertSame($a,$a2);
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

