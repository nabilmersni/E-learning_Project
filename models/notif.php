<?php

class Notif{
	private int $notif_id;	
	private int $user_id;
	private string $for_who;
	private string $content;
	private int $id_formation;

	public function __construct($user_id, $for_who,$content, $id_formation){
		$this->user_id = $user_id;
		$this->for_who = $for_who;
		$this->content = $content;
		$this->id_formation = $id_formation;
	}

	public function getnotif_id()
	{
		return $this->notif_id;
	}


	public function getuser_id()
	{
		return $this->user_id;
	}
    public function setuser_id(int $user_id)
	{
		$this->user_id = $user_id;
	}


	public function getfor_who()
	{
		return $this->for_who;
	}
    public function setfor_who(string $for_who)
	{
		$this->for_who = $for_who;
	}


	public function getcontent()
	{
		return $this->content;
	}
    public function setcontent(string $content)
	{
		$this->content = $content;
	}

	public function getid_formation()
	{
		return $this->id_formation;
	}
    public function setid_formation(int $id_formation)
	{
		$this->id_formation = $id_formation;
	}

	

}

?>