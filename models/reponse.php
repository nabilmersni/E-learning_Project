<?php

class Reponse{
	private int $reponse_id;	
	private string $reponse_content;
    private int $question_id;

	public function __construct($reponse_content, $question_id){
		$this->reponse_content = $reponse_content;
		$this->question_id = $question_id;
	}

	public function getreponse_id()
	{
		return $this->reponse_id;
	}


	public function getreponse_content()
	{
		return $this->reponse_content;
	}
    public function setreponse_content()
	{
		$this->reponse_content = $reponse_content;
	}
	


	public function getquestion_id()
	{
		return $this->question_id;
	}
    public function setquestion_id()
	{
		$this->question_id = $question_id;
	}


	
	

}

?>