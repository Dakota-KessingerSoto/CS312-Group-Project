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
		ColorDBModel::clear_colors();
		ColorDBModel::create_colors();
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
		$data = array();
		$data['error_text'] = "";
		$submittedInit = "FALSE";
		$max_colors_count = ColorDBModel::color_count();
		$data['max_colors_count'] = $max_colors_count;

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
			if(is_numeric($colorCount) && $colorCount > 0 && $colorCount <= $max_colors_count){
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
				$data['colors'] = ColorDBModel::read_colors();
				$data['color_count'] = ColorDBModel::color_count();
			} else {
				$data['val'] = "FALSE";
			}
		}

		if (isset($_POST['add-color-name']) && isset($_POST['add-color'] )&& isset($_POST['add-new'])) {
			try {
				ColorDBModel::add_color($_POST['add-color-name'], $_POST['add-color']);
				$data['colors'] = ColorDBModel::read_colors();
				$data['color_count'] = ColorDBModel::color_count();
			} catch (Exception $e) {
				$data['error_text'] = "Color Already In Table";
			}
        }

		if (isset($_POST['delete-color-id']) && isset($_POST['delete'] )) {
			ColorDBModel::delete_colors($_POST['delete-color-id']);
			$data['colors'] = ColorDBModel::read_colors();
			$data['color_count'] = ColorDBModel::color_count();
        }
		
		if (isset($_POST['edit-color-id']) && isset($_POST['edit-color']) && isset($_POST['edit'])) {
			try {
            ColorDBModel::edit_colors($_POST['edit-color-id'], $_POST['edit-color']);
			$data['colors'] = ColorDBModel::read_colors();
			$data['color_count'] = ColorDBModel::color_count();
			} catch (Exception $e) {
				$data['error_text'] = "Color Already In Table";
			}
        }

		$this->template->style = ('table.css');
		$this->template->heading = ('Color Picking Table');
		$this->template->content = View::forge('team17/table', $data);
	}

}
?>