<?php

class Outcome{
	private int $out_id;	
	private string $out_content;
	private int $formation_id;

	public function __construct($out_content, $formation_id){
		$this->out_content = $out_content;
		$this->formation_id = $formation_id;
	}

	public function getout_id()
	{
		return $this->out_id;
	}


	public function getout_content()
	{
		return $this->out_content;
	}
    public function setout_content()
	{
		$this->out_content = $out_content;
	}


	public function getformation_id()
	{
		return $this->formation_id;
	}
    public function setformation_id()
	{
		$this->formation_id = $formation_id;
	}


	

}

?>