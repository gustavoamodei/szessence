<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		
		echo view('login');
		
	}
	public function main()
	{
		echo view('template/header');
		echo view('main');
		echo view('template/footer');
		
	}
	//--------------------------------------------------------------------

}
