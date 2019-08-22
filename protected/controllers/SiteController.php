<?php

class SiteController extends Controller
{
	public $metaKeywords = 'producto, equipo, medico, quirurgico, distribucion, venezuela';
	public $metaDescription = 'Distribuidor de productos y equipos médicos de Venezuela';
	public $metaProperty = array();

	public function beforeRender()
	{
		$cs = Yii::app()->clientScript;

		Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/estilos.css'); 
		Yii::app()->getClientScript()->registerCoreScript('jquery');

		$cs->registerLinkTag('icon','image/ico',Yii::app()->baseUrl.'/images/favicon.ico');

		$cs->registerMetaTag('es', 'language', null, array(), 'lng');
		if (!empty($this->metaKeywords)) $cs->registerMetaTag($this->metaKeywords, 'keywords', null, array(), 'kw');
		if (!empty($this->metaDescription)) $cs->registerMetaTag($this->metaDescription, 'description', null, array(), 'dsc');

		return true;
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {

		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {

		$dir = Yii::app()->params['baseDir'].'/assets/rotador/';
		$url = Yii::app()->request->baseUrl."/assets/rotador/";

		$archivos = Yii::app()->db->createCommand()
			->select("id, titulo, pic")
			->from("rotador")
			->where("estatus=1")
			->andWhere("url='/index'")
			->order("id")
			->queryAll()
		;

		// $this->render('index');
		$this->render('index',array(
			'dir'=>$dir,
			'url'=>$url,
			'archivos'=>$archivos, 
		));
	}


	/**
	 * Empresa 
	 */
	public function actionEmpresa() {	

		$sql = Yii::app()->db->createCommand()
			->select("id, titulo, descripcion")
			->from("filosofia")
			->where("empresa_id=0")
			->order("id")
			->queryAll()
		;
		$empresa = array();
		$empresa['base'] = array();
		$empresa['filosofia'] = array();
		
		foreach ($sql as $i => $value) {
			if ($value['id']<3) array_push($empresa['base'], $value);
			else array_push($empresa['filosofia'], $value);
		}
		
		$this->render('empresa',array('empresa'=>$empresa));
	}

	/**
	 * Servicios
	 */
	public function actionServicios() {	
		
		$this->metaDescription = 'olo';

		$servicios = Yii::app()->db->createCommand()
			->select("*")
			->from("servicios")
			->order("id")
			->where("estatus=1")
			->queryAll()
		;
		$galeria = Yii::app()->db->createCommand()
			->select("*")
			->from("servicios_galeria")
			->where("estatus=1")
			->order("id")
			->queryAll()
		;

		$model=new ServiciosForm;

		if(isset($_POST['ServiciosForm']))
		{
			$model->attributes=$_POST['ServiciosForm'];
			$model->subject = $model->subject=="" ? "Solicitud de servicio - ".$model->name : $model->subject;
		
			if($model->validate()) {

				$path    = Yii::app()->params['baseDir']."/assets/mail/"; // the path with the file name where the file will be stored
				$uploadedFile = CUploadedFile::getInstancesByName('file');
								
				if(!empty($uploadedFile)) foreach ($uploadedFile as $i => $theFile) {
					$fileName=$theFile->name;
					$theFile->saveAs($path.$fileName);
					$model->file = $path.$fileName;
				}
				
				//use 'contact' view from views/mail
				$mail = new YiiMailer();
				$mail->setView('standard');
				$mail->setLayout('servicios');
				$mail->setData(array(
					'message' => $model->body, 
					'name' => $model->name, 
					'description' => 'Solicitud de servicios',
					'parte'=> $model->parte,
					'modelo'=> $model->modelo,
					'serial'=> $model->serial,
					'fabricante'=> $model->fabricante,
				));
				
				//set properties
				$mail->setFrom($model->email, $model->name);
				$mail->setSubject($model->subject);
				$mail->setTo(Yii::app()->params['adminEmail']);
				$mail->setAttachment($model->file);

				//send
				if ($mail->send()) {
					Yii::app()->user->setFlash('exito','Gracias por contactarnos. Te responderemos tan pronto como sea posible.');
				} else {
					Yii::app()->user->setFlash('error','Error al tratar de enviar el mensaje: '.$mail->getError());
				}

				if(file_exists($model->file)) unlink($model->file);

				$this->refresh();
			}
		}
		
		$this->render('servicios',array('model'=>$model,'servicios'=>$servicios, 'galeria'=>$galeria));
	}

	/**
	 * Productos
	 */
	public function actionProductos() {

		$title = Yii::app()->request->getParam('title');
		$model = Productos::model()->findAll();
		
		$productos = array();
		foreach ($model as $i => $item) {
			$title = $item->nombre!="" ? $item->titulo.', '.$item->nombre : $item->titulo;
			$productos[$i]['label'] = $title;
			$productos[$i]['url'] = StringFunctions::cleanMenuUrl($title);
		}
		$this->render('productos',array('productos'=>$productos));
	}

	public function actionProductosCatalogo() {
		$this->render('catalogo',array('catalogo'=>Yii::app()->request->baseUrl."/assets/productos/catalogo.pdf"));
	}

	public function actionProductosDetalle() {

		$title = Yii::app()->request->getParam('title');
		$menu = Menu::model()->findByAttributes(
			array('url' => "/productos/".$title)
		);
		$id = $menu->subid;

		if (!empty($id) && $id!=0){
			$sql = Yii::app()->db->createCommand()
				->select ("productos.id as producto_id, productos.titulo as producto, productos_atributos.id as atributo_id, lower(p_atributos_tipos.descripcion) as tipo, lower(p_atributos_posicion.descripcion) as posicion,
					productos_atributos.titulo as titulo_atributo, productos_atributos.texto, productos_atributos.lista, concat(productos_atributos.id,'.', productos_atributos.pic) as pic, productos_atributos.sortOrder as orden")
				->from ("productos")
				->join ("productos_atributos", "productos_atributos.producto_id = productos.id")
				->join ("p_atributos_posicion", "productos_atributos.posicion_id = p_atributos_posicion.id")
				->join ("p_atributos_tipos", "productos_atributos.tipo_id = p_atributos_tipos.id")
				->where ("productos.id=".$id)
				->andWhere ("productos_atributos.estatus=1")
				->order ("productos.id, productos_atributos.id, productos_atributos.posicion_id")
				->queryAll()
			;
			
			$producto=array();
			foreach ($sql as $i => $data) {
				$producto[$data['producto']]['titulo'] = $data['producto'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['tipo'] = $data['tipo'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['titulo_atributo'] = $data['titulo_atributo'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['texto'] = $data['texto'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['lista'] = $data['lista'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['pic'] = $data['pic'];
				$producto[$data['producto']][$data['posicion']][$data['atributo_id']]['orden'] = $data['orden'];
			}
			$this->render('productos_detalle',array('producto'=>$producto));
		} else throw new CHttpException(404,'El sistema no ha podido encontrar la acción "'.$title.'" solicitada.');

	}


	/**
	 * Contactanos
	 */
	public function actionContacto() {	
			
		$twitter= Yii::app()->db->createCommand()
			->select('valor as user')
			->from('contacto')
			->where("nombre like 'twitter' ")
			->queryRow();

		$model=new ContactForm;
		// $this->performAjaxValidation($model);
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			$model->subject = $model->subject=="" ? "Contacto - ".$model->name : $model->subject;
		
			if($model->validate()) {

				//use 'contact' view from views/mail
				$mail = new YiiMailer();
				$mail->setView('standard');
				$mail->setLayout('contacto');
				$mail->setData(array(
					'message' => $model->body, 
					'name' => $model->name, 
					'description' => 'Contacto',
					'telefono'=> $model->telefono,
					'ciudad'=> $model->ciudad,
					'pais'=> $model->pais,
				));
				
				//set properties
				$mail->setFrom($model->email, $model->name);
				$mail->setSubject($model->subject);
				$mail->setTo(Yii::app()->params['adminEmail']);
				//send
				if ($mail->send()) {
					Yii::app()->user->setFlash('exito','Gracias por contactarnos. Te responderemos tan pronto como sea posible.');
				} else {
					Yii::app()->user->setFlash('error','Error al tratar de enviar el mensaje: '.$mail->getError());
				}

				$this->refresh();
			}
		}

		$this->render('contacto',array('model'=>$model,'twitter'=>$twitter, ));
	}

	public function tituloEmpresa($string) {
		$words = explode(" ",$string);

		$h4 = "";
		$h3 = "";
		$h2 = "";
		
		foreach ($words as $i => $w) {
		 	if ($i <= 1 && count($words)>1) $h4 .=  $w." ";
		 	elseif ($i <= 4) $h3 .=  $w." ";
		 	else $h2 .=  $w." ";
		}
		
		$title =  
			"<h4>".$h4."</h4>".
			"<h3>".$h3."</h3>".
			"<h2>".$h2."</h2>"
		;
		return $title;
	}
	public function tituloProducto($string) {
		$words = explode(" ",$string);

		$h2 = "";
		$h3 = "";
		$h4 = "";
		
		foreach ($words as $i => $w) {
		 	if ($i <= 1 && count($words)>1) $h2 .=  $w." ";
		 	elseif ($i <= 4) $h3 .=  $w." ";
		 	else $h4 .=  $w." ";
		}
		
		$title =  
			"<h2>".$h2."</h2>".
			"<h3>".$h3."</h3>".
			"<h4>".$h4."</h4>"
		;
		return $title;
	}
}