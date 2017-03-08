
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="categoryname">Category Name</label>
    <input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Category Name" value="<?php echo $data['edit'][0]['category_name']?>">
  </div>
  <div class="form-group">
    <label for="categoryimage">Category Image</label>
    <?php if($data['edit'][0]['category_image']!=''):  ?>
    <img src='../../../public/uploads/<?php echo $data['edit'][0]['category_image'] ?>' width='100' height='100' >
    <?php endif; ?>
    <input type="file" id="categoryimage" name="categoryimage">
    <p class="help-block">Only Image files .</p>
  </div>  
   <div class="form-group">
     <label for="parentcategory">Select Parent Category:</label>
     <select class="form-control" id="parentcategory" name="parentcategory">
        <?php if($data['edit'][0]['parent_category']!='' && $data['edit'][0]['parent_category']!=0 ){
            echo '<option value="'.$data['selectparent'][0]['id'].'">'.$data['selectparent'][0]['category_name'].'</option>';
        }else{ 
            echo '<option value="0">-- Select Parent Category --</option>';
        }  
        ?>
       
       <?php foreach ($data['parent'] as $key=>$value): ?>
       <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
       <?php endforeach; ?>
     </select>
   </div>
    <input type="hidden" value="<?php echo $data['edit'][0]['id'] ?>" name="id" />
  <button type="submit" class="btn btn-default" name="edit_btn">Submit</button>
</form>
