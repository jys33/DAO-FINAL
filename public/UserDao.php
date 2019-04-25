<?php
require 'BaseDao.php';
/**
 * 
 */
class UserDao extends BaseDao
{
	private $db = null;
	
	function __construct()
	{
		$this->db = $this->getDb();
	}

	public function add($values = []) {
		$sql = 'INSERT INTO user ';
		$fields = array_keys($values);
		$vals = array_values($values);
		$sql .= '('.implode(',', $fields).') ';
		$arr = [];
		foreach ($fields as $f) {
		    $arr[] = '?';
		}
		$sql .= 'VALUES ('.implode(',', $arr).') ';
		        
		$stmt = $this->db->prepare($sql);
		        
		foreach ($vals as $i=>$v) {
		    $stmt->bindValue($i+1, $v, PDO::PARAM_STR);
		}

	    $result = $stmt->execute();

		if ($result) {
			return ( $stmt->rowCount() > 0 );
		}
		return false;
	}

	public function update($id, $values = []) {
		$sql = 'UPDATE user SET ';
		$fields = array_keys($values);
		$vals = array_values($values);
		
		foreach ($fields as $i=>$f) {
		    $fields[$i] .= ' = ? ';
		}
		
		$sql .= implode(',', $fields);
		$sql .= ' WHERE user_id = ' . (int)$id .' LIMIT 1 ';
		
		$stmt = $this->db->prepare($sql);
		foreach ($vals as $i=>$v) {
		    $stmt->bindValue($i+1, $v, PDO::PARAM_STR);
		}
		
		$result = $stmt->execute();

		if ($result) {
			return ($stmt->rowCount() > 0);
		}
		return false; 
	}

	public function delete($id) {
		$stmt = $this->db->prepare('DELETE FROM user WHERE user_id = :user_id LIMIT 1');
		$stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
		$result = $stmt->execute();
		if ($result) {
			return ($stmt->rowCount() > 0);
		}

		return false;
	}

	public function findById($id) {
		$stmt = $this->db->prepare('SELECT * FROM user WHERE user_id = :user_id LIMIT 1');
		$stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
		$result = $stmt->execute();
		if ($result) {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return (!empty($data)) ? $data : false;
		}

		return false;
	}

	public function getAll() {
		$stmt = $this->db->prepare('SELECT * FROM user');
		$result = $stmt->execute();
		if ($result) {
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}
}