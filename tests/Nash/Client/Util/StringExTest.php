<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-06 at 12:50:33.
 */
class StringExTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var StringEx
     */
    protected $object;

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

    /**
     * @covers Nash\Client\Util\StringEx::noAccents
     * @todo   Implement testNoAccents().
     */
    public function testNoAccents()
    {
        $strAccents = "áÀãçéèÕü";
        $noAccents = StringEx::noAccents($strAccents);
        
        $this->assertEquals("aAaceeOu", $noAccents);
    }
    
    public function testSimplify() {
        $strAccents = "áÀãçéèÕü";
        $noAccents = StringEx::simplify($strAccents);
        
        $this->assertEquals("aaaceeou", $noAccents);
    }
}
