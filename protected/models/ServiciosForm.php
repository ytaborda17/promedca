<?php

/**
 * ServiciosForm class.
 * ServiciosForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ServiciosForm extends CFormModel
{
	public $name;
	public $email;
	public $parte;
	public $modelo;
	public $serial;
	public $fabricante;
	public $subject;
	public $body;
	public $file;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, parte, modelo, serial, fabricante, body, verifyCode', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */

	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Código de verificación',
			'name'=>'Nombre',
			'email'=>'Email',
			'parte'=>'Número de parte',
			'modelo'=>'Modelo',
			'serial'=>'Serial',
			'fabricante'=>'Fabricante',
			'subject'=>'Asunto',
			'body'=>'Mensaje',
			'file'=>'Foto',
		);
	}

}