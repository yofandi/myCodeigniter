<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BlogModel');
	}

	public function index($offset = 0)
	{
		$filter = $this->input->get();
		if (empty($filter)) {
			$filter['search'] = '';
		}
		$data = [];

		$this->load->library('pagination');

		$config['base_url'] = site_url('BlogController/index');
		$config['total_rows'] = $this->BlogModel->getrowpag($filter['search']);
		$config['per_page'] = 3;

		$config['full_tag_open']    = '<ul class="pagination">';
		$config['full_tag_close']   = '</ul>';
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['prev_link']        = '&laquo';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['next_link']        = '&raquo';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '</span></li>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['pagination'] = $this->pagination->create_links();

		$this->db->like('title', $filter['search'], 'BOTH');
		$data['data'] = $this->BlogModel->getBlog($config['per_page'], $offset)->result();
		$data['statuspagehead'] = 0;
		// $this->load->view('blogpage',$data);
		// die(var_dump($data));
		$this->template->loadView('Home Page', 'blogpage', $data);
	}

	public function tambah()
	{
		$data['statuspagehead'] = 0;
		$this->template->loadView('Tambah Blog Page', 'tambahblog', $data);
	}

	public function detail($id)
	{
		$this->db->where('id', $id);
		$data['data'] = $this->BlogModel->getBlog()->row();
		$data['statuspagehead'] = 1;
		$data['titlepagehead'] = $data['data']->title;
		$this->template->loadView($data['data']->title, 'blogpagedetail', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules('title', 'Title ', 'required');		
		$this->form_validation->set_rules('description', 'Description ', 'required');
		if ($this->form_validation->run() === TRUE) {
			
			$posts = $this->input->post();

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['max_width']            = 1000;
			$config['max_height']           = 1000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());

				die(var_dump($error));
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$loc = $this->upload->data()['file_path'].$this->upload->data()['file_name'];
				unlink($loc);
			}


			$data = [
				'title' => $posts["title"],
				'description' => $posts["description"]
			];
			$insert = $this->BlogModel->insertBlog($data);
			redirect('BlogController/');
		}
		$this->tambah();
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$data['data'] = $this->BlogModel->getBlog()->row();
		// die(var_dump($data));
		// $this->load->view('blogpageedit',$data);
		$data['statuspagehead'] = 1;
		$data['titlepagehead'] = $data['data']->title;
		$this->template->loadView($data['data']->title, 'blogpageedit', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title ', 'required');		
		$this->form_validation->set_rules('description', 'Description ', 'required');

		if ($this->form_validation->run() == TRUE) {
			$posts = $this->input->post();
			$data = [
				'title' => $posts['title'],
				'description' => $posts['description'],
			];
			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['max_width']            = 1000;
			$config['max_height']           = 1000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('image');

			if (!empty($this->upload->data()['file_name'])) {
				$data = array('upload_data' => $this->upload->data());
				$loc = $this->upload->data()['file_path'].$this->upload->data()['file_name'];
				unlink($loc);
				// die(var_dump($data));
			} else {
				// echo "hai";
				// exit;
			}

			$update = $this->BlogModel->updateBlog($id,$data);
			if ($update['status'] == true) {
				echo '<script>alert("Success!! ID Blog : '.$update['messeage'].'"); window.location="'.site_url('BlogController/').'"</script>';
			} else {
				echo '<script>alert("Failed!! ID Blog : '.$update['messeage'].'"); window.location="'.site_url('BlogController/').'"</script>';
			}
		}
		$this->edit($id);
	}

	public function delete($id)
	{
		$del = $this->BlogModel->deleteBlog($id);
		if ($del['status'] == true) {
			echo '<script>alert("Success!! Blog : '.$del['messeage'].'"); window.location="'.site_url('BlogController/').'"</script>';
		} else {
			echo '<script>alert("Failed!! Blog : '.$del['messeage'].'"); window.location="'.site_url('BlogController/').'"</script>';
		}
	}

}

/* End of file BlogController.php */
/* Location: ./application/controllers/BlogController.php */