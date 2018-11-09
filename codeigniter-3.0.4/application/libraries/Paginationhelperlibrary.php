<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Paginationhelperlibrary {

	public function generateConfig($pagination_uri, $pagination_totalrow, $pagination_perpage=10, $pagination_urisegment=4){
		$config = array();

		$config['base_url'] = $pagination_uri;
       	$config['total_rows'] = $pagination_totalrow;
		$config['per_page'] = $pagination_perpage;
		$config['uri_segment'] = $pagination_urisegment;
		$config['num_links'] = 1;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		return $config;
	}
}
