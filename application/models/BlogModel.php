<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogModel extends CI_Model {


	public function getBlog($limit = null, $offset = null)
	{
		$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'desc');
		$get = $this->db->get('blog');
		return $get;
	}

	public function getrowpag($filter)
	{
		$this->db->like('title', $filter, 'BOTH');
		$get = $this->db->count_all_results('blog');
		return $get;
	}

	public function getBlogSingle($id)
	{
		$this->db->where('id', $id);
		$get = $this->db->get('blog');

		return $get;
	}

	public function insertBlog($data)
	{
		$ins = $this->db->insert('blog', $data);
		// $this->db->affected_rows();
		if ($ins == true) {
			$send = ['status' => 'flashmesseage', 'messeage' => '<div class="alert alert-success" role="alert">data berhasil ditambahkan</div>'];
		} else {
			$send = ['status' => 'flashmesseage', 'messeage' => '<div class="alert alert-danger" role="alert">data gagal ditambahkan</div>'];
		}
		return $send;
	}

	public function updateBlog($id,$data)
	{
		$this->db->where('id', $id);
		$ins = $this->db->update('blog', $data);
		if ($ins == true) {
			$send = ['status' => true, 'messeage' => '<div class="alert alert-success" role="alert">data '.$id.' berhasil diperbaharui</div>'];
		} else {
			$send = ['status' => false, 'messeage' => '<div class="alert alert-danger" role="alert">data '.$id.' gagal diperbaharui</div>'];
		}
		return $send;
	}

	public function deleteBlog($id)
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('blog');
		if ($del == true) {
			$send = ['status' => true, 'messeage' => '<div class="alert alert-success" role="alert">data '.$id.' berhasil diperbaharui</div>'];
		} else {
			$send = ['status' => false, 'messeage' => '<div class="alert alert-danger" role="alert">data '.$id.' gagal diperbaharui</div>'];
		}
		return $send;
	}
}

/* End of file BlogModel.php */
/* Location: ./application/models/BlogModel.php */ ?>