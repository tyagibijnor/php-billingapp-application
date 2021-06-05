            <H2>Edit Department # <?php echo $departmenttById->did; ?></h2>
			<hr/>
            
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
		
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>department/updateDepartment" method="post">
                <input type="hidden" name="did" value="<?php echo $departmenttById->did; ?>">
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="department" value="<?php echo $departmenttById->department; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>			
