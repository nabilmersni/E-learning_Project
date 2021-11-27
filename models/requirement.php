<?php

class Requirement{
	private int $req_id;	
	private string $req_content;
	private int $formation_id;

	public function __construct($req_content, $formation_id){
		$this->req_content = $req_content;
		$this->formation_id = $formation_id;
	}

	public function getreq_id()
	{
		return $this->req_id;
	}


	public function getreq_content()
	{
		return $this->req_content;
	}
    public function setreq_content()
	{
		$this->req_content = $req_content;
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