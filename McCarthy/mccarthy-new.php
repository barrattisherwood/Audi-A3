<?php

if (!stristr($_SERVER['SERVER_NAME'], '.co.za')) {
	define('CMSBASE', 'http://stagingserver.co.za/');
} else {
	define('CMSBASE', 'http://stagingserver.co.za/');
}

class McCarthy {

	public function __construct($ci) {

		$this->ci = $ci;
		$this->db = $this->ci->db;
		$this->navigation = $this->getContentIndex();

	}

	function contentUrl($id) {
		if (!$id) {
			return '/';
		}

		$navigation = $this->navigation[$id];
		return $navigation->seo_url ? '/' . preg_replace('@^/@', '', $navigation->seo_url) : "/content/{$navigation->brand}/{$navigation->slug}/{$navigation->id}";
	}

	function Image($brand, $src) {
		return ($src!='' && $src!='noimage') ? $src : "/img/$brand/no-image.jpg";
	}

	function ShopImageUrl($coynumber) {
		return CMSBASE . "photos/shopfronts/$coynumber.jpg";
	}

	function ShowTime($hour) {
		$hour = intval($hour);
		return "$hour:00";
	}

	function showFooterAds($brand) {

		$path = $this->ci->config->item('special_banners_299x154_path') . "$brand/";
		$ads = $this->ci->config->item('special_banners_299x154');

		foreach ($ads[$brand] as $ad) {

			echo '<div class="col-md-3 col-sm-3 col-xs-6 special-block first">
            <a href="' . ($ad['id'] == 0 ? $ad['url'] : $this->contentUrl($ad['id'])) . '" class="special-block" style="background: url(' . $path . $ad['filename'] . ') no-repeat center center;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
              <span class="title">' . $ad['title'] . '</span>
              <span class="view-more-background"></span>
              <span class="view-more">VIEW MORE</span>
            </a><!-- //.special-block -->
          </div><!-- //.col-md-3 col-sm-3 col-xs-6 special-block -->';
		}
	}

	function getContentIndex($siteid = null) {
		$data = array();
		if (is_numeric($siteid)) {
			$this->db->where('siteid', $siteid);
		}

		$result = $this->db->get('content');
		foreach ($result->result() as $content) {
			$data[$content->id] = $content;
		}
		return $data;
	}

	function getSites() {
		$result = $this->db->get('sites');
		foreach ($result->result() as $content) {
			$data[$content->id] = $content;
		}
		return $data;
	}

	public function getContent($brand, $slug, $id) {
		$this->db->where("`id` = " . (int) $id . " or (`slug` = '$slug'  and `brand` = '$brand')");
		$this->db->where('published', 1);
		$this->db->limit(1);
		$result = $this->db->get('content');
		foreach ($result->result_array() as $content) {
			return $content;
		}
	}

	public function getBlogByBrand($coynumbers) {
		$this->db->select('*');
		$this->db->where('is_blog_content', 1);
		$this->db->where('siteid', $this->ci->config->item('siteid'));
		$result = $this->db->get('content');
		$data = array();

		foreach ($result->result() as $obj) {
			$data[] = $obj;
		}

		return $data;
	}

	public function Price($brand, $model_keyword) {
		$price = 'POA';

		$model_ids = $this->ci->config->item('model_keywords');

		if ($model_keyword || is_int($model_ids[$brand][$model_keyword]['mid'])) {
			$mid = intval($model_ids[$brand][$model_keyword]['mid']);
			$this->db->where('mid', $mid);
			$this->db->limit(1);
			$result = $this->db->get('new');
			foreach ($result->result() as $price) {
				$price = 'R ' . number_format($price->fretailpriceincl);
				break;
			}

		}

		return $price;
	}

	public static function bookingReasonDropdown() {
		return '<select id="service_type" name="service_type" required=""><option value="">Please indicate</option><option value="Annual">Scheduled Annual Service</option><option value="car_problem">Problem with Car</option></select>';
	}

	public static function bookingTimeDropDown($name, $from = 7, $to = 17, $call2action = 'Please select', $selected = null) {
		$html = '<select id="' . $name . '" name="' . $name . '">
        <option value="">' . $call2action . '</option>';

		for ($i = $from; $i <= $to; $i++) {
			$html .= '<option value="' . $i . ':00"' . ($selected == $i ? ' selected' : '') . '>' . $i . ':00</option>';
		}

		$html .= '</select>';

		return $html;
	}

