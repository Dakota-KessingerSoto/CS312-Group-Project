<?php

class Controller_M1 extends Controller_Template
{

	public function action_index()
	{
        $this->template = View::forge("TemplateGroup");
		$this->template->title="Team 17";
		$this->template->pg="Team 17";
		$this->template->content = View::forge('team17/index');
	}

}
?>
