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
     * Test for method RenderTimestampAsTable
     */
    public function testRenderTimestampAsTableSuccess() 
    {
        $Vlog = new \Toeswade\Log\Vlog();

        // Create log for test
        $Clog = new \Toeswade\Log\Clog();
        $class = 'Test Class';
        $method = 'Test Method';
        $comment = 'Test Comment';
        $Clog->stamp($class, $method, $comment);

        // Get log and render it
        $timestamps = $Clog->getLogAsArray();
        $res = $Vlog->renderTimestampAsTable( $timestamps, 1, 2 );
        
        $this->assertInternalType('string', $res);
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