	public static function bookingDateDropdown($name, $skip_sunday = true) {
		$name = $name ?:'drop_off_date';
		$html = '<select name="'.$name.'" required>';

		//i threw this together on the nissan site to get a quick calendar dropdown. - Percy
		$calendar_mnths = 0;
		$months = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$current_month = date('n');
		$year = date('Y');
		$mid_mnth_ts = strtotime("15 {$months[$current_month]} " . $year);
		while ($calendar_mnths < 3) {
			$first_day = $calendar_mnths == 0 ? (date('H') > 16 ? date('j') + 1 : date('j')):1;
			$year = date('Y');
			$mid_mnth_ts = $mid_mnth_ts + ($calendar_mnths + 32 * 24 * 3600);
			$month_num = $calendar_mnths + $current_month;
			for ($day = $first_day; $day < 32; $day++) {
				if (checkdate($month_num, $day, $year)) //if date is valid
				{
					$mid_day = strtotime("12:00 {$months[$month_num]} $day $year"); // find date of this day at mid day
					$dow = date('l', $mid_day);
					if ('Sunday' != $dow || $skip_sunday === true) {
						$html .= "<option value='$dow {$months[$month_num]} $day $year'>$dow {$months[$month_num]} $day $year</option>";
					}
				}
			}

			$calendar_mnths++;
		}

		$html .= "</select>";

		return $html;
	}

	public function dealershipsDropDown($selected_coynumber = null, $attributes = '') {
		$dealerships = $this->getDealershipByCoys($this->ci->config->item('coynumbers'));
		$html = '<select name="coynumber" id="'.($attributes['id'] ? : 'coynumber').'" '.($attributes['class'] ? 'class="'.$attributes['class'].'"': '').'>
                        <option value="">Select nearest dealership</option>';
		foreach ($dealerships as $brand => $group) {
			foreach ($group as $coynumber => $dealership) {
				$html .= "<option value='$dealership->coynumber'" . ($selected_coynumber == $coynumber ? ' selected' : '') . ">$dealership->dealername</option>";
			}
		}
		$html .= '</select>';
		return $html;
	}

	public function modelDropdown($brand, $umodel) {
		$html = '<select name="model" id="model" required>
                <option value="">Select your desired vehicle</option>';

		foreach ($this->ci->config->item('model_keywords') as $kbrand => $models) {
			if ($kbrand == $brand) {
				foreach ($models as $model_keyword => $model) {
					$html .= "<option value='$model_keyword'" . ($umodel == $model_keyword ? ' selected' : '') . ">$model[name]</option>";
				}
			}
		}

		$html .= '</select>';

		return $html;
	}

	public function getNewVehicles($brand) {
		$this->db->select('*');
		$brand_mids = $this->ci->config->item('model_mids');
		$this->db->where_in('mid', $brand_mids[$brand]);
		$this->db->limit($this->ci->config->item('results_per_page'));
		$result = $this->db->get('new');
		$data = array();

		foreach ($result->result() as $obj) {
			$data[$obj->vid] = $obj;
		}

		return $data;
	}

