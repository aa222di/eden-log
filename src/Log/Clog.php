<?php

namespace Toeswade\Log;

/**
 * Clog
 * Controller class for logger extension.
 *
 */
class CLog
{

	private $model;
	private $view;

	public function __construct() {
		$this->model = new Mlog();
		$this->view = new Vlog();
	}

	/* Adds a timestamp to array
	 * Example $Clog->stamp(__CLASS__, __METHOD__, 'Method starts');
	 * 
	 * @return string
	 */
	public function stamp($domain, $where, $comment=null) {
		$this->model->Timestamp($domain, $where, $comment);
	}

	public function renderLog() {

		$timestamps = $this->model->getTimestamps();
		
		if(empty($timestamps)) {
			return $this->view->noLog();
		}

		$memorypeak = $this->model->getMemoryPeak();
		$pageLoadTime = $this->model->getPageLoadTime();

		return $this->view->renderTimestampAsTable($timestamps, $memorypeak, $pageLoadTime);
	}


	/*
	 * Returns all the timestamps as an array
	 */
	public function getLogAsArray() {

		return $this->model->getTimestamps();

	}

}