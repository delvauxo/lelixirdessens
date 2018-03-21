<?php
class Category extends Model{

	var $table = 'categories'; 

	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez préciser un nom de catégorie !'
		)
	);


}