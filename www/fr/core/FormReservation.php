<?php
class FormReservation{
	
	public $controller; 
	public $errors; 

	public function __construct($controller){
		$this->controller = $controller; 
	}

	public function input($name,$label,$options = array()){
		$error = false; 
		$classError = ''; 
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' error'; 
		}
		if(!isset($this->controller->request->data->$name)){
			$value = ''; 
		}else{
			$value = $this->controller->request->data->$name; 
		}
		if($label == 'hidden'){
			return '<input type="hidden" name="'.$name.'" value="'.$value.'">'; 
		}
		$attr = ' '; 
		foreach($options as $k=>$v){ if($k!='type'){
			$attr .= " $k=\"$v\""; 
		}}
		if(!isset($options['type']) && !isset($options['options'])){
			$html .= '<div class="form-input">';
			$html .= '<input type="text" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" >';
			$html .= '</div>';
		}elseif(isset($options['options'])){
			$html .= '<div>';
			$html .= '<select id="input'.$name.'" name="'.$name.'" style="margin-bottom: 20px;">';
			$html .= '<option value="" disabled selected>Veuillez selectionner le '.$name.'</option>'; 
			foreach($options['options'] as $k=>$v){
				$html .= '<option value="'.$k.'">'.$v.'</option>'; 
			}
			$html .= '</select></div>'; 
		}elseif($options['type'] == 'number'){
			$html .= '<div class="form-input">';
			$html .= '<input type="number" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" min="1" max="100">';
			$html .= '</div>';
		}elseif($options['type'] == 'textarea'){
			$html .= '<div class="form-textarea">';
			$html .= '<textarea id="'.$name.'" name="'.$name.'" placeholder="'.$label.'"></textarea>';
			$html .= '</div>';
		}elseif($options['type'] == 'checkbox'){
			$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'; 
		}elseif($options['type'] == 'file'){
			$html .= '<input type="file" class="input-file" id="input'.$name.'" name="'.$name.'"'.$attr.'>';
		}elseif($options['type'] == 'password'){
			$html .= '<input type="password" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}
		if($error){
			$html .= '<span class="help-inline">'.$error.'</span>';
		}
		return $html; 
	}
}


