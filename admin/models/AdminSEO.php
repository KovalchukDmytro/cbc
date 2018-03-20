<?php
/*
 *  SEO тексты
 * */


class admin_seo extends AdminTable
{
	public $SORT = 'id DESC';
	public $ECHO_NAME = 'alias';

	public $NAME="SEO тексты";
	public $NAME2="страницу";

	function __construct()
	{
		$this->fld = array(
			new Field("alias","Идентификатор",1),
			new Field("page","Страница",1),

			new Field("title","TITLE",1),
			new Field("description","Description",1),
			new Field("h1","Заголовок H1",1),
		);


	}



};