<?php


class Dynamic_loading_model extends CI_Model
{
	public function getusers()
	{
		$labTests = $this->db->get('users');
		if ($labTests->num_rows() > 0) {
			return $labTests->result_array();
		}
	}
}
