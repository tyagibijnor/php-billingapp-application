<!DOCTYPE html>

<html>

<head>

    <title>How to use sweet alert for delete confirm in Codeigniter? - itsolutionstuff.com</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

</head>

<body>

<div class="container">

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>How to use sweet alert for delete confirm in Codeigniter? - Itsolutionstuff.com</h2>

        </div>

    </div>

</div>

    

<table class="table table-bordered">

  <thead>

      <tr>

          <th>Title</th>

          <th>Description</th>

          <th width="220px">Action</th>

      </tr>

  </thead>

  <tbody>

   <?php foreach ($data as $item) { ?>      

      <tr id="<?php echo $item->id; ?>">

          <td><?php echo $item->title; ?></td>

          <td><?php echo $item->description; ?></td>          

      <td>

          <button type="submit" class="btn btn-danger remove"> Delete</button>

      </td>     

      </tr>

   <?php } ?>

  </tbody>

</table>

</div>

    

<script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");

    

       swal({

        title: "Are you sure?",

        text: "You will not be able to recover this imaginary file!",

        type: "warning",

        showCancelButton: true,

        confirmButtonClass: "btn-danger",

        confirmButtonText: "Yes, delete it!",

        cancelButtonText: "No, cancel plx!",

        closeOnConfirm: false,

        closeOnCancel: false

      },

      function(isConfirm) {

        if (isConfirm) {

          $.ajax({

             url: '/item-list/'+id,

             type: 'DELETE',

             error: function() {

                alert('Something is wrong');

             },

             success: function(data) {

                  $("#"+id).remove();

                  swal("Deleted!", "Your imaginary file has been deleted.", "success");

             }

          });

        } else {

          swal("Cancelled", "Your imaginary file is safe :)", "error");

        }

      });

     

    });

    

</script>

   

</body>

</html>


