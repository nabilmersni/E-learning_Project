<?php

class Lesson{
	private int $lesson_id;	
	private string $lesson_title;
	private string $lesson_description;
	private string $lesson_type;
	private string $lesson_video;
    private string $date_added;
	private int $chapter_id;

	public function __construct($lesson_title, $lesson_description, $lesson_type, $lesson_video, $date_added, $chapter_id){
		$this->lesson_title = $lesson_title;
		$this->lesson_description = $lesson_description;
		$this->lesson_type = $lesson_type;
		$this->lesson_video = $lesson_video;
		$this->date_added = $date_added;
		$this->chapter_id = $chapter_id;
	}

	public function getlesson_id()
	{
		return $this->lesson_id;
	}


	public function getlesson_title()
	{
		return $this->lesson_title;
	}
    public function setlesson_title(string $lesson_title)
	{
		$this->lesson_title = $lesson_title;
	}


	public function getlesson_description()
	{
		return $this->lesson_description;
	}
    public function setlesson_description(string $lesson_description)
	{
		$this->lesson_description = $lesson_description;
	}


	public function getlesson_type()
	{
		return $this->lesson_type;
	}
    public function setlesson_type(string $lesson_type)
	{
		 $this->lesson_type = $lesson_type;
	}

	public function getlesson_video()
	{
		return $this->lesson_video;
	}
    public function setlesson_video(string $lesson_video)
	{
		 $this->lesson_video = $lesson_video;
	}


	public function getdate_added()
	{
		return $this->date_added;
	}
    public function setdate_added(string $date_added)
	{
		$this->date_added = $date_added;
	}


	public function getchapter_id()
	{
		return $this->chapter_id;
	}
    public function setchapter_id(string $chapter_id)
	{
		$this->chapter_id = $chapter_id;
	}


	
    
}

?>