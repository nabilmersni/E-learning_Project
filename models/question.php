<?php

class Question{
	private int $question_id;	
	private string $question_content;
	private string $date_added;
    private int $lesson_id;

	public function __construct($question_content, $lesson_id, $date_added){
		$this->question_content = $question_content;
		$this->lesson_id = $lesson_id;
		$this->date_added = $date_added;
	}

	public function getquestion_id()
	{
		return $this->question_id;
	}


	public function getquestion_content()
	{
		return $this->question_content;
	}
    public function setquestion_content()
	{
		$this->question_content = $question_content;
	}


	public function getlesson_id()
	{
		return $this->lesson_id;
	}
    public function setlesson_id()
	{
		$this->lesson_id = $lesson_id;
	}


	public function getdate_added()
	{
		return $this->date_added;
	}
    public function setdate_added()
	{
		$this->date_added = $date_added;
	}

	

}

?>