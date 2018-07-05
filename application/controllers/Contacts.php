<?php 
/**
 * 
 */
class Contacts extends MY_Controller
{
	protected $access = '@';
	protected $_data;
	protected $_id;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
		$this->_id = $this->session->userdata('id');
		$this->_data['user'] = $this->auth->get_user_info($this->_id);
		$this->_data['logged_in'] = $this->session->userdata('logged_in');
	}

	public function index()
	{
		$this->_data['phones'] = $this->auth->get_user_phones($this->_id);
		$this->_data['logged_in'] = $this->session->userdata('logged_in');

		$this->load->view('templates/header', $this->_data);
		$this->load->view('templates/menu', $this->_data);
		$this->load->view('contacts', $this->_data);
		$this->load->view('templates/footer');
	}

	public function changepassword()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_password', 'Old password', 'trim|required');
		$this->form_validation->set_rules('new_password', 'New password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('new_passconf', 'New password confirmation', 'trim|required|min_length[6]|matches[new_password]');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('auth_model', 'auth');
			$status = $this->auth->check_password($this->_id);
			if ($status == ERR_INVALID_PASSWORD)
			{
				$this->session->set_flashdata('error', 'Old password is invalid');
			}
			else
			{
				$this->session->set_flashdata('success', 'New password is set');
			}
		}

		$this->load->view('templates/header', $this->_data);
		$this->load->view('templates/menu', $this->_data);
		$this->load->view('changepassword');
		$this->load->view('templates/footer');
	}

	public function editinfo()
	{
		$this->load->library('form_validation');
		$this->load->model('auth_model', 'auth');
		$this->_data['logged_in'] = $this->session->userdata('logged_in');

		$this->form_validation->set_rules('full_name', 'FUll name', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$status = $this->auth->update_user_info($this->_id);
			$this->session->set_flashdata('success', 'Your info is updated');
		}

		$this->_data['logged_in'] = $this->session->userdata('logged_in');
		$this->_data['user'] = $this->auth->get_user_info($this->_id);
		$this->load->view('templates/header', $this->_data);
		$this->load->view('templates/menu');
		$this->load->view('editinfo', $this->_data);
		$this->load->view('templates/footer');	
	}
}
?>