	public function getUsedVehicles($brand, $demo = false, $offset = 0) {
		$dealerships = $this->getDealershipsByBrand($brand);

		foreach ($dealerships[$brand] as $dealership) {
			$coynumbers[] = $dealership->coynumber;
		}

		$this->db->select('sql_calc_found_rows *', false);
		$this->db->where_in('sdealercoy', $coynumbers);

//we get these directly from url args: oversight forced this workaround - percy.
		$arguments = $this->ci->input->get(null, true);
		if($arguments)
		{
			if($arguments['sortby'])
			{
				$parts = explode('-', $arguments['sortby']);

				if(in_array($parts[0], array('princl')) && in_array($parts[1], array('asc', 'desc')))
				{
					$this->db->order_by($parts[0], $parts[1]);
				}
			}

			if($arguments['coy'])
			{
				$coynumber = intval($arguments['coy']);

				if($coynumber)
				{
					$this->db->where('sdealercoy', $coynumber);
				}
			}

			if($arguments['brand-filter'])
			{
				$brand = preg_replace('@[^a-z0-9\s-]@i', '', $arguments['brand-filter']);

				if($brand)
				{
					$this->db->where('mmbrand', $brand);
				}
			}

			if($arguments['series-filter'])
			{
				$series = preg_replace('@[^a-z0-9\s-]@i', '', $arguments['series-filter']);

				if($series)
				{
					$this->db->where('mmseries', $series);
				}
			}
		}


		if ($demo) {
			$this->db->where('type', 'demo');
		}

		$this->db->limit($this->ci->config->item('results_per_page'), $offset * $this->ci->config->item('results_per_page'));
		$result = $this->db->get('used');
		$data = array();

		foreach ($result->result() as $obj) {
			$data['result_set'][$obj->vid] = $obj;
		}

		$data['result_size'] = $result->num_rows();

		$result = $this->db->query("select found_rows() as total");
		foreach ($result->result() as $obj) {
			$data['result_total'] = $obj->total;
		}

		return $data;
	}
	
	
	
	public function getUsedVehiclesByBrand($brand, $demo = false, $offset = 0) {
		$dealerships = $this->getDealershipsByBrand($brand);

		foreach ($dealerships[$brand] as $dealership) {
			$coynumbers[] = $dealership->coynumber;
		}

		$this->db->select('sql_calc_found_rows *', false);
		$this->db->where_in('mmbrand', $brand);
		$this->db->where_in('sdealercoy', $coynumbers);

//we get these directly from url args: oversight forced this workaround - percy.
		$arguments = $this->ci->input->get(null, true);
		if($arguments)
		{
			if($arguments['sortby'])
			{
				$parts = explode('-', $arguments['sortby']);

				if(in_array($parts[0], array('princl')) && in_array($parts[1], array('asc', 'desc')))
				{
					$this->db->order_by($parts[0], $parts[1]);
				}
			}

			if($arguments['coy'])
			{
				$coynumber = intval($arguments['coy']);

				if($coynumber)
				{
					$this->db->where('sdealercoy', $coynumber);
				}
			}

			if($arguments['brand-filter'])
			{
				$brand = preg_replace('@[^a-z0-9\s-]@i', '', $arguments['brand-filter']);

				if($brand)
				{
					$this->db->where('mmbrand', $brand);
				}
			}

			if($arguments['series-filter'])
			{
				$series = preg_replace('@[^a-z0-9\s-]@i', '', $arguments['series-filter']);

				if($series)
				{
					$this->db->where('mmseries', $series);
				}
			}
		}


		if ($demo) {
			$this->db->where('type', 'demo');
		}

		$this->db->limit($this->ci->config->item('results_per_page'), $offset * $this->ci->config->item('results_per_page'));
		$result = $this->db->get('used');
		$data = array();

		foreach ($result->result() as $obj) {
			$data['result_set'][$obj->vid] = $obj;
		}

		$data['result_size'] = $result->num_rows();

		$result = $this->db->query("select found_rows() as total");
		foreach ($result->result() as $obj) {
			$data['result_total'] = $obj->total;
		}

		return $data;
	}

	public function getUsedVehicle($vid) {
		$result = $this->db->query('select *, lower(brand) as brand from used, dealerships where vid=' . (int) $vid . ' limit 1');
		$data = array();

		foreach ($result->result() as $obj) {
			return $obj;
		}
	}

	function getCarByMid($mid) {
		$this->db->where('mid', $mid);
		$this->db->limit(1);
		$result = $this->db->get('new');

		foreach ($result->result() as $obj) {
			return $obj;
		}
	}

