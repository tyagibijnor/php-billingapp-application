             <H2>Add Book</h2>
			<hr/>
		  <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
       	
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>book/addbookform" method="post">
                <div class="form-group">
                    <label>Book</label>
                    <input type="text" name="book" class="form-control span12">
                </div>
                 <div class="form-group">
                 <label>Department</label>
                 <select name="department" class="form-control span12">
                 <option value="Select One">Select One</option> <?php
                foreach ($departmentdata as $ddata) { ?>
                <option value="<?php echo $ddata->did;?>"><?php echo $ddata->department;?></option><?php } ?>
</select>
                </div>
                 <div class="form-group">
                    <label>Author</label>
 <select name="author" class="form-control span12">
 <option value="Select One">Select One</option>
 <?php
 foreach ($authordata as $ddata) {
 ?>
<option value="<?php echo $ddata->aid;?>"><?php echo $ddata->author;?></option>
 
<?php } ?>

</select>
                </div>
                 <div class="form-group">
                    <label>Total Book</label>
                    <input type="text" name="totalbook" class="form-control span12">
                </div>
               
                 <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>			
