<H2>Add Product</h2>
			<hr/>
		
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
       	
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>product/addproductform" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control span12">
                </div>
                
                <div class="form-group">
                    <label>Category</label>
 <select name="cat">
 <option value="Select One">Select One</option>
 <?php
 foreach ($catdata as $ddata) {
 ?>
<option value="<?php echo $ddata->id;?>"><?php echo $ddata->name;?></option>
 
<?php } ?>

</select>
                </div>
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="unit" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Tax Type</label>
                    <input type="text" name="tax" class="form-control span12">
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
