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

<!-- ==================================================== -->

          
          
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


<!-- topbar -->
  <div class="container bg-Secondary">

        
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3 bg-dark">
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                <h5 class="text-warning" >বর্তমান সদস্য :
                              
                              <?php
              $sql = "SELECT * FROM all_member_form_data ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন
                    
                 </h5>  
                </div>
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2"><h5>পরিশোধকৃত সদস্য : </h5></div>
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2"><h5>সর্বমোট প্রদান :  </h5></div>
                <div class="col-md-3 col-sm-12 text-white">
                
                </div>
            </div>
            
            <table class="table table-striped table-dark table-bordered" id="datatable">
                <thead class="text-center">
                  <tr>
                    <th>ছবি</th>
                    <th>তারিখ</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>ঋণের পরিমান</th>
                    <th>মোট টাকা</th>
                    <th>বিস্তারিত</th>

                </tr>
                </thead>


            
                <?php


  $sql = "SELECT *  FROM all_member_form_data ORDER BY id ASC";
  $res = $conn->query($sql);

if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
      
    $image = $row["image"];
      
   
        echo "<tr>              
                                <td width='5%' class='text-center'> <img width='50' class='rounded' src='images/members/" . $row['image'] . "' ></td>
                                <td width='10%' > " . $row["loan_date"] . " </td>
                                <td width='15%'> " . $row["m_name"] . "</td>
                                <td width='15%'> " . $row["f_name"] . "</td>
                                <td width='15%'> " . $row["loan_amount"] . "</td>
                                <td width='15%'> " . $row["total_amount"] . "</td>          
                                <td class='text-center'><a class='btn btn-info btn-sm' id='alert' href='single_view.php?id=" . $row["id"] . "'>দেখুন</a>
                                <a class='btn btn-warning btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='action/delete.php?id=" . $row["id"] .  "&image=". $image ."'>ডিলিট</a><a class='btn btn-danger btn-sm ml-1' id='alert' href='delete.php?id=" . $row["id"] . "'>ডিলিট</a></td></tr>";
        
    }



  
} else {
    echo "no result";
}


$conn->close();
?>


             
          
            
            </table>
        </div>
    </div>
  </div>

  </div>


  
</div>


  
<?php
 include('part/footer.php');
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


<script>
    function ConfirmDelete()
    {
      var x = confirm( "আপনি কি এই তথ্য ডিলিট করতে চান?");
      if (x)
          return true;
      else
        return false;
    }
</script>    
    
<!-- ==================================================== -->


<?php
}

?>
