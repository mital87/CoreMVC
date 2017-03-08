<form method="post" enctype="multipart/form-data" novalidate="novalidate" id="registerform">
  <div class="form-group">
    <label for="categoryname">Category Name</label>
    <input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Category Name">
  </div>
  <div class="form-group">
    <label for="categoryimage">Category Image</label>
    <input type="file" id="categoryimage" name="categoryimage">
    <p class="help-block">Only Image files .</p>
  </div>  
   <div class="form-group">
     <label for="parentcategory">Select Parent Category:</label>
     <select class="form-control" id="parentcategory" name="parentcategory">
       <option value="0">-- Select Parent Category --</option>
       <?php foreach ($data as $key=>$value): ?>
       <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
       <?php endforeach; ?>
     </select>
   </div>
    <input type="submit" name="submit" value="submit">
<!--  <button type="submit" class="btn btn-default" name="add_btn" id="submitbtn">Submit</button>-->
</form>
<div class="errormsg">
    
</div>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#registerform").validate({
    
        // Specify the validation rules
        rules: {
            categoryname: {
                required : true,
            },
            categoryimage:{
              required : true, 
              extension : "jpg|png|jpeg|gif"
            },
//            categoryimage: {
//                    extension: "jpg|png|jpeg|gif"
//                },
//            gender: "required",
//            address: "required",
//            email: {
//                required: true,
//                email: true
//            },
//            username: "required",
//            password: {
//                required: true,
//                minlength: 5
//            }
        },
        
        // Specify the validation error messages
        messages: {
            categoryname: {
                required: "Please enter your name"
            },
            categoryimage : {
                required : "please enter image",
                extension : "select valid file"
            }
//            categoryimage: {
//                    extension: "Please upload only jpg, png, jpeg or gif image"
//                }
//            gender: "Please specify your gender",
//            address: "Please enter your address",
//            email: "Please enter a valid email address",
//            username: "Please enter a valid username",
//            password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long"
//            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

});    
</script>