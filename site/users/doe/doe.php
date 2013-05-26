<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCPersonalController.php
// Desc: User specific controller for testing


class CCPersonalController extends CObject implements IController{
	
	/**
	 * Membet variables
	 */
	
	/**
	 * Construct Destruct
	 */
	public function __construct(){
		parent::__construct();
		if(file_exists('site/site.config.php')){
   			require('site/site.config.php');
		}
	}
	
	/**
	 * Methods
	 */
	
	/**
	 * Implementing Index interface
	 */
	
	public function Index(){
		$contents= new CMContent();
		$this->views->SetTitle('About MyPage' . htmlentities($contents['title']));
		$this->views->AddInclude(__DIR__ . '/page.tpl.php', array('contents'=>$contents));
	}

	
	public function Blog(){
		$contents =new CMContent();
		$this->views->SetTitle('My blog');
		$this->views->AddInclude(__DIR__ . '/myblog.tpl.php', array(
			'contents'=>$contents->ListAll(array(
				'type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC'))));
	}

} // End class

?>