            <H2>Edit Author # <?php echo $authorById->aid; ?></h2>
			<hr/>
            
         <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
		
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>author/updateAuthor" method="post">
                <input type="hidden" name="aid" value="<?php echo $authorById->aid; ?>">
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" value="<?php echo $authorById->author; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>			
