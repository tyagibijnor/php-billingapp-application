<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public function index()
	{
		$this->home();
	}
	 public function home(){
    $data = array();
    $data['title'] 		= 'Library Management System ele'; // Load Page Title
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['content'] 	= $this->load->view('inc/content', '' , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
}