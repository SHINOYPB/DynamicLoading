<?php


class Dynamic_loading extends CI_Controller
{
  public function index()
  {
	  $this->load->view('dynamicLoading/insertdb');
  }

 public function ajax_load()
  {

	  if ($this->input->is_ajax_request())
	  {

		  $labtests = $this->Dynamic_loading_model->getusers();

		  if (!empty($labtests))
		  {
			  $data['return'] = true;
			  $data['a'] = $labtests;

			  echo json_encode($data);
		  }
		  else
		  {
			  $data['return'] = false;
			  $data['message'] = 'cant get data from table';
			  echo json_encode($data);
		  }
	  }
	  else
	  {
		  $data['return'] = false;
		  $data['message'] = 'Ajax request not getting';
		  echo json_encode($data);
	  }

  }

}
