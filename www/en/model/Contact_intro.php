<?php
class Contact_intro extends Model{


	var $validate = array(

		'texte_fr' => array(
			'rule' => 'notEmpty',
			'message' => "Le texte introductif FR n'est pas valide !!!"
		),
		'texte_en' => array(
			'rule' => 'notEmpty',
			'message' => "Le texte introductif EN n'est pas valide !!!"
		)
	);

}