<?php

class Category extends Controller{
    
    public function index(){
        
        $category = $this->model('Categories');
        $data = $category->fetchAll();
        
        $this->view('category/index',$data);
    }
    
    public function add(){
        
        $category = $this->model('Categories');
        $parentData = $category->fetchParentCategory();
        if($_POST){
            print_r($_POST); exit;
            $addData = array();
            $addData['categoryname'] = $_POST['categoryname'];
            $addData['parentcategory'] = $_POST['parentcategory'];
            if($_POST['parentcategory']==0){
                $addData['categorytype'] = 0;    
            }else{
                $addData['categorytype'] = 1;
            }
            
            $imageFlag = 0;
            $addData['imagename'] = '';
            
            //Upload File
            if(isset($_FILES['categoryimage']['name']) && $_FILES['categoryimage']['name']!=''){                
                //$imagepath = $_SERVER['DOCUMENT_ROOT'].'/localhost/Management/public/tmp/photo';
                $imagepath = 'uploads/';
                $imagename = time().$_FILES['categoryimage']['name'];
                if(!empty($_FILES['categoryimage']['name'])){
                    if(!file_exists($imagepath)){
                        mkdir($imagepath, 0777, true);
                    } 
                }
                if(move_uploaded_file($_FILES['categoryimage']['tmp_name'], $imagepath.'/'.$imagename)){
                    $addData['imagename'] = $imagename;
                    $imageFlag = 1;
                }
            }
            //Save Data
            
                $saveData = $category->saveData($addData);
                if($saveData){
                  echo 'Data Succesfullly Saved.';
                  header('Location: index.php');
                }else{
                }
            
            
        }
        $this->view('category/add',$parentData);
        
    }
    
    public function edit($id = ''){
        $category = $this->model('Categories');
        $this->id = $id;
        $data= array();
        $data['edit'] = $category->fetchIdData($this->id);
        $data['selectparent'] = $category->fetchParentData($this->id);
        $data['parent'] = $category->fetchParentCategory();
        
        
        if(isset($_POST['edit_btn'])){
            $addData = array();
            $addData['categoryname'] = $_POST['categoryname'];
            $addData['parentcategory'] = $_POST['parentcategory'];
            if($_POST['parentcategory']==0){
                $addData['categorytype'] = 0;    
            }else{
                $addData['categorytype'] = 1;
            }
           $addData['id']= $_POST['id'];

            
            if($_FILES['categoryimage']['name']!=''){
                //$imagepath = $_SERVER['DOCUMENT_ROOT'].'/localhost/Management/public/tmp/photo';
                $imagepath = 'uploads/';
                $imagename = time().$_FILES['categoryimage']['name'];
                if(!empty($_FILES['categoryimage']['name'])){
                    if(!file_exists($imagepath)){
                        mkdir($imagepath, 0777, true);
                    } 
                }
                if(move_uploaded_file($_FILES['categoryimage']['tmp_name'], $imagepath.'/'.$imagename)){
                    $addData['imagename'] = $imagename;
                    $imageFlag = 1;
                }
            }else{
                $addData['imagename'] = $data['edit'][0]['category_image'];
            }
            
            $editData = $category->editData($addData);
            if($editData){
              echo 'Data Succesfullly Edited.';
              header('Location: ../index.php');
            }
        }
       $this->view('category/edit',$data);
    }
    
    public function delete($id){
        $category = $this->model('Categories');
        $this->id =$id;
        $data = $category->deleteData($this->id);
        
        if($data){
            echo 'deleted';
            header('Location: ../index.php');
        }
    }
}

