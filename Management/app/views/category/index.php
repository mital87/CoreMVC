
<a href="<?php  echo SITE_URL ?>/category/add">Add Category</a>
<table class="table table-striped">
    <tr>
        <th>Category Name</th>
        <th>Category Image</th>
        <th>Parent Category</th>
        <th>Operations</th>
    </tr>
    <?php foreach($data as $key=>$value): ?>
    <tr>
        <?php  
            if(!empty($value['category_image'])){
                $catimage = "<img src='".SITE_URL."/uploads/".$value['category_image']."' width='100' height='100' >";
            }else{
                $catimage = "NO IMAGE";
            }
        ?>
        <td><?php echo $value['category_name'] ?></td>
        <td><?php echo $catimage ?></td>
        <td><?php echo $value['category_type'] ?></td>
        <td><a href="<?php  echo SITE_URL ?>/category/edit/<?php echo $value['id'] ?>">Edit</a>
            <br/>
            <a href="<?php  echo SITE_URL ?>    /category/delete/<?php echo $value['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

