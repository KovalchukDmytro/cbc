<?php

namespace app\controllers;

use app\models\Textarea;
use app\models\Category;
use app\models\News;
use app\models\Object;
use app\models\Review;
use app\models\Seo;
use app\models\Stock;
use Yii;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\Controller;

class SiteController extends Controller {
	public function actionIndex() {
		$seo = $this->getSEO( 'index' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$content['review'] = Review::find()->all();
		$content['news']   = News::find()->orderBy( 'id DESC' )->limit( '3' )->all();
		$content['stock']  = Stock::find()->orderBy( 'id DESC' )->limit( '3' )->all();

		return $this->render( 'index', [
			'content' => $content,
		] );
	}

	public function getSEO( $alias ) {
		$model              = Seo::find()
		                         ->where( [ 'alias' => $alias ] )
		                         ->one();
		$seo['title']       = $model->title;
		$seo['description'] = $model->description;
		$seo['h1']          = $model->h1;

		return $seo;
	}

	protected function setMeta( $title = null, $keywords = null, $description = null ) {
		$this->view->title = $title;
		$this->view->registerMetaTag( [ 'name' => 'keywords', 'content' => "$keywords" ] );
		$this->view->registerMetaTag( [ 'name' => 'description', 'content' => "$description" ] );
	}

	public function actionNews() {
		if ( empty( $_GET['alias'] ) ) {
			$seo = $this->getSEO( 'news' );
			$this->setMeta( $seo['title'], '', $seo['description'] );
			$content['h1'] = $seo['h1'];

			$models            = News::find()->all();
			$content['models'] = $models;

			// выполняем запрос
			$query = News::find()->orderBy( 'id DESC' );
			// делаем копию выборки
			$countQuery = clone $query;
			// подключаем класс Pagination, выводим по 9 пунктов на страницу
			$pages = new Pagination( [ 'totalCount' => $countQuery->count(), 'pageSize' => 9 ] );
			// приводим параметры в ссылке к ЧПУ
			$pages->pageSizeParam = false;
			$models               = $query->offset( $pages->offset )
			                              ->limit( $pages->limit )
			                              ->all();

			$content['models'] = $models;
			$content['pages']  = $pages;

			return $this->render( 'news', [
				'content' => $content,
			] );
		}
		if ( ! empty( $_GET['alias'] ) && empty( $_GET['page'] ) ) {
			$seo = $this->getSEO( 'news#' . $_GET['alias'] );
			$this->setMeta( $seo['title'], '', $seo['description'] );
			$content['h1'] = $seo['h1'];

			$content['model'] = News::find()->where( [ 'alias' => $_GET['alias'] ] )->one();

			$content['img_num'] = 15;
			$content['prot']    = 'http://';

			return $this->render( 'news-item', [
				'content' => $content,
			] );
		}

	}

	public function actionStock() {
		if ( empty( $_GET['alias'] ) ) {
			$seo = $this->getSEO( 'stock' );
			$this->setMeta( $seo['title'], '', $seo['description'] );
			$content['h1'] = $seo['h1'];

			$models            = Stock::find()->all();
			$content['models'] = $models;

			// выполняем запрос
			$query = Stock::find()->orderBy( 'id DESC' );
			// делаем копию выборки
			$countQuery = clone $query;
			// подключаем класс Pagination, выводим по 6 пунктов на страницу
			$pages = new Pagination( [ 'totalCount' => $countQuery->count(), 'pageSize' => 6 ] );
			// приводим параметры в ссылке к ЧПУ
			$pages->pageSizeParam = false;
			$models               = $query->offset( $pages->offset )
			                              ->limit( $pages->limit )
			                              ->all();

			$content['models'] = $models;
			$content['pages']  = $pages;

			return $this->render( 'stock', [
				'content' => $content,
			] );
		}
		if ( ! empty( $_GET['alias'] ) && empty( $_GET['page'] ) ) {
			$seo = $this->getSEO( 'stock#' . $_GET['alias'] );
			$this->setMeta( $seo['title'], '', $seo['description'] );
			$content['h1'] = $seo['h1'];

			$content['model'] = Stock::find()->where( [ 'alias' => $_GET['alias'] ] )->one();

			return $this->render( 'stock-item', [
				'content' => $content,
			] );
		}

	}

	public function actionReadyProjects() {
		$seo = $this->getSEO( 'stroitelstvo-pod-zakaz#gotovue-proektu' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		// выполняем запрос
		$parent_id = Category::find()->where( [ 'alias' => 'gotovue-proektu' ] )->one()->id;

		$query = Object::find()->orderBy( 'id DESC' )->where( [ 'category_id' => $parent_id ] );
		// делаем копию выборки
		$countQuery = clone $query;
		// подключаем класс Pagination, выводим по 6 пунктов на страницу
		$pages = new Pagination( [ 'totalCount' => $countQuery->count(), 'pageSize' => 9 ] );
		// приводим параметры в ссылке к ЧПУ
		$pages->pageSizeParam = false;
		$models               = $query->offset( $pages->offset )
		                              ->limit( $pages->limit )
		                              ->all();

		$content['models'] = $models;
		$content['pages']  = $pages;

		$model                        = Category::find()->where( [ 'alias' => 'stroitelstvo-pod-zakaz' ] )->one();
		$content['bread'][0]['title'] = $model->title;
		$content['bread'][0]['alias'] = $model->alias;
		$model                        = Category::find()->where( [ 'alias' => 'gotovue-proektu' ] )->one();
		$content['bread'][1]['title'] = $model->title;
		$content['bread'][1]['alias'] = $model->alias;


		return $this->render( 'ready-projects', [
			'content' => $content,
		] );
	}

	public function actionReadyProjectsItem() {
		$seo = $this->getSEO( 'stroitelstvo-pod-zakaz#gotovue-proektu#' . $_GET['alias'] );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$content['model'] = Object::find()->where( [ 'alias' => $_GET['alias'] ] )->one();

		$model                        = Category::find()->where( [ 'alias' => 'stroitelstvo-pod-zakaz' ] )->one();
		$content['bread'][0]['title'] = $model->title;
		$content['bread'][0]['alias'] = $model->alias;
		$model                        = Category::find()->where( [ 'alias' => 'gotovue-proektu' ] )->one();
		$content['bread'][1]['title'] = $model->title;
		$content['bread'][1]['alias'] = $model->alias;
		$model                        = $content['model'];
		$content['bread'][2]['title'] = $model->title;
		$content['bread'][2]['alias'] = $model->alias;

		$content['img_num'] = 20;
		$content['prot']    = 'http://';

		return $this->render( 'ready-projects-item', [
			'content' => $content,
		] );
	}

	public function actionConstructionWork() {
		$seo = $this->getSEO( 'stroitelnue-rabotu' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$content['models']             = [];
		$parent_id                     = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one()->id;
		$content['models']['object']   = Object::find()->where( [ 'category_id' => $parent_id ] )->all();
		$content['models']['category'] = Category::find()->where( [ 'parent_category_id' => $parent_id ] )->all();
		$content['this_category_url']  = 'stroitelnue-rabotu';

		$model                        = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one();
		$content['bread'][0]['title'] = $model->title;
		$content['bread'][0]['alias'] = $model->alias;

		return $this->render( 'construction-work', [
			'content' => $content,
		] );
	}

	public function actionConstructionWorkItem() {
		$seo = $this->getSEO( 'stroitelnue-rabotu#' . $_GET['alias'] );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$parent_id = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one()->id;

		$content['model'] = Category::find()->where( [
			'parent_category_id' => $parent_id,
			'alias'              => $_GET['alias']
		] )->one();

		$content['img_num'] = 20;
		$content['prot']    = 'http://';

		if ( $content['model'] ) {
			$parent_id                     = $content['model']->id;
			$content['models']['object']   = Object::find()->where( [ 'category_id' => $parent_id ] )->all();
			$content['models']['category'] = Category::find()->where( [ 'parent_category_id' => $parent_id ] )->all();

			$content['this_category_url'] = 'stroitelnue-rabotu/' . $content['model']->alias;

			$model                        = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one();
			$content['bread'][0]['title'] = $model->title;
			$content['bread'][0]['alias'] = $model->alias;
			$model                        = Category::find()->where( [ 'id' => $parent_id ] )->one();
			$content['bread'][1]['title'] = $model->title;
			$content['bread'][1]['alias'] = $model->alias;


			return $this->render( 'construction-work', [
				'content' => $content,
			] );
		} else {
			$content['model']             = Object::find()->where( [
				'category_id' => $parent_id,
				'alias'       => $_GET['alias']
			] )->one();
			$content['this_category_url'] = 'stroitelnue-rabotu';

			$model                        = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one();
			$content['bread'][0]['title'] = $model->title;
			$content['bread'][0]['alias'] = $model->alias;
			$model                        = $content['model'];
			$content['bread'][1]['title'] = $model->title;
			$content['bread'][1]['alias'] = $model->alias;

			return $this->render( 'construction-work-item', [
				'content' => $content,
			] );
		}
	}

	public function actionConstructionWorkItemTwo() {
		$seo = $this->getSEO( 'stroitelnue-rabotu#' . $_GET['alias_1'] . '#' . $_GET['alias_2'] );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$parent_id = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one()->id;

		$content['model'] = Category::find()->where( [
			'parent_category_id' => $parent_id,
			'alias'              => $_GET['alias_2']
		] )->one();

		if ( $content['model'] ) {
			$parent_id                     = $content['model']->id;
			$content['models']['object']   = Object::find()->where( [ 'category_id' => $parent_id ] )->all();
			$content['models']['category'] = Category::find()->where( [ 'parent_category_id' => $parent_id ] )->all();

			$content['this_category_url'] = 'stroitelnue-rabotu/' . $content['model']->alias;

			$model                        = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one();
			$content['bread'][0]['title'] = $model->title;
			$content['bread'][0]['alias'] = $model->alias;
			$model                        = Category::find()->where( [ 'alias' => $_GET['alias_1'] ] )->one();
			$content['bread'][1]['title'] = $model->title;
			$content['bread'][1]['alias'] = $model->alias;
			$model                        = Category::find()->where( [ 'alias' => $_GET['alias_2'] ] )->one();
			$content['bread'][2]['title'] = $model->title;
			$content['bread'][2]['alias'] = $model->alias;

			return $this->render( 'construction-work', [
				'content' => $content,
			] );
		} else {
			$content['model']             = Object::find()->where( [
				'alias' => $_GET['alias_2']
			] )->one();
			$content['this_category_url'] = 'stroitelnue-rabotu';

			$model                        = Category::find()->where( [ 'alias' => 'stroitelnue-rabotu' ] )->one();
			$content['bread'][0]['title'] = $model->title;
			$content['bread'][0]['alias'] = $model->alias;
			$model                        = Category::find()->where( [ 'alias' => $_GET['alias_1'] ] )->one();
			$content['bread'][1]['title'] = $model->title;
			$content['bread'][1]['alias'] = $model->alias;
			$model                        = $content['model'];
			$content['bread'][2]['title'] = $model->title;
			$content['bread'][2]['alias'] = $model->alias;

			return $this->render( 'construction-work-item', [
				'content' => $content,
			] );
		}
	}

	public function actionAbout() {
		$seo = $this->getSEO( 'o-nas' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		return $this->render( 'about-us' );
	}

	public function actionContacts() {
		$seo = $this->getSEO( 'contacts' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		return $this->render( 'contacts' );
	}

	public function actionDesign() {
		$seo = $this->getSEO( 'design' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$content['planning_img_id'] = Textarea::find()->where( [ 'alias' => 'izobrazheniya-v-razdele-proektirovanie-na-stranice-proektirovanie-i-dizajn' ] )->one()->id;
		$content['design_img_id']   = Textarea::find()->where( [ 'alias' => 'izobrazheniya-v-razdele-dizajn-na-stranice-proektirovanie-i-dizajn' ] )->one()->id;

		$content['prot']    = 'http://';
		$content['model_p'] = Category::find()->where( [ 'alias' => 'design-p' ] )->one();
		$content['model_d'] = Category::find()->where( [ 'alias' => 'design-d' ] )->one();

		$content['num_list_p'] = Textarea::find()->where( [ 'alias' => 'numerovannuj-spisok-v-razdele-proektirovanie-na-stranice-proektirovanie-i-dizajn' ] )->one()->text;
		$content['num_list_d'] = Textarea::find()->where( [ 'alias' => 'numerovannuj-spisok-v-razdele-dizajn-na-stranice-proektirovanie-i-dizajn' ] )->one()->text;

		return $this->render( 'design', [
			'content' => $content,
		] );
	}

	public function actionLandscape() {
		$seo = $this->getSEO( 'landshaft-i-dekor' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1']     = $seo['h1'];
		$content['model']  = Category::find()->where( [ 'alias' => 'landshaft-i-dekor' ] )->one();
		$content['img_id'] = Textarea::find()->where( [ 'alias' => 'izobrazheniya-v-razdele-landshaftnuj-dizajn-na-stranice-landshaft-i-dekor' ] )->one()->id;

		$content['prot'] = 'http://';

		$content['num_list'] = Textarea::find()->where( [ 'alias' => 'numerovannuj-spisok-na-stranice-landshaft-i-dekor' ] )->one()->text;

		return $this->render( 'landscape-and-decor', [
			'content' => $content,
		] );
	}

	public function actionConstructionToOrder() {
		$seo = $this->getSEO( 'stroitelstvo-pod-zakaz' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		$parent_id                 = Category::find()->where( [ 'alias' => 'gotovue-proektu' ] )->one()->id;
		$content['ready-projects'] = Object::find()->where( [ 'category_id' => $parent_id ] )->all();

		$parent_id                          = Category::find()->where( [ 'alias' => 'tipichnue-proektu-domov' ] )->one()->id;
		$content['tipichnue-proektu-domov'] = Object::find()->where( [ 'category_id' => $parent_id ] )->all();

		$content['model'] = Category::find()->where( [ 'alias' => 'stroitelstvo-pod-zakaz' ] )->one();

		return $this->render( 'construction-to-order', [
			'content' => $content,
		] );
	}

	public function actionIndividualDesigningOfObjects() {
		$seo = $this->getSEO( 'individual-designing-of-objects' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		return $this->render( 'individual-designing-of-objects' );
	}

	public function actionOrderTheConstructionOfObjects() {
		$seo = $this->getSEO( 'zakazat-postroyku-obyektov' );
		$this->setMeta( $seo['title'], '', $seo['description'] );
		$content['h1'] = $seo['h1'];

		return $this->render( 'order-the-construction-of-objects' );
	}

	public function url_exists( $url ) {
		// Version 4.x supported
		$handle = curl_init( $url );
		if ( false === $handle ) {
			return false;
		}
		curl_setopt( $handle, CURLOPT_HEADER, false );
		curl_setopt( $handle, CURLOPT_FAILONERROR, true );  // this works
		curl_setopt( $handle, CURLOPT_HTTPHEADER, Array( "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15" ) ); // request as if Firefox
		curl_setopt( $handle, CURLOPT_NOBODY, true );
		curl_setopt( $handle, CURLOPT_RETURNTRANSFER, false );
		$connectable = curl_exec( $handle );
		curl_close( $handle );

		return $connectable;
	}

	public function dateView( $date_str, $size = 'l' ) {
		$date_name['01']['l'] = 'января';
		$date_name['02']['l'] = 'февраля';
		$date_name['03']['l'] = 'марта';
		$date_name['04']['l'] = 'апреля';
		$date_name['05']['l'] = 'мая';
		$date_name['06']['l'] = 'июня';
		$date_name['07']['l'] = 'июля';
		$date_name['08']['l'] = 'августа';
		$date_name['09']['l'] = 'сентября';
		$date_name['10']['l'] = 'октября';
		$date_name['11']['l'] = 'ноября';
		$date_name['12']['l'] = 'декабря';

		$date = explode( '-', $date_str );

		if ( $size == 's' ) {
			return $date_name[ $date[1] ][ $size ] . ' ' . $date[2] . ', ' . $date[0];
		} else {
			return $date[2] . ' ' . $date_name[ $date[1] ][ $size ] . ' ' . $date[0];
		}

	}

	public function actionPortfolio() {
		$category = Category::find()->where( [ 'alias' => 'portfolio' ] )->limit( 1 )->one();
		$objects  = Object::find()->where( [ 'category_id' => $category->id ] )->all();

		$seo = $this->getSEO( 'portfolio' );

		if ( $seo['h1'] == null ) {
			$h1 = Textarea::find()->where( [ 'alias' => 'zagolovok-h1-na-stranice-portfolio' ] )->limit( 1 )->one()->text;
		} else {
			$h1 = $seo['h1'];
		}

		if ( $seo['title'] == null ) {
			$this->setMeta( $category->title, '', $category->title );
		} else {
			$this->setMeta( $seo['title'], '', $seo['description'] );
		}

		return $this->render( 'portfolio', [ 'objects' => $objects, 'h1' => $h1 ] );
	}
}
