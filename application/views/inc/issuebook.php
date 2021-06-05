             <script>
                 $(document).ready(function(){
                    $("#department").change(function(){
                        var dep = $("#department").val();
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url(); ?>manage/getBookByDepartmentId/"+dep,
                            success:function(data){
                                $("#book").html(data);
                            }

                        });
                    });
                   });

             </script>

             <H2>Issue Book</h2>
			<hr/>
		
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
       	
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>manage/addissueform" method="post">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="studentname" class="form-control span12">
                </div>

                 <div class="form-group">
                    <label>Registration Number</label>
                    <input type="text" name="registrationnumber" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Department</label>
 <select name="department" class="form-control span12" id="department">
 <option value="Select One">Select One</option>
 <?php
 foreach ($departmentdata as $ddata) {
 ?>
<option value="<?php echo $ddata->did;?>"><?php echo $ddata->department;?></option>
 
<?php } ?>

</select>
                </div>
                <div class="form-group">
                    <label>Book Name</label>
                    <select name="book" id="book" class="form-control span12"></select>
                     </div>
                     <div class="form-group">
                    <label>Return Date (dd-mm-yyyy)</label>
                    <select name="book" id="returndate" class="form-control span12"></select>
                     </div>
                
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>			