	function editDealership($coynumber, $data) {
		$coynumber = intval($coynumber);

		if ($_FILES['photo']['tmp_name']) {
			copy($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/photos/shopfronts/$coynumber.jpg");
		}

		$this->db->set($data);
		$this->db->where('coynumber', $coynumber);
		return $this->db->update('dealerships');
	}

	function bindDealerships($siteid, array $coynumbers) {
		$siteid = intval($siteid);
		foreach ($coynumbers as $coynumber) {
			$sql_vars[] = "($siteid, " . intval($coynumber) . ")";
		}

		$this->db->query("delete from site_dealerships where siteid=?", array($siteid));
		return $this->db->query("replace into site_dealerships (siteid, coynumber) values " . implode(',', $sql_vars));
	}

	function getBoundDealerships($siteid) {
		$data = array();
		$result = $this->db->query('select * from site_dealerships where siteid=?', array($siteid));
		foreach ($result->result() as $res) {
			$data[$res->coynumber] = $res;
		}

		return $data;
	}

	function _getAllModels()
	{
		$this->db->select('sbrandname');
		$this->db->select('sseriesname');
		$this->db->select('mid');
		$this->db->where_in('mid', $this->ci->midMappings());
		$this->db->order_by('sbrandname', 'asc');
		$this->db->order_by('sseriesname', 'asc');
		$this->db->group_by('sseriesname');
		$result = $this->db->get('new');
		foreach ($result->result() as $res) {
			$data[$res->mid] = "$res->sbrandname $res->sseriesname";
		}

		return $data;
	}

	function getAllDealerships($this_site_only=false) {
		$this->db->select('*');

		if($this_site_only)
		{
$this->db->where_in('coynumber', $this->ci->config->item('coynumbers'));
		}

		$this->db->order_by('dealername', 'asc');
		$result = $this->db->get('dealerships');
		foreach ($result->result() as $res) {
			$data[$res->coynumber] = $res;
		}

		return $data;
	}

	function getAllUsedBrands() {
		$result = $this->db->query('select distinct(mmbrand) from used order by mmbrand asc');
		foreach ($result->result() as $res) {
			$data[$res->mmbrand] = $res->mmbrand;
		}

		return $data;
	}

	function getDealershipByCoy($coynumber) {
		// get the details of the recipients.
		$sql = $this->db->query('SELECT * FROM dealerships WHERE coynumber=?', array($coynumber));

		foreach ($sql->result() as $res) {
			return $res;
		}
	}

	function getDealershipByCoys(array $coynumbers) {
		$str = "SELECT * FROM dealerships WHERE coynumber in(" . implode(',', array_fill(0, count($coynumbers), '?')) . ")";

		$sql = $this->db->query($str, $coynumbers);

		foreach ($sql->result() as $res) {
			$data[$res->brand][$res->coynumber] = $res;
		}

		return $data;
	}

	function processPartsRequest($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);
		$post_data['dealership_info'] = $this->getDealershipByCoy($post_data['coynumber']);

		$to = $post_data['dealership_info']->emails_parts;
		$cc = $post_data['dealership_info']->email_dp;
		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = "NEW PARTS ENQUIRY";

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['name']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('part_number', $post_data['part_number']);
		$this->db->set('make', ($post_data['make'] ?: $post_data['_variant']));
		$this->db->set('model', $post_data['model']);
		$this->db->set('year', $post_data['year']);
		$this->db->set('series', $post_data['series']);
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);
		if ($this->db->insert('leads_parts')) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject;
		$html = $this->ci->load->view('emails/parts_email_template', $post_data, true);

		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	function processPreownedEnquiry($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);

		// get the details of the recipients.
		$post_data['dealership_info'] = $this->getDealershipByCoy($post_data['coynumber']);

		//get the car details
		$post_data['offer'] = $this->getUsedVehicle($post_data['vid']);

