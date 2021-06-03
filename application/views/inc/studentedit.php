            <H2>Edit Student # <?php echo $studentById->sid; ?></h2>
			<hr/>
            
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
		
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>student/updateStudent" method="post">
                <input type="hidden" name="sid" value="<?php echo $studentById->sid; ?>">
                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" name="studentname" value="<?php echo $studentById->studentname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
 <select name="department">
 <option value="">Select One</option>
 <?php
 foreach ($departmentdata as $ddata) {
    if ($studentById->department == $ddata->did) { ?>
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
                    <label>Roll No.</label>
                    <input type="text" name="rollnumber" value="<?php echo $studentById->rollnumber; ?>" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="regnumber" value="<?php echo $studentById->regnumber; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $studentById->phone; ?>"class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>			
