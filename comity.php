<?php
session_start();
include('action/sql_config.php');


if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {

  include('part/header.php');

   ?>

<!-- --------------------------------------------------------------------------------------------- -->





<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
               <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">
               <span>
               <i class="fa fa-tachometer-alt">
               </i>
               </span> বর্তমান সদস্য
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
               </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">বর্তমান সদস্য
                        </a>
                        <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">বর্তমান সদস্য
                        </a>
                        <a href="add_member.php" class="btn btn-sm btn-success ml-2">পরিশোধ
                        </a>
                        <a href="add_member.php" class="btn btn-sm btn-info ml-2">সদস্য যোগ করুন
                        </a>
                        <a href="member_details.php?id=<?php echo $id;?>" class="btn btn-sm btn-danger ml-2">বিস্তারিত  দেখুন
                        </a>
                     </ul>
               </div>
            </nav>

<div class="container">


    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3 bg-dark">
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                <h5 class="ml-3"> বর্তমান কমিটি:
                              
            <?php
              $sql = "SELECT * FROM comity ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  printf($rowcount);
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন
                    
                 </h5>  
                </div>
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2"><h5>মোট সঞ্চয় : </h5></div>
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2"><h5>মোট অন্যান্য ফি :  </h5></div>
                <div class="col-md-3 col-sm-12 text-white">
                <div class="text-right mt-2">
                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">কমিটি যোগ করুন</button>

                </div>
                </div>
            </div>
            
            <table class="table table-striped table-dark  table-bordered" id="datatable">
                <thead class="text-center">
                  <tr>
                
                    <th width='10%'>ছবি</th>
                    <th width='25%'>নাম</th>
                    <th width='15%'>পদবী</th>
                    <th width='20%'>মোবাইল নং</th>
                    <th width='20%'>অ্যাকশন</th>
               
                  
                </tr>
                </thead>

                <?php


  $sql = "SELECT * FROM comity ORDER BY id desc";
  $res = $conn->query($sql);

if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {

                             $image = $row["image"];
 
        echo "<tr>
                                <td width='10%' class='text-center'> 
                                <img width='50'  class='rounded' src='images/comity/" . $image . "' >
                                </td>
                                <td > " . $row["name"] . "</td>
                            
                                <td class='text-center'> " . $row["podobi"] . "</td>
                                <td class='text-center'> " . $row["phone"] . "</td>
                       
                              
                                         
                                <td class='text-right'><a class='btn btn-info btn-sm' id='alert' href='comity_single_view.php?id=" . $row["id"] . "'>দেখুন</a>
                                <a class='btn btn-warning btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='action/comity_delete.php?id=" . $row["id"] . "&image=". $image ."'>ডিলিট</a><a class='btn btn-danger btn-sm ml-1' id='alert' href='delete.php?id=" . $row["id"] . "'>ডিলিট</a></td></tr>";
 

                                
        
    }


} else {
  echo "no result";
}


?>
             



          
            
            </table>
        </div>
    </div>
  </div>

  </div>


  
</div>
          
            
              
 </div>

        
          <table class="table  table-dark table-bordered" id="datatable">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">কমিটি যোগ করুন
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form  action="action/comity_insert.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                        <label for="datepicker" class="col-form-label">তারিখ
                        </label>
                        <input class="form-control" id="datepicker" name="date" type="text" value="">
                        </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
                        <label for="podobi" class="col-form-label">পদবী
                        </label>
                        <input type="text" class="form-control" name="podobi" id="podobi">
                      </div>
                          
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="name" class="col-form-label">নাম
                        </label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      
                      <div class="form-group">
                        <label for="f_name" class="col-form-label">পিতার নাম
                        </label>
                        <input type="text" class="form-control" name="f_name" id="f_name">
                      </div>
                     

                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="phone" class="col-form-label">মোবাইল নং
                        </label>
                        <input type="text" class="form-control" name="phone" id="phone">
                      </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="savings" class="col-form-label">সঞ্চয়ের হার
                        </label>
                        <input type="text" class="form-control" name="savings" id="savings">
                      </div>
                        </div>
                      </div>
                    
                  
                      <div class="form-group">
                        <label for="adrr" class="col-form-label">ঠিকানা
                        </label>
                        <input type="text" class="form-control" name="address" id="adrr">
                      </div>
                    
                      
                      <div class="form-group">
                        <input type="hidden" name="test" value="<?php echo $identy; ?>" class="form-control" id="recipient-name">
                      </div>
                      <label for="upload_img" class="btn btn-success btn-sm mt-4">ছবি যোগ করুন</label>
                              <input style=" display:none;" class="mb-5 mt-3" type="file" name="image" id="upload_img" accept="image/*">
                     
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">অন্যান্য তথ্য
                        </label>
                        <textarea class="form-control" id="message-text" name="others_info">
                        </textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল
                        </button>
                        <button type="submit" value="submit" name="img_upload"  class="btn btn-primary">ঠিক আছে
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </table>
          
 

 





<!-- ==================================================== -->

<?php

include('part/footer.php');

}

?>



<script>
$(document).ready(function() {
  $('#datatable').DataTable();
} );
</script>

<script>
$(document).ready(function () {
document.querySelector('warning').onclick = function () {
  swal({
  title: 'Are you sure?',
  text: 'Some text.',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Yes!',
  cancelButtonText: 'No.'
}).then(() => {
  if (result.value) {
    // handle Confirm button click
  } else {
    // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
  }
});
    };

});
</script>