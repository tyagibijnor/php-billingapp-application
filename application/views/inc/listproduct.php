<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url();?>lib/jquery.dataTables.css">
<!-- sweet alert -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
<!-- sweet alert lib end -->
<h2>Product List</h2>
			<hr/>
       <?php
         $msg=$this->session->flashdata('msg');
        if(isset($msg)) {
            echo $msg;
            # code...
        }
        ?>
<table class="display" id="navneet">
  <thead>
    <tr>
      <!-- <th>No</th> -->
      <th>Category</th>
      <th>Name</th>
      <th>Unit</th>
      <th>Tax</th>
      <th>Rate</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i =0; 
    foreach ($productdata as $pd) {
        $i++;
    ?>
    <tr id="<?php echo $pd->id;?>">
      <!-- <td><?php echo $i; ?></td> -->
      <td>
        <?php 
          $catRecord=$this->category_model->getCategory($pd->cat);
          if (isset($catRecord)) {
            echo $catRecord->name;      
            }
        ?> 
      </td>
      <td>
      <a href="<?php echo base_url();?>product/editproduct/<?php echo $pd->id;?>">
      <?php echo $pd->name; ?></a>
      <td>
      <?php 
          $unitRecord=$this->unit_model->getUnit($pd->unit);
          if (isset($unitRecord)) {
            echo $unitRecord->name;      
            }
        ?>
      </td>
      <td>
      <?php 
          $taxRecord=$this->tax_model->getTax($pd->tax);
          if (isset($taxRecord)) {
            echo $taxRecord->name;      
            }
      ?></td>
      <td><?php echo $pd->rate; ?></td>    
    <td>
     <!--    <a href="<?php echo base_url();?>product/editproduct/<?php echo $pd->id;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure want to delete this record ?');" href="<?php echo base_url();?>product/deleteproduct/<?php echo $pd->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      -->
          <!-- <button type="submit" class="btn btn-default view"> View</button> -->
          <button type="submit" class="btn btn-danger remove"> Delete</button>
      </td>
      <!-- <td>
          <button type="submit" class="btn btn-info remove"> View</button>
      </td> -->
    </tr>
    <?php 
  }
  ?>
  </tbody>
</table>
<script>
                 $(document).ready(function(){
                    $("#navneet").DataTable();
                    });
             </script>
<script type="text/javascript">
/* For delete */

$(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");
   swal({
    title: "Are you sure?",
    text: "You will not be able to recover this product again!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel please!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      $.ajax({
         url: 'item-list/'+id,
         type: 'DELETE',
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              swal("Deleted!", "Your product has been deleted.", "success");
         }
      });
    } else {
      swal("Cancelled", "Your product is safe :)", "error");
    }
  });
});
</script>