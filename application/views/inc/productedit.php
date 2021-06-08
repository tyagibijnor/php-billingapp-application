<H2>Edit Product # <?php echo $productById->id; ?></h2>
<hr />

<?php
//print_r($productById);
$msg = $this->session->flashdata('msg');
if (isset($msg)) {
    echo $msg;
    # code...
}
?>

<div class="panel-body" style="width:600px;">

    <form action="<?php echo base_url(); ?>/product/updateProduct" method="post">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $productById-> id; ?>">
    </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $productById->name; ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Category</label>
                    <select name="category" class="form-control span12">
                    <option value="" selected disable>Select One</option>
                       <?php
                        foreach ($categorydata as $cd) {
                            if ( $cd->id == $productById->cat ) { ?>
                            <option value="<?php echo $cd->id; ?>" selected='seleted'>
                            <?php echo $cd->name; ?></option>
                            <?php } ?>
                            <option value="<?php echo $cd->id; ?>"><?php echo $cd->name; ?></option>
                            <?php } ?>
                    </select>
        
       <div class="form-group">
            <label>Unit</label>
            <select name="unit" class="form-control span12">
                        <option value="" selected disable>Select One</option>
                        <?php
                        foreach ($unitdata as $ud) {
                            if ($productById->unit == $ud->id) { ?>
                            <option value="<?php echo $ud->id; ?>" selected='seleted'>
                            <?php echo $ud->name; ?></option>
                            <?php } ?>
                            
                            <option value="<?php echo $ud->id; ?>"><?php echo $ud->name; ?></option>
                            <?php } ?>
                    </select>
            
        </div>
            <div class="form-group">
                <label>Tax</label>
                <select name="tax" class="form-control span12">
                        <option value="" selected disable>Select One</option>
                        <?php
                        foreach ($taxdata as $td) {
                            if ($productById->tax == $td->id) {?>
                            <option value="<?php echo $td->id; ?>" selected='seleted'>
                            <?php echo $td->name; ?></option>
                            <?php } ?>
                            <option value="<?php echo $td->id; ?>"><?php echo $td->name; ?></option>
                            <?php } ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Rate</label>
                <input type="text" name="rate" value="<?php echo $productById->rate; ?>" class="form-control span12">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>

    </form>
</div>