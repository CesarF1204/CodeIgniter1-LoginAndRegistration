<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('login_and_registration/index.php');
	}
	public function login() {
		$this->load->model("Student");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('login_errors', validation_errors());
        } else {
        	$email = $this->input->post('email');
	        $password = md5($this->input->post('password'));
	        $this->load->model('Student'); // or you can autoload 
	        $student = $this->Student->get_users($email);
	        if($student && $student['password'] == $password){
	            $user = array(
	               'student_id' => $student['id'],
	               'first_name' => $student['first_name'],
	               'last_name' => $student['last_name'],
	               'student_email' => $student['email'],
	               'student_name' => $student['first_name'].' '.$student['last_name'],
	               'is_logged_in' => true
	            );
	            $this->session->set_userdata($user);
	            redirect("/students/profile");
	        }
        }
        $this->session->set_flashdata('invalid_login', '<p class="invalid-login">Invalid email or password!</p>');
        redirect(base_url());
	}
	public function register() {
		$this->load->model("Student");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('register_errors', validation_errors());
        	redirect(base_url());
        } else {
        	$password = md5($this->input->post('password'));
        	$student_details = array("first_name" => $this->input->post('first_name'), "last_name" => $this->input->post('last_name'), "email" => $this->input->post('email'), "password" => $password);
        	$add_student = $this->Student->add_user($student_details);
        	if($add_student === TRUE) {
        		$this->session->set_flashdata('added', '<p class="added">User "'.$this->input->post('first_name').' '.$this->input->post('last_name').'" was successfully added!</p>');
        	}
        }
        redirect(base_url());
	}
	public function profile() {
        if($this->session->userdata('is_logged_in') === TRUE){
            $this->load->view('/login_and_registration/profile');
        } else {
       		redirect(base_url());
        }
	}
	public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());   
    }
}
