<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


	/*
	 * Variables iniciales del sitio
	 * @param string $action the ACTION name to be loaded
	 */
	public function beforeAction($action) {
		
		$activeItem = $this->route;
		$menuList = Yii::app()->db->createCommand("SELECT * from menu where padre=0 and estatus=1 order by id asc")->queryAll();
		$items=array();
		foreach ($menuList as $i => $menu) {
			$model = Menu::model()->findByPk($menu['id']);
			array_push($items, $model->getListed($activeItem));
		}
		Yii::app()->session['init-menuItems']= $items;

		// Cargar Empresa
		Yii::app()->session['init-empresa']= Yii::app()->db->createCommand()
			->select('nombre, nombre_legal, rif, direccion')
			->from('empresa')
			->queryRow();
			
		// Cargar Telefonos
		Yii::app()->session['init-telefonos'] = Yii::app()->db->createCommand()
			->select("group_concat(valor separator ', ') as telefonos")
			->from("contacto ")
			->where("nombre like 'telefono%' ")
			->group("empresa_id ")
			->queryRow();

		return true;
	}

	/**
	 *
	 */
	public function render($view, $data = null, $return = false)
	{
		if ($this->beforeRender()) {
			parent::render($view, $data, $return);
		}
	}

	public function beforeRender()
	{
		return true;
	}
}