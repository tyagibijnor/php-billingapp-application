            <H2>Edit Book # <?php echo $bookById->bid; ?></h2>
			<hr/>
            
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
		
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>book/updateBook" method="post">
                <input type="hidden" name="bid" value="<?php echo $bookById->bid; ?>">
                <div class="form-group">
                    <label>Book</label>
                    <input type="text" name="book" value="<?php echo $bookById->book; ?>" class="form-control span12">
                </div>
                  <div class="form-group">
                    <label>Department</label>
 <select name="department">
 <option value="">Select One</option>
 <?php
 foreach ($departmentdata as $ddata) {
    if ($bookById->department == $ddata->did) { ?>
        <option value="<?php echo $ddata->did;?>" selected='seleted'><?php echo $ddata->department;?></option>
<?php
        # code...
    }
 ?>
<option value="<?php echo $ddata->did;?>"><?php echo $ddata->department;?></option>
 
<?php } ?>

</select>

                

                </div>
                  <div class="form-group">
                    <label>Author</label>
 <select name="author">
 <option value="">Select One</option>
 <?php
 foreach ($authordata as $ddata) {
    if ($bookById->author == $ddata->aid) { ?>
        <option value="<?php echo $ddata->aid;?>" selected='seleted'><?php echo $ddata->author;?></option>
<?php
        # code...
    }
 ?>
<option value="<?php echo $ddata->aid;?>"><?php echo $ddata->author;?></option>
 
<?php } ?>

</select>

                

                </div>

                <div class="form-group">
                    <label>Total Book</label>
                    <input type="text" name="totalbook" value="<?php echo $bookById->totalbook; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>			
