<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url();?>lib/jquery.dataTables.css">

<h2>Employee List</h2>
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
      <th>Name</th>
      <th>Department</th>
      <th>EmpCode</th>
      <th>Reg</th>
      <th>Phone</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i =0; 
    foreach ($studentdata as $sdata) {
      # code...

      $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->studentname; ?></td>


      <td><?php 
      
      $depId=$sdata->department;
      $depRecord=$this->department_model->getDepartment($depId);
      if (isset($depRecord)) {
      echo $depRecord->department;      
  # code...
      }
     // print_r($depRecord);
      
 //echo $sdata->department;      


      ?></td>
      


      <td><?php echo $sdata->rollnumber; ?></td>
      <td><?php echo $sdata->regnumber; ?></td>
      <td><?php echo $sdata->phone; ?></td>
      
      <td>
          <a href="<?php echo base_url();?>student/editstudent/<?php echo $sdata->sid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure want to delete this record ?');" href="<?php echo base_url();?>student/deletestudent/<?php echo $sdata->sid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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