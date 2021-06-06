<H2>Book Details</h2>
      <hr/>
        <div class="panel-body" style="width:600px;">
        <div class="form-group">
          <?php 
         // print_r($studentbyregistration);
          ?>
                    <label>Book Name</label>
    <input type="text" readonly="" value="<?php echo $getbookdetails->book; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department Name</label>
                    <?php 
                    $depid = $getbookdetails->department;
                    $depRecord = $this->department_model->getDepartmentById($depid);
                    if(isset($depRecord))
                    { ?>
<input type="text" readonly="" value="<?php echo $depRecord->department;?>" class="form-control span12">
 
                    <?php }
                    ?>
                       </div>


                <div class="form-group">
                    <label>Author Name</label>
                    <?php 
                    $authorid = $getbookdetails->author;
                    $authorRecord = $this->author_model->getAuthorById($authorid);
                    if(isset($authorRecord))
                    { ?>
<input type="text" readonly="" value="<?php echo $authorRecord->author;?>" class="form-control span12">
 
                    <?php }
                    ?>
                       </div>


                <div class="form-group">
                    <label>Total Book</label>
        <input type="text" readonly="" value="<?php echo $getbookdetails->totalbook;?>" class="form-control span12">
                </div>
        </div>      
