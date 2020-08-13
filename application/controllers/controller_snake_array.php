<?
class Controller_Snake_array extends Controller
{
	function action_index()
	{
		//$data = $this->model->get_data();		
		$this->view->generate('snake_array_view.php', 'template_view.php');
	}
}