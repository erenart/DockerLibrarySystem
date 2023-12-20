<?php
class DB{
    
    var $DBHost = "mysql_db";
    var $DBUser = "root";
    var $DBPass = "root";
    var $DBName = "librarysystem";
    var $connection;
        
    function __construct() {
        
        try{
        $this->connection=new PDO("mysql:host=".$this->DBHost.";DBName=".$this->DBName.";charset=utf8", $this->DBUser, $this->DBPass);
        $this->connection->exec("USE ".$this->DBName);
        }
        catch(PDOException $error){
            echo $error->getMessage();
            exit();
        }
    }
    
    public function GetData($table, $wherefields="", $wherearrayvalue="", $orderby="ORDER BY ID ASC", $limit="") {
        $this->connection->query("SET CHARACTER SET utf8");
        $sql = "SELECT * FROM ".$table;
        if(!empty($wherefields) && !empty($wherearrayvalue)) {
            $sql.=" ".$wherefields;
            if(!empty($orderby)){$sql.=" ".$orderby;}
            if(!empty($limit)){$sql.=" LIMIT ".$limit;}
            $execute= $this->connection->prepare($sql);
            $result=$execute->execute($wherearrayvalue);
            $value=$execute->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            if(!empty($orderby)){$sql.=" ".$orderby;}
            if(!empty($limit)){$sql.=" LIMIT ".$limit;}
            $value=$this->connection->query($sql,PDO::FETCH_ASSOC);
        }
        if($value!=false && !empty($value)){
            $records=array();
            foreach($value as $infos){
                $records[]=$infos;
            }
            return $records;
        }
        else
        {
            return false;
        }
    }
    
    public function filter($val, $tf=false) {
        if($tf==false){$val=strip_tags($val);}
        $val= addslashes(trim($val));
        return $val;
    }
    
    
}

?>