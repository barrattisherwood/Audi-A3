<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		require 'McCarthy/mccarthy-new.php';
		$this->McCarthy = new McCarthy($this);
		$this->stock_data = $this->_getCustomData();

		foreach ($this->stock_data as $dta) {
			$this->class_data[$dta['class']][] = $dta;
		}

	}

	function _getCustomData() {

		$data = array();

		if ($csv = @fopen($_SERVER['DOCUMENT_ROOT'] . '/data/merc_data.csv', 'rb')) {
			while (!feof($csv)) {
				$row = fgetcsv($csv);
				if (is_numeric($row[5])) {
					$data[$row[5]] = array(
						'blurb' => ($row[0] !='' ? $row[0]: @$blurbs[$row[6]]),
						'class' => $row[1],
						'image' => $row[2],
						'model' => $row[3],
						'description' => $row[4],
						'mid' => $row[5],
						'class' => $row[6],
					);

					if($row[0]!='')
					{
						$blurbs[$row[6]] = $row[0];
					}
				}
			}
		}

		return $data;
	}



	function _getAllModels()
	{
		$this->db->select('mmbrand');
		$this->db->select('mmseries');
		$this->db->select('mid');
		$this->db->where_in('mid', $this->midMappings());
		$this->db->order_by('mmbrand', 'asc');
		$this->db->order_by('mmseries', 'asc');
		$result = $this->db->get('new');
		foreach ($result->result() as $res) {
			$data[$res->mid] = "$res->mmbrand $res->mmseries";
		}

		return $data;
	}

	function midMappings() {
		return array('adam' => 0);

	}

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
	 * map to /index.php/welcome/<method_name>newc
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		$data['dealerships_info'] = $this->McCarthy->getDealerships();
		$this->load->view('site-homepage', $data);
	}

	public function dealership($coynumber) {

		$coynumber = (int) $coynumber;

		if ($coynumber > 0) {
			$data['dealership_info'] = $this->McCarthy->getDealership($coynumber);
			$this->load->view($data['dealership_info']->brand . '/homepage', $data);
		} else {
			redirect('/');
		}
	}

	public function contact($brand, $coynumber) {

		$data['coynumber'] = (int) $coynumber;

		if ($data['coynumber'] > 0) {


			if ($post_data = $this->input->post(null, true)) {
				$post_data['coynumber'] = $coynumber;
			$this->McCarthy->processDealershipMessage($this->config->item('siteid'), $post_data, $brand, base_url() . "thankyou/$brand/general-enquiry-received");
		}


			$data['dealership_info'] = $this->McCarthy->getDealership($data['coynumber']);
			$this->load->view($brand . '/contact-us', $data);
		} else {
			redirect('/');
		}
	}

	public function brand($ubrand) {

		$ubrand = preg_replace('@[^a-z0-9-\s]@', '', $ubrand);

		if ($ubrand != '') {
			$tmp = $this->McCarthy->getDealershipsByBrand($ubrand);
			$dealerships = $tmp[$ubrand];
			if (!empty($dealerships)) {
				$data['dealership_info'] = $dealerships;
				$data['brand'] = $ubrand;
				$this->load->view($data['brand'] . '/homepage', $data);
			} else {
				redirect('/');
			}
		} else {
			redirect('/');
		}
	}

	function brochure($model_keyword) {
		redirect(base_url() . "downloads/$model_keyword.pdf");
		exit;
	}

	public function brochures($brand) {
		$data['brand'] = $brand;
		$this->load->view($brand . '/brochures', $data);
	}

	public function used($brand) {
		$data['results'] = $this->McCarthy->getUsedVehicles($brand);
		$data['brand'] = $brand;
		$this->load->view($brand . '/used-vehicles', $data);
	}

	public function demo($brand) {
		$data['results'] = $this->McCarthy->getUsedVehicles($brand, 1);
		$data['brand'] = $brand;
		$this->load->view($brand . '/demo', $data);
	}

	public function preowned($brand, $vid) {
		$data['results'] = $this->McCarthy->getUsedVehicle($vid);
		$data['brand'] = $brand;

		if ($post_data = $this->input->post(null, true)) {
			$post_data['vid'] = $post_data['vid'] ?: intval($vid);
			$this->McCarthy->processPreownedEnquiry($this->config->item('siteid'), $post_data, $brand, '/thankyou/used-car-enquiry-sent');
		}

		$this->load->view($brand . '/used-vehicle', $data);
	}

	function _side_bar_contact_form($data) {
		return $this->load->view('includes/sidebar', null, true);

	}

	public function newcar($brand, $model_keyword) {
		$data['extra_info'] = array();

		$data['feed_info'] = json_decode(json_encode(array('sbrandname'=>'Opel', 'sseriesname'=>'Adam', 'smodelname'=>'', 'fretailprice'=>''))); //make quick object.

		if ($post_data = $this->input->post(null, true)) {
			$post_data['vehicle'] = 'Opel Adam';
			$this->McCarthy->processNewCarEnquiry($this->config->item('siteid'), $post_data, $brand, '');
		}

	}



	public function series($brand, $model_keyword) {
		$data['mid_map'] = $this->midMappings();
		$data['mid'] = $data['mid_map'][$model_keyword];
		$data['extra_info'] = $this->stock_data[$data['mid']];

		$data['feed_info'] = $this->McCarthy->getCarByMid($data['mid']);

		if ($post_data = $this->input->post(null, true)) {
			$this->McCarthy->processNewCarEnquiry($this->config->item('siteid'), $post_data, $brand, '/thankyou/new-car-enquiry-sent');
		}

		$data['brand'] = $brand;
		$this->load->view($brand . '/' . $model_keyword, $data);
	}

	function financial_services($brand, $coynumber = null) {
		$data['brand'] = $brand;
		$this->load->view($brand . '/financial-services', $data);
	}

	public function specials($brand, $offset = 0) {
		$data['results'] = $this->McCarthy->getSpecials($offset);
		$data['brand'] = $brand;
		$this->load->view($brand . '/specials', $data);
	}

	public function special_enquiry($brand, $special_id) {

		
		if ($post_data = $this->input->post(null, true)) {
			$post_data['is_special'] = 0;

			//available if this is a specials enquiry.
			if ($special_brand && $special_id && $title_base64) {
				$post_data['is_special'] = 1;
				$post_data['special_brand'] = $special_brand;
				$post_data['special_id'] = $special_id;
				$post_data['special_title'] = base64_decode($title_base64);
			}

			$after_msg = $post_data['is_special'] ? "special-enquiry-posted" : "general-enquiry-received";
			$this->McCarthy->processDealershipMessage($this->config->item('siteid'), $post_data, $brand, base_url() . "/thankyou/$brand/$after_msg");
		}

		
		$data['special'] = $this->McCarthy->getSpecial($special_id);
		$data['dealerships'] = $this->McCarthy->getDealershipByCoys(array($data['special']->dealercoynumber));
		$data['brand'] = $brand;
		$this->load->view($brand . '/dealer-network', $data);
	}

	public function dealerships($brand, $special_brand = '', $special_id = '', $title_base64 = '') {


		if ($post_data = $this->input->post(null, true)) {
			$post_data['is_special'] = 0;

			//available if this is a specials enquiry.
			if ($special_brand && $special_id && $title_base64) {
				$post_data['is_special'] = 1;
				$post_data['special_brand'] = $special_brand;
				$post_data['special_id'] = $special_id;
				$post_data['special_title'] = base64_decode($title_base64);
			}

			$after_msg = $post_data['is_special'] ? "special-enquiry-posted" : "general-enquiry-received";
			$this->McCarthy->processDealershipMessage($this->config->item('siteid'), $post_data, $brand, base_url() . "/thankyou/$brand/$after_msg");
		}

		
		$data['dealerships'] = $this->McCarthy->getDealershipByCoys($this->config->item('coynumbers'));
		$data['brand'] = $brand;
		$this->load->view($brand . '/dealer-network', $data);
	}

	public function blogs($brand) {
		$data['blog_entries'] = $this->McCarthy->getBlogByBrand($brand);
		$data['brand'] = $brand;
		$this->load->view($brand . '/blog', $data);
	}

	public function about($brand) {
		$data['results'] = $this->McCarthy->getBlogByBrand($brand);
		$data['brand'] = $brand;
		$this->load->view($brand . '/about', $data);
	}

	public function service($brand, $coynumber) {
		if ($post_data = $this->input->post(null, true)) {
			$this->McCarthy->processServiceBooking($this->config->item('siteid'), $post_data, $brand, base_url() . "thankyou/$brand/service-booking-made/");
		}

		$data['brand'] = $brand;
		$data['coynumber'] = $coynumber;
		$data['dealerships'] = $this->McCarthy->getDealershipsByBrand($brand);
		$this->load->view($brand . '/book-service', $data);
	}

	public function terms($brand) {

		$data['brand'] = $brand;
		$this->load->view($brand . '/terms-conditions', $data);
	}

	public function parts($brand, $coynumber = null) {
		if ($post_data = $this->input->post(null, true)) {
			$this->McCarthy->processPartsRequest($this->config->item('siteid'), $post_data, $brand, base_url() . "thankyou/$brand/parts-request-sent/");
		}

		$data['brand'] = $brand;
		$data['coynumber'] = intval($coynumber);
		$data['dealerships'] = $this->McCarthy->getDealershipsByBrand($brand);
		$this->load->view($brand . '/parts', $data);
	}

	public function testdrive($brand, $mid) {
		if ($post_data = $this->input->post(null, true)) {
			$post_data['mid'] = $mid?:intval($model); //from model drodown
			$this->McCarthy->processTestDrive($this->config->item('siteid'), $post_data, $brand, base_url() . "thankyou/$brand/testdrive-booked/");
		}

		$data['brand'] = $brand;
		$data['mid'] = $mid;
		$data['dealerships'] = $this->McCarthy->getDealershipsByBrand($brand);
		$this->load->view($brand . '/book-test-drive', $data);
	}

	function service_information($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function settlement($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function thankyou($brand, $keyword = '') {
		$data = array(
			'brand' => $brand,
			'page_title' => "Thank you!",
			'content_title' => "Thank you, your enquiry was submitted!",
			'content' => "Thank you, your request has been submitted, we will be in touch shortly.",
		);

		$this->load->view('includes/blank', $data);
	}

	public function maintenance($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function breakdown($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function shortfall_protection($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function smart_standard_elite($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;

		$this->load->view('includes/blank', $data);
	}

	public function veridot($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function xsure($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function insurance($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function instalment($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function lease($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function takeabreak($brand) {
		$data = $this->McCarthy->getContent($brand, __FUNCTION__);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}

	public function content($brand, $slug, $id = null) {
		$data = $this->McCarthy->getContent($brand, $slug, $id);
		$data['brand'] = $brand;
		$this->load->view('includes/blank', $data);
	}


	/**
	todo: Add mailing functionality here...
	 */
	private function _reportBug($hint) {
		die("Error:" . $hint);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */