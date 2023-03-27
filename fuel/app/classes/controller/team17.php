<?php
class Controller_team17 extends Controller_Template
{
	
	public function action_index()
	{
        $data = array();
		$this->template->style = ('style.css');
		$this->template->heading = ('Team Index Page');
		$this->template->content = View::forge('team17/index', $data);
	}

	
	public function action_about()
	{
		$data = array();
		$this->template->style = ('aboutstyle.css');
		$this->template->heading = ('About Us');
		$this->template->content = View::forge('team17/about', $data);
		
	}
	public function action_table()
	{
        $data = array();
		$this->template->style = ('style.css');
		$this->template->heading = ('Team Table Page');
		$this->template->content = View::forge('team17/table', $data);
	}
}
?>