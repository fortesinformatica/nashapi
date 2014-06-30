<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-06 at 13:02:33.
 */
class BaseEnumTest extends PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testPossoRecuperarOValorAPartirDoTitulo()
    {
        $value = MyEnumTest::getValue(MyEnumTest::getType(), "value_one");
        $this->assertEquals(1, $value);
    }
    
    public function testPossoRecuperarOValorAPartirDoValor()
    {
        $value = MyEnumTest::getValue(MyEnumTest::getType(), 1);
        $this->assertEquals(1, $value);
    }

    public function testOla(){
        $ola = 1;
        $truco = 1;
        $this->assertEquals($ola,$truco);
    }

    public function testPossoRecuperarOTituloAPartirDoValor()
    {
        $title = MyEnumTest::getTitle(MyEnumTest::getType(), 2);
        $this->assertEquals("VALUE_TWO", $title);
    }
    
    public function testPossoRecuperarOTituloAPartirDoTitulo()
    {
        $title = MyEnumTest::getTitle(MyEnumTest::getType(), "value_two");
        $this->assertEquals("VALUE_TWO", $title);
    }
    
    public function testPossoVerificarSeUmValorEValidoParaOEnum() {
        $this->setExpectedException(
            "Exception", "O valor 3 não está contido nas opções válidas para " . MyEnumTest::getType() . "."
        );
        MyEnumTest::check(MyEnumTest::getType(), 3);
    }
}

class MyEnumTest extends BaseEnum {
    const VALUE_ONE = 1;
    const VALUE_TWO = 2;
    
    public static function getType() {
        return get_class();
    }
}