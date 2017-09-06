<?php

namespace Controller;

use \W\Controller\Controller;

class InstitutionsController extends Controller
{
	public function index()
	{
		$this->show('institutions/index');
	}

	public function read()
	{
		$this->show('institutions/read');
	}

	public function create()
	{
		$this->show('institutions/create');
	}

	public function update()
	{
		$this->show('institutions/update');
	}

	public function delete()
	{
		$this->show('institutions/delete');
	}
}