<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-03 at 20:38:13.
 */
class ContaServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var MunicipioService
     */
    protected $object;
    protected $session;
    protected static $config;
    
    public static function setUpBeforeClass()
    {
        self::$config = require("config.php");
        self::$config = self::$config[self::$config["running"]];
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->session = new NashEarlySession(self::$config["servicePath"]);
        $this->object = new ContaService($this->session);
        
        $this->session->login(self::$config);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->session->logout();
    }

    public function testPossoConsultarUmaContaPeloCodigo() {
        $result = $this->object->retrieve(1, 0, "1");
        $this->assertEquals(1, count($result->getModel()->Data));
        $this->assertInstanceOf("Conta", $result->getModel()->Data[0]);
    }
    
    public function testPossoRecuperarContasDoTipoCliente() {
        $result = $this->object->getContasTipo(10, 0, TipoConta::Cliente);
        $this->assertGreaterThan(0, count($result->getModel()->Data));
    }
    
    public function testPossoRecuperarContasDoTipoClienteQueSejamAnaliticas() {
        $result = $this->object->getContasTipo(10, 0, TipoConta::Cliente, "Calculo:" . TipoCalculo::getTitle(TipoCalculo::getType(), TipoCalculo::Analitico));
        $this->assertGreaterThan(0, count($result->getModel()->Data));
        
        foreach ($result->getModel()->Data as $conta) {
            $this->assertEquals(TipoCalculo::Analitico, $conta->getCalculo());
        }
    }
}
