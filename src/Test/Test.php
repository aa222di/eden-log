<?php

/**
 * This class is only here to show how to use Clog. Delete this class in production.
 *
 **/

namespace Eden\Test;

class Test
{

	private $test1; // Int, number of seconds for sleep in test 1
	private $test2; // Int, number of seconds for sleep in test 2
	private $logger;

	public function __construct($secondsForTest1 = 2, $secondsForTest2 = 4, \Eden\Log\Clog $Clog) {
		$this->test1 = $secondsForTest1;
		$this->test2 = $secondsForTest2;
		$this->logger = $Clog;
	}

	/*
	 * Makes code sleep for $test1 seconds. 
	 */
	public function test1() {

		// Here we use $Clog to take a timestamp
		$this->logger->stamp(__CLASS__, __METHOD__, 'Test one starts');

		// Code for this method
		sleep($this->test1);

		// Here we use $Clog to take a timestamp
		$this->logger->stamp(__CLASS__, __METHOD__, 'Test one before return');


		return "Test 1 was executed. Script slept for " . $this->test1 . " seconds.";
	}

	/*
	 * Makes code sleep for $test2 seconds. 
	 */
	public function test2() {

		// Here we use $Clog to take a timestamp
		$this->logger->stamp(__CLASS__, __METHOD__, 'Test two starts');


		// Code for this method
		sleep($this->test2);


		// Here we use $Clog to take a timestamp
		$this->logger->stamp(__CLASS__, __METHOD__, 'Test two before return');
		return "Test 2 was executed. Script slept for " . $this->test2 . " seconds.";
	}
}
