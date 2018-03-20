<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 30.01.2018
 * Time: 1:45
 */

namespace app\controllers;

use app\models\Feedback;

use yii\web\Controller;


class FormController extends Controller {
	public function actionSave() {
		$model  = new Feedback();
		$method = $_SERVER['REQUEST_METHOD'];

		if ( $method == 'GET' ) {
			$name  = $_GET['name'];
			$phone = $_GET['phone'];
		}

		if ( $method == 'POST' ) {
			$name  = $_POST['name'];
			$phone = $_POST['phone'];
		}

		$model->name  = $name;
		$model->phone = $phone;

		$model->save();
	}

}
