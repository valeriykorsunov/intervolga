<?
namespace Controllers;

use Models\User;

Class userController extends Controller
{
	function __construct($nameController)
	{
		parent::__construct($nameController);

		if(USER["ADMIN"] === true)
		{			
			$this->view->vData["menuSection"] = array(
				array(
					"SORT"=>100,
					"NAME"=>"Список Пользователей",
					"URL"=>"/user/list/"
				),
				array(
					"SORT"=>100,
					"NAME"=>"Добавить Пользователя",
					"URL"=>"/user/addUser/"
				),
			);
		}
	}

	function actionLogout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

	function actionLogin()
	{
		$this->view->vData["title"] = "Авторизация";

		if(USER["AUTHORIZED"] === true)
		{
			$this->view->vData["login_status"] = "access_granted";
		}
		elseif(isset($_POST['login']) || isset($_POST['password']))
		{
			$this->view->vData["login_status"] = "access_denied";
		}
		

		$this->view->render($this->dirViwe.'login');
	}

	function actionIndex()
	{
		$this->view->render($this->dirViwe.'index');
	}

	function actionlist()
	{
		$user = new User;
		$this->view->vData["userList"] =  $user ->getUserList(); 
		
		$this->view->render($this->dirViwe.'list');
	}

	function actionAddUser()
	{
		
		// $user = new User;
		// $this->view->vData["userList"] =  $user ->getUserList(); 

		$this->view->render($this->dirViwe.'addUser');
	}
	
	function actionEditUser()
	{
		
		// $user = new User;
		// $this->view->vData["userList"] =  $user ->getUserList(); 

		$this->view->render($this->dirViwe.'editUser');
	}



}