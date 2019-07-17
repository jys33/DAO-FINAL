<?php
/**
 * 
 */
class User
{
	
	public function __construct()
	{
		# code...
	}

	// metodo magico GET        
    public function __get($propertyName){
    	if(property_exists($this, $propertyName)){
            return $this->$propertyName;
    	}
    }
    // metodo magico SET
    public function __set($propertyName, $value){
    	if(property_exists($this, $propertyName)){
            $this->$propertyName = $value;
    	}

    	return $this;
    }

    // Recibe una fecha con el formato 1994-03-24 y retorna la edad
    public function getAge($birthDate){
    	$today = date('Y-m-d');
    	$diff = date_diff(date_create($birthDate), date_create($today));
    	return $diff->format('%y');
    }
}