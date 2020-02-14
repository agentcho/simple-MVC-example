<?php
require_once dirname(__FILE__)."/db/db_connection.php";

class Model{
    
    protected $connection; 
    
    public function __construct(){
        
        $this->connection = DbConnection::getInstance(); 
    }
    
    public function getData($table_name, $filter_data=array()){
        
        $filter = ""; 
        /** 
         * @todo имеет смысл вынести формирование условий поиска в отдельную функцию 
         */
        if(!empty($filter_data)){
            foreach($filter_data as $name => $value){
                $filter .= " WHERE `".$name."` = '".$this->escape($value)."' AND";
            }
        } else {
            $filter = ""; 
        }
        $filter = mb_substr($filter, 0, -3); 
        
        
        $sql = "SELECT * FROM `{$table_name}` ".$filter." ";
        
        $query = $this->query($sql); 
        return $query; 
        
    }
    
    /**
     * @todo все хорошо, если это select запрос, иначе косяк
     * @param type $sql
     * @return type
     * @throws DatabaseException
     */
    public function query($sql){
        try{
            $query = mysqli_query($this->connection, $sql); 
            if(!$query){
                throw new DatabaseException("Не удалось выполнить запрос: ". mysqli_error($this->connection));
            }
            $result = array(); 
            while($rows = mysqli_fetch_assoc($query)){
                $result[] = $rows; 
            }
            return $result; 
        } catch(DatabaseException $e){
            echo $e->getMessage(); 
        }
        
    }
    
    
    
    
    public function getOne($table_name, $filter_data=array()){
        $filter = ""; 
        
        if(!empty($filter_data)){
            foreach($filter_data as $name => $value){
                $filter .= "`".$name."` = '".$this->escape($value)."' AND";
            }
        } else {
            $filter = "`id` = 1 AHD"; 
        }
        $filter = mb_substr($filter, 0, -3); 
        
        $sql = "SELECT * FROM `{$table_name}` WHERE ".$filter." "; 
        $query = $this->query($sql); 
        $result = array(); 
        foreach($query as $key => $entry){
            foreach($entry as $field_name => $field_value){
                $result[$field_name] = $field_value; 
            }
        }
        return $result;
        
    }
    
    public function insert($table_name, $data){
        $names = ""; 
        
        $values = ""; 
        
        foreach($data as $name => $value){
            $names .= "`".$name."`,";
            $values .= "'".$this->escape($value)."',";            
            
        }
        $names = mb_substr($names,0,-1);
        $values = mb_substr($values,0,-1);
        
        $sql = "INSERT INTO `{$table_name}` (".$names.") VALUES (".$values.")";
        // надо исправить тут, чтоб все запросы шли через $this->query()
        try{
            $query = mysqli_query($this->connection, $sql); 
            if(!$query){
                throw new DatabaseException("Не удалось добавить данные: ". mysqli_error($this->connection));
            }
        } catch(DatabaseException $e){
            echo $e->getMessage();
        }
        
        return $this->getLastId(); 
    }
    
    public function update($table_name, $form_data=array(), $condition=array()){
        $data = ""; 
        
        $where = ""; 
        
        if(!empty($form_data)){
            foreach($form_data as $name => $value){
                $data .= "`".$name."` = '".$this->escape($value)."',";
            }
        } 
        $data = mb_substr($data, 0, -1); 
        
        if(!empty($condition)){
            foreach($condition as $name => $value){
                $where .= " WHERE `".$name."` = '".$this->escape($value)."' AND";
            }
        } 
        
        $where = mb_substr($where, 0, -3); 
        
        $sql = "UPDATE `{$table_name}` SET ".$data." ".$where;

        try{
            $query = mysqli_query($this->connection, $sql); 
            if(!$query){
                throw new DatabaseException("Не удалось обновить данные: ". mysqli_error($this->connection));
            }
        } catch(DatabaseException $e){
            echo $e->getMessage();
        }
    }
    
    public function removeOne($table_name, $data=array()){
        $filter = ""; 
        
        if(!empty($data)){
            foreach($data as $name => $value){
                $filter .= "`".$name."` = '".$this->escape($value)."' AND";
            }
        } 
        $filter = mb_substr($filter, 0, -3); 
        
        
        $sql = "DELETE FROM `{$table_name}` WHERE ".$filter;
        
        try{
            $query = mysqli_query($this->connection, $sql);
            if(!$query){
                throw new DatabaseException("Не удалось удалить данные: ". mysqli_error($this->connection));
            }
        } catch(DatabaseException $e){
            echo $e->getMessage();
        }
        
    }
    
    public function escape($string){
        return mysqli_real_escape_string($this->connection, $string); 
    }
    
    public function getLastId(){
        return mysqli_insert_id($this->connection); 
    }
}