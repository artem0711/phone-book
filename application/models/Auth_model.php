<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	private $_data = array();

	public function validate()
	{
		$this->load->library('encryption');

		$username = $this->input->post('username_signin');
		$password = $this->input->post('password_signin');

		$this->db->where('username', $username);
		$query = $this->db->get('users');

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			$password = sha1($password . config_item('encryption_key'));
			$password = sha1($password . $row['salt']);
			if ($row['password'] == $password)
			{
				// we not need password to store in session
				unset($row['username']);
				unset($row['password']);
				unset($row['full_name']);
				unset($row['dob']);
				unset($row['position']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
		return ERR_NONE;
	}

	public function check_password($id)
	{
		$this->load->library('encryption');

		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$row = $query->row_array();

		$password = $this->input->post('old_password');
		$password = sha1($password . config_item('encryption_key'));
		$password = sha1($password . $row['salt']);

		if ($row['password'] == $password)
		{
			$password = $this->input->post('new_password');

			$salt = $this->random_string();
			$password = sha1($password . config_item('encryption_key'));
			$password = sha1($password . $salt);

			$data = array(
				'password' => $password,
				'salt' => $salt
			);

			$this->db->where('id', $id);
			$this->db->update('users', $data);
			return ERR_NONE;
		}

		return ERR_INVALID_PASSWORD;
	}

	public function get_data()
	{
		return $this->_data;
	}

	public function get_user_info($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		$row = $query->row_array();
		unset($row['id']);
		unset($row['password']);
		return $row;
	}

	public function update_user_info($id)
	{
		$full_name = $this->input->post('full_name');
		$dob = $this->input->post('dob');
		$position = $this->input->post('position');
		
		$data = array(
			'full_name' => $full_name,
			'dob' => $dob,
			'position' => $position
		);
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function get_user_phones($id)
	{
		$query = $this->db->get_where('contacts', array('user_id', $id));
		return $query->result();
	}

	private function random_string()
	{
		$length = 16;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters_length = strlen($characters);
		$random_string = '';
		for ($i = 0; $i < $length; $i++)
		{
		    $random_string .= $characters[rand(0, $characters_length - 1)];
		}
		return $random_string;
	}

	public function user_signup()
	{
		$password = $this->input->post('password_signup');
		$salt = $this->random_string();
		$password = sha1($password . config_item('encryption_key'));
		$password = sha1($password . $salt);

		$data = array(
			'username' => $this->input->post('username_signup'),
			'password' => $password,
			'salt' => $salt
		);

		return $this->db->insert('users', $data);
	}
}