<?php 

class Gravatar
{
	const URL = "http://www.gravatar.com/avatar/";

	protected $properties = [
        "gravatar_id"    => NULL,
        "default"        => NULL,
        "size"            => 80,
        "border"        => NULL,		
	];
	protected $email = '';
	protected $extra = '';
	public function __construct($email=NULL, $default=NULL) 
	{
        $this->setEmail($email);
        $this->setDefault($default);
	}
	private function setEmail($email)
	{
		if ($this->isValidEmail($email)) {
			$this->email = $email;
			$this->properties['gravatar_id'] = trim(md5(strtolower($email)));
		}
	}
	public function setDefault($default)
	{
		if (!empty($default)) 
			$this->properties['default'] = $default;
	}
	public function setSize($size) 
	{
		if ($size > 0) 
			$this->properties['size'] = $size;
	}
	public function getSrc()
	{
		$url = self::URL . "?";
		$f = true;
		foreach ($this->properties as $key => $value) {
			if (isset($value) && !empty($value)) {
				if (!$f) 
					$url .= "&";
				$url .= $key."=".urlencode($value);
				$f = false;
			}
		}
		return $url;
	}
	public function toHtml()
	{
		return '<img src="'. $this->getSrc() .'"' .(!isset($this->size) ? "" : ' width="'.$this->size.'" height="'.$this->size.'"').$this->extra.' />'; 
	}
	public function __toString(){
		return $this->toHtml();
	}
    public function isValidEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            return true;
        }
        if (filter_var($email, FILTER_SANITIZE_EMAIL) !== false) {
            return true;
        } else {
            return false;
        }
    }	
}