<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("department_model");
    $this->load->model("author_model");
    $this->load->model("student_model");
    $this->load->model("book_model");
    $data = array();
    }
    public function addbook(){
    $data['title'] = 'Add Product';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['authordata']    = $this->author_model->getAuthorData();
    $data['content'] = $this->load->view('inc/bookadd', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addbookform(){
    $data['book'] = $this->input->post('book');
    $data['department'] = $this->input->post('department');
    $data['author'] = $this->input->post('author');
    $data['totalbook'] = $this->input->post('totalbook');
    

    $book = $data['book'];
    $department = $data['department'];
    $author = $data['author'];
    $totalbook = $data['totalbook'];
    if(empty($book)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("book/addbook");
    }
    else {
        $this->book_model->AddBookData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("book/addbook");
    }
   }

    public function booklist(){
    $data['title'] = 'Book List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['bookdata']    = $this->book_model->getBookData();
    $data['content'] = $this->load->view('inc/listbook', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editbook($bid){
    $data['title'] = 'Edit Author';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['authordata']    = $this->author_model->getAuthorData();
    $data['bookById']    = $this->book_model->getBookById($bid);
    $data['content'] = $this->load->view('inc/bookedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateBook(){
    $data['bid'] = $this->input->post('bid');
    $data['book'] = $this->input->post('book');
    $data['department'] = $this->input->post('department');
    $data['author'] = $this->input->post('author');
    $data['totalbook'] = $this->input->post('totalbook');
    
    
    $bid = $data['bid'];
    $book = $data['book'];
    $department=$data['department'];
    $author=$data['author'];
    $totalbook=$data['totalbook'];

    if(empty($book) || empty($department) || empty($author) || empty($totalbook) ) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("book/editbook/".$bid);
    }
    else {
        $this->book_model->UpdateBookData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("book/booklist");
    }

    }

  public function deletebook($bid)  {
    $this->book_model->deleteBookById($bid);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("book/booklist");

  }   

}
   ?>