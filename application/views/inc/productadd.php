<h2>Add Product</h2>
        <hr/>
        <?php
        $msg=$this->session->flashdata('msg');
         if(isset($msg)) { 
             echo $msg;
             //echo '<script type="text/javascript">alert("'.$msg.'"));</script>';
             
         }?> 

    <div class="panel-body" style="width:600px;">
        <form name="product_form" id="product_form" action="<?php echo base_url();?>product/addproductform" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text", placeholder = "Name", name="name", id="name" class="form-control span12" required />
            </div>
            <div class="form-group">
                <label>Unit</label>
<select name="unit" id="unit" class="form-control span12">
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
<select name="cat" id="cat" class="form-control span12">
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
                <input type="text" name="rate" id="rate" class="form-control span12" required>
            </div>
            <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit"> 
            </div>

    <script src="<?php echo base_url();?>lib/library/jquery.min.js"></script>
    <script src="<?php echo base_url();?>lib/library/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>lib/library/additional-methods.min.js"></script>
    <script>
        if ($("#product_form").length > 0) {
            $("#product_form").validate({
                rules: {
                    name: {
                        required: true
                    },
                    unit: {
                        required: true,
                        },
                    tax: {
                        required: true,
                    },
                    cat: {
                        required: true,
                    },
                    rate: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Name is required",
                    },
                    rate: {
                        /* email: "It doe not seem valid email", */
                        required: "Rate is required",
                        /* maxlength: "Upto 50 characters are allowed", */
                    },
                    unit: {
                        required: "Please, select unit",
                    },
                },
            })
        }
    </script>                
        </form>
    </div>			


