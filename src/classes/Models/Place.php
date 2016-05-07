<?php

namespace App\Models;

use PDO;

class Place
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getPlaceList()
    {
        return $this->db->query("select * from place")->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPlace($id)
    {
    	$stmt = $this->db->prepare("select * from place WHERE id = :id");
		$stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}