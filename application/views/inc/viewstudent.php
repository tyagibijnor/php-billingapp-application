<H2>Student Details</h2>
      <hr/>
        <div class="panel-body" style="width:600px;">
        <div class="form-group">
          <?php 
         // print_r($studentbyregistration);
          ?>
                    <label>Student Name</label>
    <input type="text" readonly="" value="<?php echo $studentbyregistration->studentname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <?php 
                    $depid = $studentbyregistration->department;
                    $depRecord = $this->department_model->getDepartmentById($depid);
                    if(isset($depRecord))
                    { ?>
<input type="text" readonly="" value="<?php echo $depRecord->department;?>" class="form-control span12">
 
                    <?php }
                    ?>
                       </div>
                <div class="form-group">
                    <label>Roll No.</label>
        <input type="text" readonly="" value="<?php echo $studentbyregistration->rollnumber;?>" class="form-control span12">
                </div>
        <div class="form-group">
                    <label>Reg. No.</label>
        <input type="text" readonly="" value="<?php echo $studentbyregistration->regnumber;?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone</label>
        <input type="text" readonly="" value="<?php echo $studentbyregistration->phone;?>" class="form-control span12">
                </div>
                   
        </div>      
