<?php 
// session_start();
// if(isset($_SESSION['email'])){

// }else{
//   header("Location: Login.php");
// }

?>

<!-- 
<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <div class="container"> -->
    <!-- Button trigger modal -->




      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           Launch demo modal
      </button>

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-3">

       <form action="classes/Controller.php?a=save_post" method="Post">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control"  id ="title">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Announcement Details</label>
  <textarea class="form-control" name="Details" id="Details" rows="3"></textarea>
</div> -->
<!-- <div class="d-flex justify-content-start">
    <button class="btn btn-primary" id="myBtn" type="submit">Button</button>
</div> -->
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
      </div>
    </div>
  </div>
  </form> 
</div>
  </div> -->
  <!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- DataTable CSS  -->
    <!-- <link rel="stylesheet"        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
  <!-- Bootstrap CSS -->
  <!-- <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" /> -->
  
  <title>Alumni Tracer</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  
        <!-- <div class="container p3 my-5 bg-light border border-primary">
          <div class="btnAdd">
            <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add Post</a>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table id="example" class="display nowrap table-hover table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <th>Id</th>
                  <th>Title</th>
                  <th class="none">Details</th>
                  <th>TimeStamp</th>
                  <th>Options</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="col-md-2"></div>
          </div>
          </div> -->
          <!-- <div class="container table-responsive">
      <table id="example" class="display nowrap table-hover table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
          <thead>
                  <th>Id</th>
                  <th>Title</th>
                  <th class="none">Details</th>
                  <th>TimeStamp</th>
                  <th>Options</th>
                </thead>
          </tr>
        </thead>

        <tbody>
        </tbody>
      </table>
    </div> -->

    <div class="container p-3 my-5 bg-light border border-primary">
    <div class="btnAdd d-flex justify-content-end">
            <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add Post</a>
          </div>
         <table id="example" class="display" cellspacing="0" width="100%">
            <!-- <table id="example" class="table table-striped nowrap" style="width:100%"> -->
            <thead>
                <tr>
                <th>Id</th>
                  <th>Title</th>
                  <th class="none">Details</th>
                  <th>TimeStamp</th>
                  <th>Options</th>
                </tr>
          
              </thead>
              <tbody>
              </tbody>
            </table>
    </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">


    $(document).ready(function() {

//       $("#example").DataTable({
//   responsive: true,
// })
      $('#example').DataTable({
        responsive: true,
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        // 'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': '/AlumniTracer/classes/Controller.php?a=fetchdata',
          'type': 'post',
        },

        
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0,4],
          }]
      });
      // $("#example_processing").dialog("close");  
    });
    $(document).on('submit', '#addPost', function(e) {
      e.preventDefault();
      var addTitle = $('#addTitle').val();
      var addDetails = $('#addDetails').val();

      if (addTitle != '' && addDetails != '') {
        $.ajax({
          url: "/AlumniTracer/classes/Controller.php?a=save_post",
          type: "post",
          data: {
            Title: addTitle,
            Details: addDetails,
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
              $('#addTitle').val('');
              $('#addDetails').val('');
              // $('#addDetails').removeAttr('value');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updatePost', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var trid = $('#trid').val();
      var Title = $('#updateTitle').val();
      var Details = $('#updateDetails').val();
      var id = $('#id').val();
      var TimeStamp = $('#timeStamp').val();
      console.log(id);
      console.log(Title);
      console.log(Details);
      
      if (Title != '' && Details !='') {
        $.ajax({
          url: "/AlumniTracer/classes/Controller.php?a=updateuser",
          type: "post",
          data: {
            id: id,
            Title: Title,
            Details: Details,
            TimeStamp: TimeStamp,
          },
          success: function(data) {
            var json = JSON.parse(data);
            console.log(json);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              // var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              // var row = table.row("[id='" + trid + "']");
              // row.row("[id='" + trid + "']").data([id, Title, Details,TimeStamp,button]);
              table.draw();
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');

      var currentdate = new Date(); 
    var datetime = "Last Sync: " + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

      $('#exampleModal').modal('show');

      $.ajax({
        url: "/AlumniTracer/classes/Controller.php?a=getpostdata",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#updateTitle').val(json.title);
          $('#updateDetails').val(json.Details);
          $('#id').val(json.Id);
          $('#trid').val(json.Id);
          // $('#timeStamp').val(datetime);
          
        }
      })
    });
    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "/AlumniTracer/classes/Controller.php?a=deletepost",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })

  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updatePost">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Title</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="updateTitle" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addCityField" class="col-md-3 form-label">Details</label>
              <div class="col-md-9">
                 <textarea rows="2" cols="20" wrap="hard" class="form-control" id="updateDetails" ></textarea>  
              </div>
            </div>
            <!-- <div class="mb-3 row">
              <label for="addCityField" class="col-md-3 form-label">Date Time Edited</label>
              <div class="col-md-9">
                  <input type="text" class="form-control" value="<?php echo date('h:i:s', time()); ?>" id="timeStamp" name="name">
              </div>
            </div> -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Post Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addPost" action="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Title</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addTitle" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addCityField" class="col-md-3 form-label">Details</label>
              <div class="col-md-9">
                 <textarea wrap="hard" class="form-control" id="addDetails" rows="3"></textarea>  
              </div>
            </div>
        </div>
        <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
  <style>
    .modal-backdrop {
  z-index: -1;
}
.home-section{
        position: absolute;
    }
  </style>
  <!DOCTYPE html>
<html>
  <head>
</html>
<script src="/AlumniTracer/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
</html>