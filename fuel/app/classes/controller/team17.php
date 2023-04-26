<?php
use \Model\ColorDBModel;
class Controller_team17 extends Controller_Template
{
	
	public function action_index()
	{
        $data = array();
		$this->template->style = ('home.css');
		$this->template->heading = ('ColorPalettePro Homepage');
		$this->template->content = View::forge('team17/index', $data);
	}

	
	public function action_about()
	{
		$data = array();
		$this->template->style = ('about.css');
		$this->template->heading = ('Meet Our Team');
		$this->template->content = View::forge('team17/about', $data);
		
	}
	public function action_table()
	{
		$data = array(
			'colors' => ColorDBModel::read_colors(),
            'color_count' => ColorDBModel::color_count()
		);

		$submittedInit = "FALSE";
		if (isset($_POST['numRows'])){
			$submittedInit = "TRUE";
			$rowCheck = 'false';
			$rowCount = $_POST['numRows'];
			if(is_numeric($rowCount) && $rowCount > 0 && $rowCount < 27){
				$rowCheck = 'true';
			}
		}

		if (isset($_POST['numColors'])){
			$submittedInit = "TRUE";
			$colorCheck = 'false';
			$colorCount = $_POST['numColors'];
			if(is_numeric($colorCount) && $colorCount > 0 && $colorCount < 11){
				$colorCheck = 'true';
			}
		}

		if (isset($_POST['colorSelect'])){
			$selectedColors = $_POST['colorSelect'];
			$data['selColors'] = $selectedColors;
		}

		if (isset($_POST['colorChoice'])){
			$selectedColors = $_POST['colorChoice'];
			$data['colChoice'] = $selectedColors;
		}

		if($submittedInit == "TRUE"){
			if ($rowCheck == 'true' && $colorCheck == 'true'){
				$data['val'] = "TRUE";
				$data['rowCnt'] = $rowCount;
				$data['colorCnt'] = $colorCount;
			} else {
				$data['val'] = "FALSE";
			}
		}

		if (isset($_POST['add-color-name']) && isset($_POST['add-color'] )&& isset($_POST['add-new'])) {
            ColorDBModel::add_color($_POST['add-color-name'], $_POST['add-color']);
        }

		if (isset($_POST['delete-color-name']) && isset($_POST['delete-color'] )) {
            ColorDBModel::delete_colors($_POST['delete-color-name']);
        }
		
		if (isset($_POST['edit-color-id']) && isset($_POST['edit-color']) && isset($_POST['edit'])) {
            ColorDBModel::edit_colors($_POST['edit-color-id'], $_POST['edit-color']);
        }

		$this->template->style = ('table.css');
		$this->template->heading = ('Color Picking Table');
		$this->template->content = View::forge('team17/table', $data);
	}

}
?>