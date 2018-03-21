<?php
class Post extends Model{


	var $validate = array(

		'name' => array(
			'rule' => 'notEmpty',
			'message' => "Le nom FR n'est pas valide !!!"
		),
		'naam' => array(
			'rule' => 'notEmpty',
			'message' => "Le nom NL n'est pas valide !!!"
		)
	);

}