<?php

class Chapter{
	private int $chapter_id;	
	private string $chapter_title;
	private string $chapter_description;
	private string $date_added;
	private int $formation_id;
	private int $chapter_duration;	

	public function __construct($chapter_title, $chapter_description,$date_added, $formation_id, $chapter_duration){
		$this->chapter_title = $chapter_title;
		$this->chapter_description = $chapter_description;
		$this->date_added = $date_added;
		$this->formation_id = $formation_id;
		$this->chapter_duration = $chapter_duration;
	}

	public function getchapter_id()
	{
		return $this->chapter_id;
	}


	public function getchapter_title()
	{
		return $this->chapter_title;
	}
    public function setchapter_title()
	{
		$this->chapter_title = $chapter_title;
	}


	public function getchapter_description()
	{
		return $this->chapter_description;
	}
    public function setchapter_description()
	{
		$this->chapter_description = $chapter_description;
	}


	public function getdate_added()
	{
		return $this->date_added;
	}
    public function setdate_added()
	{
		$this->date_added = $date_added;
	}

	public function getformation_id()
	{
		return $this->formation_id;
	}
    public function setformation_id()
	{
		$this->formation_id = $formation_id;
	}

	public function getchapter_duration()
	{
		return $this->chapter_duration;
	}
    public function setchapter_duration()
	{
		$this->chapter_duration = $chapter_duration;
	}

	

}

?>