		$to = $post_data['dealership_info']->emails_used;
		$cc = array($post_data['dealership_info']->emails_dp);
		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = 'NEW PREOWNED ENQUIRY';

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['name']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('opt_in_marketing_sms', 1);
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('newsletter', 1);
		$this->db->set('opt_in_marketing_email', 1);
		$this->db->set('vehicleid', $post_data['offer']->vid);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);
		$this->db->set('car_info', json_encode($post_data['offer']));
		if ($this->db->insert('leads_preowned_vehicles')) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject; //for email template
		$html = $this->ci->load->view('emails/used_car_email_template', $post_data, true) . $this->db->_error_message();

		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	function processNewCarEnquiry($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);

		// get the details of the recipients.
		$post_data['dealership_info'] = $this->getDealershipByCoy($post_data['coynumber']);

		$to = $post_data['dealership_info']->emails_used;
		$cc = array($post_data['dealership_info']->emails_dp);
		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = 'BRAND NEW VEHICLE ENQUIRY';

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['name']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('opt_in_marketing_sms', 1);
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('newsletter', 1);
		$this->db->set('opt_in_marketing_email', 1);
		$this->db->set('vehicle', $post_data['vehicle']);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);
		if ($this->db->insert('leads_new_vehicles')) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject; //for email template
		$html = $this->ci->load->view('emails/new_car_email_template', $post_data, true) . $this->db->_error_message();

		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	function processDealershipMessage($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);
		$post_data['dealership_info'] = $this->getDealershipByCoy($post_data['coynumber']);

		$to = $post_data['dealership_info']->emails_dp;
		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = 'NEW CONTACT FORM SUBMISSION';

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['name']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('message', $post_data['message']);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('msg_hash', md5($post_data['message']));
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);

		if ($post_data['is_special']) {
			$this->db->set('special_title', $post_data['special_title']);
			$this->db->set('special_brand', $post_data['special_brand']);
			$this->db->set('special_id', $post_data['special_id']);
		}

		if ($this->db->insert($post_data['is_special'] ? 'leads_contact_specials' : 'leads_contact')) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject;
		$html = $this->ci->load->view('emails/contact_email_template', $post_data, true) . $this->db->_error_message();

		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	function processTestDrive($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);
		$post_data['dealership_info'] = $this->getDealershipByCoy($post_data['coynumber']);

		//get the car
		if(!$post_data['mid'])
			{
				$mids = $this->ci->config->item('model_keywords');
		$mid = $mids[$brand][$post_data['model']]['mid'];
	}else{
		$mid = $post_data['mid'];
	}

		$car_data = $this->getCarByMid($mid);

		$post_data['make'] = $car_data->sbrandname;
		$post_data['model'] = $car_data->smodelname;
		$post_data['series'] = $car_data->sseriesname;
		$post_data['car_to_test'] = $car_data->sseriesname;

		$to = $post_data['dealership_info']->emails_new;
		//$car_type_recipient = $post_data['test_drive'] == 'preowned' ? 'dealership_used_vehicles_emails' : 'dealership_new_vehicles_emails';
		//$to = 'percyla@gmail.com'; //$post_data['dealership_info']->$car_type_recipient;
		$cc = $post_data['dealership_info']->emails_dp;
		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = 'NEW TEST DRIVE BOOKING (' . ucfirst($post_data['test_drive']) . ')';

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['name']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('test_drive_date', $post_data['test_drive_date']);
		$this->db->set('test_drive_time', @$post_data['test_drive_time']);
		$this->db->set('make', $car_data->sbrandname);
		$this->db->set('model', $car_data->smodelname);
		$this->db->set('year', 0);
		$this->db->set('car_type', $post_data['car_type']);
		$this->db->set('series', $car_data->sseriesname);
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);
		if ($this->db->insert('leads_bookings_test_drive')) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject;
		$html = $this->ci->load->view('emails/bookings_testdrive_email_template', $post_data, true) . $this->db->_error_message();
		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	function processServiceBooking($siteid, array $post_data, $brand, $after) {
		//form submitted.
		$post_data['coynumber'] = intval($post_data['coynumber']);

		// get the details of the recipients.
		$sql = $this->db->query('SELECT * FROM dealerships WHERE coynumber=?', array($post_data['coynumber']));

		foreach ($sql->result() as $res) {
			$post_data['dealership_info'] = $res;
		}

		//save to db
		foreach ($sql->result() as $res) {
			$post_data['dealership_info'] = $res;
		}

		$to = $post_data['dealership_info']->emails_service;
		$cc = $post_data['dealership_info']->emails_dp;

		$from = 'noreply@' . $this->ci->config->item('domain');
		$subject = 'NEW SERVICE BOOKING';

		//save to db
		$this->db->set('name', $post_data['name']);
		$this->db->set('surname', $post_data['surname']);
		$this->db->set('email', $post_data['email']);
		$this->db->set('cellno', $post_data['cellno']);
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->set('coy', $post_data['coynumber']);
		$this->db->set('drop_off_date', $post_data['drop_off_date']);
		$this->db->set('drop_off_time', $post_data['drop_off_time']);
		$this->db->set('reg_number', $post_data['reg_number']);
		$this->db->set('make', $post_data['make']);
		$this->db->set('model', $post_data['model']);
		$this->db->set('year', $post_data['year']);
		$this->db->set('series', $post_data['series']);
		$this->db->set('service_type', $post_data['service_type']);
		$this->db->set('requires_lift', $post_data['requires_lift']);
		$this->db->set('fid', time());
		$this->db->set('siteid', $siteid);
		$this->db->insert('leads_bookings_service');
		if ($this->db->insert_id()) {
			$post_data['leadID'] = $this->db->insert_id();
		} else {
			$to = 'percyl@cbrmarketing.co.za';
			$cc = 'percyl@cbrmarketing.co.za';
			$subject = "[{$post_data['coynumber']}]" . '[NOT SAVED] ' . $subject;
		}

		$post_data['title'] = $subject;
		$html = $this->ci->load->view('emails/bookings_email_template', $post_data, true) . $this->db->_error_message();
		$this->DispatchEmail($to, $from, $cc, $subject, $html, $after);
	}

	public function getSpecials($offset = 0) {
		$this->db->select('sql_calc_found_rows *', false);
		$this->db->where('start <=', date('Y-m-d'));
		$this->db->where('end >=', date('Y-m-d'));
		$this->db->where_in('dealercoynumber', $this->ci->config->item('coynumbers'));
		$this->db->limit($this->ci->config->item('results_per_page'), (int) $offset);
		$result = $this->db->get('specials');
		$data = array();

		foreach ($result->result() as $obj) {
			$data['result_set'][$obj->specialid] = $obj;
		}

		$data['result_size'] = $result->num_rows();

		$result = $this->db->query("select found_rows() as total");
		foreach ($result->result() as $obj) {
			$data['result_total'] = $obj->total;
		}

		return $data;
	}

	public function getSpecial($id) {
		$this->db->select('*');
		$this->db->where('start <=', date('Y-m-d'));
		$this->db->where('end >=', date('Y-m-d'));
		$this->db->where('specialid', $id);
		$this->db->limit(1);
		$result = $this->db->get('specials');
		$data = array();

		foreach ($result->result() as $obj) {
			return $obj;
		}
	}

	function DispatchEmail($to, $from, $cc, $subject, $body, $after = null, $attachments = array()) {
		if(!empty($to))
			{
				if(!is_array($to))
		{
			$to = preg_split('#[^a-z0-9.@_-]+#i', $to);
		}
	}

		if(!empty($cc))
			{
				if(!is_array($cc))
		{
			$to = preg_split('#[^a-z0-9.@_-]+#i', $to);
		}
	}


		$this->ci->load->library('email', $this->ci->config->item('email_config'));
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->to($to);
		if (isset($cc)) {
			$this->ci->email->cc($cc);
		}

		if (isset($bcc)) {
			$this->ci->email->bcc($bcc);
		}

		if (is_array($attachments)) {
			foreach ($attachments as $attachment) {
				$this->ci->email->attach($attachment);
			}
		}
		$this->ci->email->from($from);
		$this->ci->email->subject($subject);
		$this->ci->email->message($body);
		$this->ci->email->set_alt_message(strip_tags($body));

		if ($this->ci->email->send()) {
			if (@$thank_u_email) {
				$this->ci->email->clear();
				$this->ci->email->to($thank_u_email['to']);
				if ($thank_u_email['attachments']) {
					foreach ($thank_u_email['attachments'] as $attachment) {
						$this->ci->email->attach($attachment);
					}
				}
				$this->ci->email->from($from);
				$this->ci->email->subject($thank_u_email['subject']);
				$this->ci->email->message($thank_u_email['body']);
				$this->ci->email->set_alt_message(strip_tags($thank_u_email['body']));

				//send thank you to the submitter
				$this->ci->email->send();
			}

			//redirect to thank you if any
			if (!empty($after)) {
				redirect($after);
			} else {
				redirect(base_url() . 'thankyou/submission-sent/'); // just the default.
				//echo "<script>alert('Thank you, your submission has been made.')</script>"; //what else is there to be done, really?
			}

		} else {
			die("<div style='width:50%;padding:24px;text-align:center; margin:24px auto;font-family:arial;border:solid'>We could not send your request. Something went wrong. Please <a href='javascript:history.go(-1)'>try again</a>, or <a href='/'>try later</a></div>");
		}

	}

	public function getDealershipsByBrand($brand) {

		$brand = strtolower($brand);
		$this->db->select('*');
		$this->db->select('lower(brand) as brand');
		//$this->db->where('brand', ($brand));
		//$this->db->or_like('brand', ($brand));
		$result = $this->db->get('dealerships');
		$data = array();

		foreach ($result->result() as $obj) {
			//$data[$obj->brand][$obj->coynumber] = $obj;
			$data[$brand][$obj->coynumber] = $obj;
		}

		return $data;
	}

	public function getDealerships() {
		$this->db->select('*');
		$this->db->select('lower(brand) as brand');
		$result = $this->db->get('dealerships');
		$data = array();
		foreach ($result->result() as $obj) {
			$obj->brand = strtolower($obj->brand);
			$data[$obj->brand][$obj->coynumber] = $obj;
		}

		return $data;
	}

	public function getDealership($coynumber) {
		$this->db->select('*');
		$this->db->select('lower(brand) as brand');
		$this->db->where('coynumber', $coynumber);
		$this->db->limit(1);
		$result = $this->db->get('dealerships');
		$data = array();
		$data = $result->result();
		return $data[0];
	}

	public static function DealershipUrl($branch, $slug = '') {
		return "/dealership/$branch->coynumber/";
	}

	public static function ServiceBookingUrl($brand, $coynumber = '') {
		return "/service/$brand/$coynumber";
	}

	public static function ContactUrl($brand, $coynumber = '') {
		return self::DealershipsUrl($brand, $coynumber); //dealership network and contact us are same thing.
	}



	public static function ContactUrlStandAlone($brand, $coynumber)
	{
		return "/contact/$brand/$coynumber";
	}

	public static function TermsandConditionsUrl($brand) {
		return "/terms/$brand/";
	}

	public static function BrandUrl($brand, $coynumber = '') {

		return "/brand/$brand/$coynumber";
	}

	public static function TrucksUrl($brand) {
		return "/new/mercedes-benz/actros/";
	}

	public static function NewVehiclesUrl($brand) {
		return "/new/$brand/new-vehicles/";
	}

	public static function NewCarSeriesUrl($brand, $model_keyword) {
		return "/series/$brand/$model_keyword/";
	}

	public static function UsedVehiclesUrl($brand, $coynumber = null) {
		return "/used/$brand/" . ($coynumber ? $coynumber . "/" : '');
	}

	public static function DemosUrl($brand, $coynumber = null) {
		return "/demo/$brand/" . ($coynumber ? $coynumber . "/" : '');
	}

	public static function SpecialsUrl($brand) {
		return "/specials/$brand/";
	}

	public static function SpecialUrl($id) {
		return "/special/$id";
	}

	public static function DealershipsUrl($brand, $coynumber = '') {
		return "/dealerships/$brand/$coynumber";
	}

	public static function AboutUrl($brand) {
		return "/about/$brand/";
	}

	public static function BlogUrl($brand) {
		return "/blogs/$brand";
	}

	public static function BlogEntryUrl($brand, $blog) {
		return "/blog/$brand/$blog->slug/$blog->id";
	}

	public function UsedVehicleDetailUrl($vehicle, $brand) {
		return "/preowned/$brand/$vehicle->vid";
	}

	public static function NewCarUrl($brand, $model_keyword) {
		return "/new/$brand/$model_keyword/";
	}

	public static function TestDriveUrl($brand, $model_keyword = '') {
		return "/testdrive/$brand/" . ($model_keyword ? "$model_keyword/" : '');
	}

	public function BrochureUrl($brand, $model_keyword) {
		$data = $this->ci->config->item('model_keywords');
		return "/downloads/{$data[$brand][$model_keyword]['brochure']}";
	}

	public static function BrochuresUrl($brand) {
		return "/brochures/$brand/";
	}

	public static function SiteMapUrl() {
		return "/sitemap/";
	}

	public static function PartsUrl($brand, $coynumber = '') {
		return "/parts/$brand/$coynumber";
	}

	public static function FinancialServicesUrl($brand, $coynumber = null) {
		return "/financial-services/$brand/$coynumber";
	}

	function EnquireSpecialUrl($obj, $brand) {
		return "/specials-enquiry/$brand/$obj->specialid";
	}

	function DealershipsUrlForSpecials($obj, $brand) {
		return self::DealershipsUrl($brand) . $obj->brand . '/' . $obj->dealercoynumber . '/' . base64_encode($obj->title);
	}

	function ShowResults($data, $template, $brand = '', $directives = array()) {
		$find = $replace = array();

		//find all template keys
		preg_match_all('@{{([a-zA-Z0-9_#]+)}}@', $template, $keys);

		foreach ($keys[1] as $key) {
			$find[] = '{{' . $key . '}}';
		}

		$counter = 0;
		foreach ($data as $id => $entity) {
			$counter++;
			$replace = array();
			foreach ($keys[1] as $key) {
				//special formatting
				switch ($key) {
					case 'princl':
					case 'kms':
						$entity->$key = str_replace('.00', '', $entity->$key);
						$entity->$key = @number_format($entity->$key);
						break;

					case 'img1':
					case 'img2':
					case 'img3':
					case 'img4':
					case 'img5':
						$entity->$key = ($entity->$key == '' || $entity->$key == 'noimage') ? '/img/' . $brand . '/no-image.jpg' : $entity->$key;

						break;

				}

				if (substr($key, 0, 1) == '#') {
					$func = substr($key, 1);
					$entity->$key = self::$func($entity, $brand);

				}

				$replace[] = $entity->$key;
			}
			echo str_replace($find, $replace, $template);

			if (isset($directives['every'])) {
				if ($counter % $directives['every'] == 0) {
					echo $directives['html'];
				}

			}

		}
	}

	function Paginator($base_url, $data) {
		$this->ci->load->library('pagination');

		$config['base_url'] = $base_url;
		$config['total_rows'] = $data['result_total'];
		$config['per_page'] = $this->ci->config->item('results_per_page');

		$this->ci->pagination->initialize($config);

		return $this->ci->pagination->create_links();
	}

	function PaginateCustom($total_results, $results_per_page, $offset, $max_pages_shown=5)
    {
        $pagination = '';
        $offset = (int)$offset;

        if($total_results > $results_per_page)
        {
            $total_paginations = floor($total_results/$results_per_page);
            $pagination .= "<style>.pagination ul{margin:12px auto;}.pagination a{text-decoration:none}.pagination a:hover{text-decoration:underline}
            } .pagination .current-page{font-weight:bold; color:#000; font-size:130%}.pagination ul li{vertical-align:middle; display:inline; list-style:none; padding:6px 10px; border:solid 1px #cacaca; margin:2px}</style><div class='pagination'><ul>";

            for($i=0; $i <= $total_paginations; $i++)
            {
                $no_offset = preg_replace('@&?offset=\d+@', '', $_SERVER['REQUEST_URI']);
                $uri = preg_replace('@\?+@', '?', $no_offset . (strstr($no_offset, '?') ? '&' : '?') ."offset=$i");
                $next_uri = preg_replace('@\?+@', '?', $no_offset . (strstr($no_offset, '?') ? '&' : '?') ."offset=".($offset+1));
                $previous_uri = preg_replace('@\?+@', '?', $no_offset . (strstr($no_offset, '?') ? '&' : '?') ."offset=".($offset-1));
                
                		if($i == $total_paginations && $i != $offset){
                    $pagination .= "<li><a href='".$next_uri."'>Next &gt;</a></li>";
                    break;
                }elseif($i == 0 && $offset > 0){
                    $pagination .= "<li><a href='".$previous_uri."'>&lt; Previous</a></li>";
                }elseif($max_pages_shown > $i) {
                    $pagination .= ($i!=$offset ? '<li><a href="'.$uri.'">'.(1+$i).'</a></li>': '<li class="current-page">'.(1+$i).'</li>');
                }
            }

            $pagination .= "</ul></div>";
        }

        return $pagination;
}
}