<?php

class Form {

	private $datas = [];

	public function __construct($datas = [])
	{
		$this->datas = $datas;
	}

	private function getValue($name)
	{
		$value = "";
		if (isset($this->datas[$name])) {
			# code...
			return $this->datas[$name];
		}else{
			return '';
		}
	}

	private function input($type, $name, $label)
	{
		$value = $this->getValue($name);
		if ($type == "textarea") {
			# code...
			$input = "<textarea type=\"$type\" id=\"$name\" name=\"$name\" class=\"form-control\">$value</textarea>";
		}else{
		    $input = "<input type=\"$type\" id=\"$name\" name=\"$name\" class=\"form-control\" value=\"$value\">";
		}
		return "<div class=\"form-group\">
		            <label for=\"$name\">$label</label>
		            $input 
		        </div>";
	}

	public function text($name, $label)
	{
		return $this->input('text', $name, $label);
	}

	public function email($name, $label)
	{
		return $this->input('email', $name, $label);
	}

	public function select($name, $label, $options)
	{
		$options_html = "";
		$value = $this->getValue($name);
		foreach ($options as $k => $v) {
			# code...
			$selected = '';
			if ($value == $k) {
				# code...
				$selected = ' selected';
			}
			$options_html .= "<option value=\"$k\" $selected>$v</option>";
		}
		return "<div class=\"form-group\">
		            <label for=\"$name\">$label</label>
		            <select id=\"$name\" name=\"$name\" class=\"custom-select\">
		            $options_html
		            </select>
		        </div>";
	}

	public function textarea($name, $label)
	{
		return $this->input('textarea', $name, $label);
	}

	public function submit($label)
	{
		return '<button type="submit" class="btn btn-primary">' . $label . '</button>';
	}

	public function csrf()
	{
		return "csrf=" . $_SESSION['csrf'];
	}

	public function csrfInput()
	{
		return '<input type="hidden" value="' . $_SESSION['csrf'] . '" name="csrf">';
	}

	public function checkCsrf()
	{
		if ((isset($_POST['csrf']) || $_POST['csrf'] != $_SESSION['csrf']) || (isset($_GET['csrf']) || $_GET['csrf'] != $_SESSION['csrf'])) {
		    # code...
			return true;
		}
		header('location:csrf.php');
		die();
	}
}

