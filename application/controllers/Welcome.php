<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'], 'wot' => $record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

	public function random()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();

		$tmp = array_rand($source, 1);
		$single = $source[$tmp];

		$authors[] = array ('who' => $single['who'], 'mug' => $single['mug'], 'href' => $single['where'], 'wot' => $single['what']);

		$this->data['authors'] = $authors;

		$this->render();
	}

}
