<?php
class Citation extends Model{


	var $validate = array(

		'text' => array(
			'rule' => 'notEmpty',
			'message' => "L'article de presse' FR n'est pas valide !!!"
		),
		'text_en' => array(
			'rule' => 'notEmpty',
			'message' => "L'article de presse' EN n'est pas valide !!!"
		)
	);

}