<? if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Auth extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
		$this->load->library('form_validation');
	}

	public function logged_in_check()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('contacts');
		}
	}

	public function index()
	{
		$this->logged_in_check();

		$data['logged_in'] = '';
		$data['js_load'] = '';
		$data['success'] = '';

		$this->load->view('templates/header', $data);
		$this->load->view('auth');
		$this->load->view('templates/footer', $data);
	}

	public function signin()
	{
		$this->session->set_flashdata('success', '');
		$this->session->set_flashdata('error', '');

		$data['logged_in'] = '';
		$data['js_load'] = '';
		$data['success'] = '';

		$this->form_validation->set_rules('username_signin', 'Username', 'trim|required');
		$this->form_validation->set_rules('password_signin', 'Password', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			// check the username & password of user
			$status = $this->auth->validate();
			if ($status == ERR_INVALID_USERNAME or $status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata('error_signin', 'Username or Password is invalid');
				$data['logged_in'] = $this->session->userdata('logged_in');
			} else {
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata('logged_in', true);
				// redirect to contacts
				redirect('contacts');
			}
		} else {
			$this->session->set_flashdata('error_signin', 'Error filling data');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('auth');
		$this->load->view('templates/footer', $data);
	}

	public function signup()
	{
		$this->session->set_flashdata('success', '');
		$this->session->set_flashdata('error', '');

		$this->form_validation->set_rules('username_signup', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password_signup', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf_signup', 'Password confirmation', 'trim|required|min_length[6]|matches[password_signup]');
		if ($this->form_validation->run() == TRUE) {
			$this->auth->user_signup();
			$this->session->set_flashdata('success', 'Username was created! Please, Sign In now!');
		} else {
			$this->session->set_flashdata('error', 'Error filling data');
		}

		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['js_load'] = '';

		$this->load->view('templates/header', $data);
		$this->load->view('auth');
		$this->load->view('templates/footer', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('auth');
	}
}