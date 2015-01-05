<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2015-01-05 at 10:47:58.
 */
class CentroResultadosServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CentroResultadosService
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
        $this->session = new NashEarlySession(self::$config["authenticationPath"], self::$config['servicePath']);
        $this->session->login(self::$config);
        $this->object = new CentroResultadosService($this->session);
        
        $empresaService = new EmpresaService($this->session);
        $empresa = $empresaService->getEmpresasSelecionaveis(1, 0)->getModel()->Data[0];
        $empresaService->selecionaEmpresa($empresa->getId());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->session->logout();
    }
    
    /**
     * @covers Nash\Client\Services\ClienteService::retrieve
     */
    public function testListagem()
    {
        $result = $this->object->retrieve(10, 0);
        $this->assertNotNull($result->getModel());
        $this->assertInternalType('integer', $result->getModel()->Total);
        $this->assertGreaterThan(0, count($result->getModel()->Data));
        $this->assertInstanceOf("CentroResultados", $result->getModel()->Data[0]);
    }
}
