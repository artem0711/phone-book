<? if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	/**
	 * '*' all user
	 * '@' logged in user
	 * @var string
	 */
	protected $access = '*';

	public function __construct()
	{
		parent::__construct();

		$this->login_check();
	}

	public function login_check()
	{
		if ($this->access != '*') 
		{
			// here we check the role of the user
			if (!$this->permission_check()) {
				die('<h4>Access denied</h4>');
			} 

			// if user try to access logged in page
			// check does he/she has logged in
			// if not, redirect to login page
			if (!$this->session->userdata('logged_in')) {
				redirect('auth');
			}
		}
	}

	public function permission_check()
	{
		return ($this->access == '@') ? true : false;
	}
}