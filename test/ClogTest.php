<?php

namespace Toeswade\Log;

/**
 * HTML Form elements.
 *
 */
class ClogTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the stamp method saves the values correctly
     *
     * @return void
     *
     */
    public function testStamp() 
    {
        
        $Clog = new \Toeswade\Log\Clog();
       

        $class = 'Test Class';
        $method = 'Test Method';
        $comment = 'Test Comment';

        $Clog->stamp($class, $method, $comment);

        $res = $Clog->getLogAsArray();

        $resClass = $res[0]['domain'];
        $this->assertEquals($resClass, $class, "The registered class doesn't match the result");

        $resMethod = $res[0]['where'];
        $this->assertEquals($resMethod, $method, "The registered method doesn't match the result");

        $resComment = $res[0]['comment'];
        $this->assertEquals($resComment, $comment, "The registered comment doesn't match the result");
    }

    /**
     * Test that we always get a stirng as return value
     *
     * @return void
     *
     */
    public function testRenderLog() 
    {
        
        $Clog = new \Toeswade\Log\Clog();
        $res = $Clog->renderLog();

        $this->assertInternalType('string', $res);
    }


    

}