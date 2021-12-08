<?php

class Formation{
	private int $formation_id;	
	private string $name;
	private string $short_description;
	private string $description;
	private string $categorie;
	private string $level;
    private float $price;
	private string $image;
	private string $date_added;
    private int $state;
    private bool $top_formation;
	private int $user_id;

	public function __construct($name, $short_description, $description, $categorie, $level, $price, $image, $date_added, $state, $top_formation, $user_id){
		$this->name = $name;
		$this->short_description = $short_description;
		$this->description = $description;
		$this->categorie = $categorie;
		$this->level = $level;
		$this->price = $price;
		$this->image = $image;
		$this->date_added = $date_added;
        $this->state = $state;
        $this->top_formation = $top_formation;
		$this->user_id = $user_id;
	}

	public function getformation_id()
	{
		return $this->formation_id;
	}


	public function getname()
	{
		return $this->name;
	}
    public function setname()
	{
		$this->name = $name;
	}

	public function getshort_description()
	{
		return $this->short_description;
	}
    public function setshort_description()
	{
		$this->short_description = $short_description;
	}

	public function getdescription()
	{
		return $this->description;
	}
    public function setdescription()
	{
		$this->description = $description;
	}


	public function getcategorie()
	{
		return $this->categorie;
	}
    public function setcategorie()
	{
		 $this->categorie = $categorie;
	}

	public function getlevel()
	{
		return $this->level;
	}
    public function setlevel()
	{
		 $this->level = $level;
	}


	public function getprice()
	{
		return $this->price;
	}
    public function setprice()
	{
		$this->price = $price;
	}


	public function getimage()
	{
		return $this->image;
	}
    public function setimage()
	{
		$this->image = $image;
	}


	public function getdate_added()
	{
		return $this->date_added;
	}
    public function setdate_added()
	{
		$this->date_added = $date_added;
	}

    public function getstate()
	{
		return $this->state;
	}
    public function setstate()
	{
		$this->state = $state;
	}

    public function gettop_formation()
	{
		return $this->top_formation;
	}
    public function settop_formation()
	{
		$this->top_formation = $top_formation;
	}

	public function getuser_id()
	{
		return $this->user_id;
	}
    public function setuser_id()
	{
		$this->user_id = $user_id;
	}

	

}

?>