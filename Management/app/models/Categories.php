<?php

class Categories extends Database{
    
    public $name;
    public $id;
    public $db;
    public function __construct()
    {
       $this->db = $this->databasesql();
    }
    public function fetchAll(){
        
        $selectQuery = $this->db->prepare('select * from category');
        $selectQuery->execute();
        $data = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function fetchParentCategory(){
        $selectQuery = $this->db->prepare('select category_name , id from category where category_type=?');
        $selectQuery->bindValue(1,0,PDO::PARAM_INT);
        $selectQuery->execute();
        $parentData = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $parentData;
    }
    
    public function saveData($data){        
        $insertQuery = $this->db->prepare('insert into `category` (`id`,`category_name`,`category_image`,`category_type`,`parent_category`)'
                                .'values (NULL,?,?,?,?)');
        $insertQuery->bindValue(1,$data['categoryname'],PDO::PARAM_STR);
        $insertQuery->bindValue(2,$data['imagename'],PDO::PARAM_STR);
        $insertQuery->bindValue(3,$data['categorytype'],PDO::PARAM_INT);
        $insertQuery->bindValue(4,$data['parentcategory'],PDO::PARAM_INT);
        
        if($insertQuery->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function fetchIdData($id){
        $selectEditQuery = $this->db->prepare('select * from category where id = ?');
        $selectEditQuery->bindValue(1,$id,PDO::PARAM_INT);
        $selectEditQuery->execute();
        
        $data = $selectEditQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function fetchParentData($id){
        
        $selectParent = $this->db->prepare('select p.id,p.category_name from category c left join category p on c.parent_category=p.id where c.id= ?');
        $selectParent->bindValue(1,$id,PDO::PARAM_INT);
        $selectParent->execute();
        $data =  $selectParent->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function editData($data){
        
        $updateQuery = $this->db->prepare('update category set category_name=? , category_image=?, category_type=?,parent_category=? where id=?');
        $updateQuery->bindValue(1,$data['categoryname'],PDO::PARAM_STR);
        $updateQuery->bindValue(2,$data['imagename'],PDO::PARAM_STR);
        $updateQuery->bindValue(3,$data['categorytype'],PDO::PARAM_INT);
        $updateQuery->bindValue(4,$data['parentcategory'],PDO::PARAM_INT);
        $updateQuery->bindValue(5,$data['id'],PDO::PARAM_INT);
        
        if($updateQuery->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function deleteData($id){
        $deleteQuery = $this->db->prepare('delete from category where id = ?');
        $deleteQuery->bindValue(1,$id,PDO::PARAM_INT);
        if($deleteQuery->execute())
        {
            return true;
        }else{
            return false;
        }
    }
}