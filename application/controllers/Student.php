<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("student_model");
    $this->load->model("department_model");
    $data = array();
    }
    public function addstudent(){
    $data['title'] = 'Add New Student';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/studentadd', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addstudentform(){
    $data['studentname'] = $this->input->post('studentname');
    $data['department'] = $this->input->post('department');
    $data['rollnumber'] = $this->input->post('rollnumber');
    $data['regnumber'] = $this->input->post('regnumber');
    $data['phone'] = $this->input->post('phone');

    $studentname = $data['studentname'];
    $department = $data['department'];
    $rollnumber = $data['rollnumber'];
    $regnumber = $data['regnumber'];
    $phone = $data['phone'];
    if(empty($studentname) || empty($department) || empty($rollnumber) || empty($regnumber) || empty($phone)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("student/addstudent");
    }
    else {
        $this->student_model->AddStudentData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("student/addstudent");
    }

    }
    public function studentlist(){
    $data['title'] = 'Student List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['studentdata']    = $this->student_model->getStudentData();
    $data['content'] = $this->load->view('inc/liststudent', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editstudent($sid){
    $data['title'] = 'Edit Student';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['studentById']    = $this->student_model->getStudentById($sid);
    $data['content'] = $this->load->view('inc/studentedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateStudent(){
    $data['sid'] = $this->input->post('sid');
    $data['studentname'] = $this->input->post('studentname');
    $data['department'] = $this->input->post('department');
    $data['rollnumber'] = $this->input->post('rollnumber');
    $data['regnumber'] = $this->input->post('regnumber');
    $data['phone'] = $this->input->post('phone');

    $sid = $data['sid'];
    $studentname = $data['studentname'];
    $department = $data['department'];
    $rollnumber = $data['rollnumber'];
    $regnumber = $data['regnumber'];
    $phone = $data['phone'];
    if(empty($studentname) || empty($department) || empty($rollnumber) || empty($regnumber) || empty($phone)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("student/editstudent/".$sid);
    }
    else {
        $this->student_model->UpdateStudentData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("student/studentlist");
    }

    }

  public function deletestudent($sid)  {
    $this->student_model->deleteStudentById($sid);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("student/studentlist");

  }   
}