<?php
class Controller_team17 extends Controller_Template
{
	
	public function action_index()
	{
        $data = array();
		$this->template->style = ('style.css');
		$this->template->heading = ('ColorPalettePro Homepage');
		$this->template->content = View::forge('team17/index', $data);
	}

	
	public function action_about()
	{
		$data = array();
		$this->template->style = ('style.css');
		$this->template->heading = ('Meet Our Team');
		$this->template->content = View::forge('team17/about', $data);
		
	}
	public function action_table()
	{
		$data = array();

		$submittedInit = "FALSE";
		if (isset($_GET['numRows'])){
			$submittedInit = "TRUE";
			$rowCheck = 'false';
			$rowCount = $_GET['numRows'];
			if(is_numeric($rowCount) && $rowCount > 0 && $rowCount < 27){
				$rowCheck = 'true';
			}
		}

		if (isset($_GET['numColors'])){
			$submittedInit = "TRUE";
			$colorCheck = 'false';
			$colorCount = $_GET['numColors'];
			if(is_numeric($colorCount) && $colorCount > 0 && $colorCount < 11){
				$colorCheck = 'true';
			}
		}

		if($submittedInit == "TRUE"){
			if ($rowCheck == 'true' && $colorCheck == 'true'){
				$data['val'] = "TRUE";
				$data['rowCnt'] = $rowCount;
				$data['colorCnt'] = $colorCount;
				$this->template->style = ('style.css');
				$this->template->heading = ('Color Picking Table');
				$this->template->content = View::forge('team17/colors', $data);
			} else {
				$data['val'] = "FALSE";
				$this->template->style = ('style.css');
				$this->template->heading = ('Color Picking Table');
				$this->template->content = View::forge('team17/table', $data);
			}
		} else {
			$this->template->style = ('style.css');
			$this->template->heading = ('Color Picking Table');
			$this->template->content = View::forge('team17/table', $data);
		}
	}
}
?>