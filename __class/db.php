<?php
class db extends PDO{
	protected $dbms = "mysql";
	protected $dbhost ="localhost";
	protected $dbuser = "root";
	protected $dbpass = "";
	protected $dbnm = "spk";

	private $a = "";

	private $hasil;

	function __construct(){
		try{
			parent::__construct($this->dbms.':host='.$this->dbhost.';dbname='.$this->dbnm, $this->dbuser, $this->dbpass);
			PDO::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dbms == 'mysql' ? PDO::exec("SET CHARACTER SET utf8") : '';
		}catch(PDOException $e){
			echo $e->getMessage();
			exit();
		}
	}
	/* Function Login */
	public function check_login($username, $password){
		$pass = md5($password);
		$qLogin = $this->prepare("SELECT * FROM users WHERE username ='$username' AND password='$pass'");
		$qLogin->execute();
		foreach($qLogin as $data){}
		$rows = $qLogin->rowCount();
		//echo $data['username'];
		if($rows==1){
			$_SESSION['login'] = true;
			$_SESSION['username'] = $data['username'];
			$_SESSION['name'] = $data['name'];
			$_SESSION['address'] = $data['address'];
			$_SESSION['admin'] = $data['admin'];
			return true;
		}else{
			return false;
		}
	}


	/* Function Tampil */
	public function select($table=null, $rows=null, $where=null, $lj=null, $order=null, $limit=null, $groupby=null){
		//check kondisi parameter $tabel
		if($rows!=null){
			if(is_array($rows)){
				foreach ($rows as $row){
	                $fild[] = $row;
	            }
				$fild = implode(', ', $fild);
			}else{
				$fild = $rows;
			}

		}

		if($table!=null){
			if(is_array($table)){
	      foreach ($table as $key){
	          $param[] = $key;
	      }
				$param = implode(', ', $param);
	    }else{
				$param = $table;
			}
			$sql = 'SELECT '.$fild.' FROM '.$param;
		}
		//check kondisi parameter $rows



		// check kondisi $where

		if($lj != null){
			$sql = 'SELECT '.$fild.' FROM '.$lj;
		}
		if($where != null)
		{
			$sql .= ' WHERE '.$where;
		}
		if($groupby != null){
			$sql .= ' GROUP BY '.$groupby;
		}
		if($order != null){
			$sql .= ' ORDER BY '.$order;
		}
		if($limit != null){
			$sql .= ' ORDER BY '.$limit;
		}

		$query = $this->prepare($sql);
		$query->execute();
		$posts = array();
		while($row = $query->fetch()){
			$posts[] = $row;
		}
		return $posts;
	}

	/* Function Tambah */
	public function add($table, $rows){
		if(is_array($rows)){
			foreach($rows as $key => $val){
				$vals[] = "'".$val."'";
				$keys[] = $key;
			}
		}
		$field = implode(', ',$keys);
		$value = implode(', ',$vals);
		$sql = "INSERT INTO ".$table." (".$field.") VALUES (".$value.")";
		$query = $this->prepare($sql);
		$query->execute();
	}

	//function update
	public function update($table, $data=null, $where=null){
		$sql = "UPDATE ".$table;
		if(is_array($data)){
				foreach ($data as $key =>$val){
						$vals = "'".$val."'";
						$param[] = $key." = ".$vals;
				}
				$param = implode(', ', $param);
		}else{
				$param = $data;
		}

		$sql .= " SET ".$param;
		if($where != null){
			$sql .= ' WHERE '.$where;
		}

		$query = $this->prepare($sql);
		$query->execute();
		if(!$query){
			$a = "gagal";
		}
		return $a;
  }

    //function delete
	public function delete($table,$where=null){
		$sql = "DELETE FROM ".$table;
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    $query = $this->prepare($sql);
		$query->execute();
    if(!$query){
			$a = "gagal";
		}
		return $a;
	}

	public function checkPassword($username,$oldPass){
		$tabel = "user";
		$fild = "userPassword";
		$where = "username='$username'";
		foreach($this->select($tabel, $fild, $where) as $data){}
		if($data['userPassword']=="$oldPass"){
			return true;
		}else{
			return false;
		}
	}

	public function subDate($date){
		$tgl = substr($date,8,2);
		$thn = substr($date,11,4);
		$bulan = substr($date,4,3);
		switch($bulan){
			case "Jan":
				$bln = 1;
			break;
			case "Feb":
				$bln = 2;
			break;
			case "Mar":
				$bln = 3;
			break;
			case "Apr":
				$bln = 4;
			break;
			case "May":
				$bln = 5;
			break;
			case "Jun":
				$bln = 6;
			break;
			case "Jul":
				$bln = 7;
			break;
			case "Aug":
				$bln = 8;
			break;
			case "Sep":
				$bln = 9;
			break;
			case "Oct":
				$bln = 10;
			break;
			case "Nov":
				$bln = 11;
			break;
			case "Dec":
				$bln = 12;
			break;
		}
		$jadi = $thn."-".$bln."-".$tgl;
		return $jadi;
	}

}
?>
