<?php

class EmpleadoTest extends \PHPUnit\Framework\TestCase
{
    public function crear(
        $nombre="Juan", $apellido="Rodriguez", $dni=37701467, $salario=50000, $sector="No especificado"
    ){
        $emp= new \app\Empleado($nombre, $apellido, $dni, $salario, $sector);
        return $emp;
    }
    public function testArrojarNombreyApellido() 
    {
        $emp = $this->crear ("Juan", "Rodriguez");
        $this->assertEquals("Juan Rodriguez", $emp->getNombreApellido());
    }

    public function testArrojarDNI()
    {
        $r= $this->crear (37701467);
        $this->assertEquals("37701467", $r->getDNI());
    }
    

    public function testArrojarSalario()
    {
        $r= $this->crear (20000);
        $this->assertEquals("20000", $r->getSalario());
    }

    // public function testSeleccionarSector()
    // {
    //     $r = new \App\Empleado($sector);
    //     $this->assertEquals ($sector, $r->sector());
    // }

    public function testObtenerSector()
    {
        return $this->sector;
    }


    public function test__toString()
    {
        $r = $this->crear ("Juan", "Rodriguez", 37701467, 50000);
        $this->assertEquals("Adrian Gimenez 37701467 50000", $r->__toString());
    }
};

