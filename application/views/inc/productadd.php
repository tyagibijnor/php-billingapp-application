<h2>Add Product</h2>
        <hr/>
        <?php
        $msg=$this->session->flashdata('msg');
         if(isset($msg)) { 
             echo $msg;
             //echo '<script type="text/javascript">alert("'.$msg.'"));</script>';
             
         }?> 

    <div class="panel-body" style="width:600px;">
        <form action="<?php echo base_url();?>product/addproductform" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text", placeholder = "Name", name="name", class="form-control span12" />
            </div>
            <div class="form-group">
                <label>Unit</label>
<select name="unit" class="form-control span12">
<option value="" disabled selected>Select Unit</option>
<?php
foreach ($unitdata as $ud) {
?>
<option value="<?php echo $ud->id;?>"><?php echo $ud->name;?></option>

<?php } ?>

</select>
            </div>
            <div class="form-group">
                <label>Category</label>
<select name="cat" class="form-control span12">
<option value="" disabled selected>Select Category</option>
<?php
foreach ($catdata as $cd) {
?>
<option value="<?php echo $cd->id;?>"><?php echo $cd->name;?></option>

<?php } ?>

</select>
            </div>
            
            <div class="form-group">
                <label>Tax</label>
<select name="tax" class="form-control span12">
<option value="" disabled selected>Select Tax</option>
<?php
foreach ($taxdata as $td) {
?>
<option value="<?php echo $td->id;?>"><?php echo $td->name;?></option>

<?php }  ?>

</select>
            </div>
            <div class="form-group">
                <label>Rate</label>
                <input type="text" name="rate" class="form-control span12">
            </div>
            <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit"> 
            </div>
                
        </form>
    </div>			
