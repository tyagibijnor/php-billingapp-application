<script src="<?php echo base_url();?>lib/jquery.dataTables.JS" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url();?>lib/jquery.dataTables.css">

<h2>Author List</h2>
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
      <th>No</th>
      <th>Auhtor</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i =0; 
    foreach ($authordata as $sdata) {
      # code...

      $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->author; ?></td>
      <td>
          <a href="<?php echo base_url();?>author/editauthor/<?php echo $sdata->aid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure want to delete this record ?');" href="<?php echo base_url();?>author/deleteauthor/<?php echo $sdata->aid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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