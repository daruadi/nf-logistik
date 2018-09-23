<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	protected function render_breadcrumb($pages = [])
	{
		if(empty($pages))
			return;

		$this->mybreadcrumb->add('Home', base_url());
		foreach ($pages as $page_name => $url) {
			$this->mybreadcrumb->add($page_name, $url);
		}

		return $this->mybreadcrumb->render();
	}
}
