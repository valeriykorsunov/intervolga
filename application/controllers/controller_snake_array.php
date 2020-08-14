<?
class Controller_Snake_array extends Controller
{
	function action_index()
	{
		$data = array("snake_array"=>"active");
		$this->view->generate('snake_array_view.php', 'template_view.php', $data);
	}
}