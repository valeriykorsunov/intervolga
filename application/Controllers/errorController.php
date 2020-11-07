<?php

namespace Controllers;

class errorController extends Controller
{
	public function action404()
	{
		$this->view->render($this->dirViwe.'404');
	}
	public function actionError()
	{
		$this->view->render($this->dirViwe.'error');
	}
}
