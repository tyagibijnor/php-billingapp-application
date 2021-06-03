<script src="<?php echo base_url();?>lib/jquery.dataTables.JS" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url();?>lib/jquery.dataTables.css">
   

<h2>Issue Book List</h2>
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
      <th>Employee Name</th>
      <th>Registration Number</th>
      <th>Department</th>      
      <th>Book Name</th>
      <th>Issue Date</th>
      <th>Return Date</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php 
    $i =0; 
    foreach ($allissuebookdata as $sdata) {
      # code...

      $i++;
    ?>
    <tr>
      <td><?php echo $i;?></td>

        <td><?php echo $sdata->studentname; ?></td> 
        <td><?php echo $sdata->registrationnumber; ?></td> 

        <td>
            <?php
            $depId=$sdata->department;
            $depRecord=$this->department_model->getDepartmentById($depId);
            if (isset($depRecord)) {
            echo $depRecord->department;      
            }
            ?>
      </td> 
        <td>
          <?php
            $bookId=$sdata->book;
            $bookRecord=$this->book_model->getBookById($bookId);
            if (isset($bookRecord)) { ?>
              <a href="<?php echo base_url();?>manage/viewbook/<?php echo $bookId;?>" target="_blank"><?php 
            echo $bookRecord->book;      
            }
            ?>
        </td> 
        <td><?php echo date("d-m-Y",strtotime($sdata->issuedate)); ?></td> 
         
        <td><?php echo $sdata->returndate; ?></td> 
         
         <td>
          <a onclick="return confirm('Are you sure want to delete this record ?');" href="<?php echo base_url();?>manage/deleteissuebook/<?php echo $sdata->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
          ||
          <a target="_blank" href="<?php echo base_url();?>manage/viewstudent/<?php echo $sdata->registrationnumber;?>" role="button" data-toggle="modal"><i class="fa fa-eye"></i></a>
      </td>
    
  
    </tr>
  <?php } ?>  
  </tbody>

</table>


<script>
                 $(document).ready(function(){
                    $("#navneet").DataTable();
                    });

             </script>