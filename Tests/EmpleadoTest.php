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
    // 2 - Crear y obtener DNI
    public function testPuedeCrearYObtenerDNI(){
        $c = $this->crear();
        $this->assertEquals(37701467, $c->getDNI());
    }
    // 3 - Crear y obtener Salario
    public function testCrearYObtenerSalario(){
        $c = $this->crear();
        $this->assertEquals(5000,$c->getSalario());
    }
    // 4- Crear y obtener getSector & setSector
    public function testModificarSectorDeEmpleado(){
        $c=$this->crear();
        $sector = "Indefinido";
        $this->assertEquals("No especificado",$c->getSector());

        // Sector asignado
        $c->setSector($sector);

        // Test asignacio de sector
        $this->assertEquals("Indefinido",$c->getSector());
    }
    // 5 - Crear y obtener __toString
    public function testConvertirEnCadena(){
        $c=$this->crear();
        $this->assertEquals("Juan Rodriguez 37701467 5000",$c);
    }
    // 6 - Empleado con Nombre vacio
    public function testEmpleadoConNombreVacio(){
        $this->expectException(\Exception::class);
        $c= $this-> crear($nombre="");
    }
    // 7- Empleado con Apellido vacio
    public function testEmpleadoConApellidoVacio(){
        $this->expectException(\Exception::class);
        $c= $this-> crear($nombre="Franco", $Apellido="");
    }
    // 8 - Empleado con DNI Vacio
    public function testEmpleadoConDniVacio(){
        $this->expectException(\Exception::class);
        $c= $this-> crear(null, null,$dni="");
    }
    // 9 - Empleado con Salario Vacio
    public function testEmpleadoConSalarioVacio(){
        $this->expectException(\Exception::class);
        $c= $this-> crear(null, null, null,$Salario="");
    }
    // 10 - Ingreso de DNI caracteres no numericos
    public function testDniConCaracteresNoNumericos(){
        $this->expectException(\Exception::class);
        $c= $this-> crear(null, null, "4kh69");
    }
        // 11 - Sector no especificado en el formulario
    public function testSectorNoEspecificado(){
        $c= $this-> crear("Juan", "Rodriguez", 2, 50000);
        $this->assertEquals("No especificado", $c->getSector());
    }
};

