<?
class Controller_Main extends Controller
{
	function action_index()
	{	
		$arResult = array(
			"main"=>"active",
			"title" =>"Решение задач для соискателей"
		);
		$this->view->generate('main_view.php', 'template_view.php', $arResult);
	}
}