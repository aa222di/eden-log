<?php

namespace Toeswade\Log;

/**
 * HTML Form elements.
 *
 */
class VlogTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @expectedException Toeswade\Exceptions\IncompleteTimestampsException
     */
    public function testRenderTimestampAsTableWithFalseParams() 
    {
        $Vlog = new \Toeswade\Log\Vlog();
        $Vlog->renderTimestampAsTable(array(), '', '');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testRenderTimestampAsTableWithNoParams() 
    {
        $Vlog = new \Toeswade\Log\Vlog();
        $Vlog->renderTimestampAsTable();
    }

    /**
     * Test for method noLog
     */
    public function testNoLog() 
    {
        $Vlog = new \Toeswade\Log\Vlog();
        $res = $Vlog->noLog();
        
        $this->assertInternalType('string', $res);
    }


    

}