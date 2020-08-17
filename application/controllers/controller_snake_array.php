<?
class Controller_Snake_array extends Controller
{
	function __construct()
	{
		$this->model = new Model_Snake_array();
		$this->view = new View();
	}

	function action_index()
	{
		$arResult = array(
			"snake_array"=>"active",
			"title" => "Вывести массив змейкой на php. Размеры массива M*N."
		);
		
		$arResult["snake"] = $this->model->get_data();
 
		$this->view->generate('snake_array_view.php', 'template_view.php', $arResult);

	}

	// результат для $_POST
	/*
	function()
	{

	}
	*/
}