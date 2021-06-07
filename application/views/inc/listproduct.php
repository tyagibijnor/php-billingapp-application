<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url();?>lib/jquery.dataTables.css">

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
    <tr>
      <!-- <td><?php echo $i; ?></td> -->
      <td>
        <?php 
          $catRecord=$this->category_model->getCategory($pd->cat);
          if (isset($catRecord)) {
            echo $catRecord->name;      
            }
        ?> 
      </td>
      <td><?php echo $pd->name; ?></td>
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
        <a href="<?php echo base_url();?>product/editproduct/<?php echo $pd->id;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure want to delete this record ?');" href="<?php echo base_url();?>product/deleteproduct/<?php echo $pd->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
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