<?php
namespace Controllers;

use System\View;
use System\App;

class loginController extends Controller
{
	
	function actionIndex()
	{
		return App::accessDenied();
		//$data["login_status"] = "";

		// if(isset($_POST['login']) && isset($_POST['password']))
		// {
		// 	$login = $_POST['login'];
		// 	$password =$_POST['password'];
			
		// 	/*
		// 	Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
		// 	Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
		// 	Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
		// 	*/
		// 	if($login=="admin" && $password=="12345")
		// 	{
		// 		$data["login_status"] = "access_granted";
				
		// 		session_start(); echo $_SESSION['admin'];
		// 		$_SESSION['admin'] = $password;
		// 		header('Location:'.$_SERVER['REQUEST_URI']);
		// 	}
		// 	else
		// 	{
		// 		$data["login_status"] = "access_denied";
		// 	}
		// }
		// else
		// {
		// 	$data["login_status"] = "";
		// }
		
		// $this->view->render($this->dirViwe.'index',$data);
	}
	
}
