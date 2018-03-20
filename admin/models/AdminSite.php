<?php

/**
 * Created by PhpStorm.
 * User: koval
 * Date: 19.01.2018
 * Time: 22:51
 */
class admin_feedback extends AdminTable {
	public $NAME = "Обратная связь";
	public $NAME2 = "заказ звонка";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'name';


	function __construct() {
		$this->fld = array(
			new Field( "name", "Name", 1 ),
			new Field( "phone", "Phone number", 1 ),
		);
	}
}

class admin_textarea extends AdminTable {
	public $NAME = "Текстовые поля";
	public $NAME2 = "текстовое поле";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'title';

	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1000;
	public $IMG_BIG_VSIZE = 1000;
	public $IMG_NUM = 15;

	function __construct() {
		$this->fld = array(
			new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 ),
			new Field( "title", "Описание", 1 ),
			new Field( "text", "Текст (значение)", 2 ),
		);
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
	}
}

class admin_news extends AdminTable {
	public $NAME = "Новости";
	public $NAME2 = "новость";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'title';

	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1000;
	public $IMG_BIG_VSIZE = 1000;
	public $IMG_NUM = 10;

	function __construct() {
		$this->fld = array(
			new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 ),
			new Field( "title", "Заголовок", 1 ),
			new Field( "text", "Текст", 2 ),
			new Field( "text_short", "Короткое описание", 2 ),
			new Field( "date", "Дата публикации", 13, array( 'showInList' => 1 ) ),

		);
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
	}
}

class admin_category extends AdminTable {
	public $NAME = "Категории работ";
	public $NAME2 = "категорию";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'title';

	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1000;
	public $IMG_BIG_VSIZE = 1000;
	public $IMG_NUM = 1;

	function __construct() {
		$this->fld = array(
			new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 ),
			new Field( "title", "Заголовок", 1 ),
			new Field( "text", "Текст", 2 ),
			new Field( "parent_category_id", "Принадлежит категории", 9, array(
				'showInList'       => 0,
				'editInList'       => 0,
				'valsFromTable'    => 'category',
				'valsFromCategory' => null,
				'valsEchoField'    => 'title',
				'showInList'       => 1
			) ),

		);
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
	}
}

class admin_object extends AdminTable {
	public $NAME = "Готовые объекты";
	public $NAME2 = "объект";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'title';

	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 3000;
	public $IMG_BIG_VSIZE = 3000;
	public $IMG_NUM = 15;

	function __construct() {
		$this->fld = array(
			new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 ),
			new Field( "title", "Заголовок", 1 ),
			new Field( "text", "Текст", 2 ),
			new Field( "date", "Дата", 13, array( 'showInList' => 1 ) ),
			new Field( "category_id", "Принадлежит категории", 9, array(
				'showInList'       => 0,
				'editInList'       => 0,
				'valsFromTable'    => 'category',
				'valsFromCategory' => null,
				'valsEchoField'    => 'title',
				'showInList'       => 1
			) ),
			new Field( "text_bot", "Текст под слайдером", 2 ),

		);
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
	}
}

class admin_review extends AdminTable {
	public $NAME = "Отзывы";
	public $NAME2 = "отзыв";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'name';

	function __construct() {
		$this->fld = array(
			new Field( "name", "Имя", 1 ),
			new Field( "text", "Текст", 2 ),
		);
	}
}

class admin_stock extends AdminTable {
	public $NAME = "Акции";
	public $NAME2 = "акцию";

	public $SORT = 'id DESC';
	public $ECHO_NAME = 'title';

	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1000;
	public $IMG_BIG_VSIZE = 1000;
	public $IMG_NUM = 1;

	function __construct() {
		$this->fld = array(
			new Field( "alias", "Alias (генерируеться, если не заполнен)", 1 ),
			new Field( "title", "Заголовок", 1 ),
			new Field( "text", "Текст", 2 ),
			new Field( "date_begin", "Дата начала", 13, array( 'showInList' => 1 ) ),
			new Field( "date_end", "Дата окончания", 13, array( 'showInList' => 1 ) ),
		);
	}

	function afterEdit( $row ) {
		$this->afterAdd( $row );
	}

	function afterAdd( $row ) {
		if ( empty( $row['alias'] ) ) {
			$qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit( $row['title'] ) . "' WHERE id = " . $row['id'];
			pdoExec( $qup );
		}
	}
}