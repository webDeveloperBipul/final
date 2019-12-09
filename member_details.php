
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
 
   
$id = $_GET['id'];
/* total joma */


$sql = "SELECT sum(joma) AS `joma` FROM `member_premier_data` where current_id=$id";
        
      
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
if($data){
 $joma = $data['joma'];
}
$sql = "SELECT * FROM all_member_form_data WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {

  include('part/header.php');
   ?>
<!-- --------------------------------------------------------------------------------------------- -->



          
          

  <!-- Bootstrap core JavaScript-->

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
                        <a href="running_member.php" class="btn btn-sm btn-secondary ml-2 mt-1">বর্তমান সদস্য
                        </a>
                        <a href="running_member.php" class="btn btn-sm btn-secondary ml-2 mt-1">বর্তমান সদস্য
                        </a>
                        <a href="add_member.php" class="btn btn-sm btn-success ml-2 mt-1">পরিশোধ
                        </a>
                        <a href="add_member.php" class="btn btn-sm btn-info ml-2 mt-1">সদস্য যোগ করুন
                        </a>
                        <a href="member_details.php?id=<?php echo $id;?>" class="btn btn-sm btn-danger ml-2 mt-1">বিস্তারিত  দেখুন
                        </a>
                     </ul>
               </div>
            </nav>

  <div class="container">
     <!-- Page Heading -->

       
          
        <div class="row mt-3">
            <div class="col-md-3">
            <div class="d-flex mt-4">
			<div class="image_outer_container">
				<div class="green_icon"></div>
				<div class="image_inner_container shadow">
        <?php
if($row['image']){
echo "<div id='img_div'>";
echo "<img  alt='image of " . $row["m_name"] . " ' src='images/" . $row['image'] . "' >";
echo "</div>";
}
else{
echo '<img src="images/app_image/blan.jpg" alt="image not found"></br>';
echo "<button class='camera_btn btn btn-sm btn-info'><i class='fas fa-camera'></i></button>";
}
?>
				</div>
			</div>
		</div>
            </div>     
   
            
       <!-- ============================================= 111111111  ========================================================= -->

    <div class="col-md-5 mt-4">
         <div class="card shadow p-2">
              <div class="table-responsive">
              <table class="table table-borderless">
                <thead>
                    <tr >
                      <th scope="col" width="150"><h4>নাম: </h4></th>
                    <th class="" scope="col"><h4><?php $total = $row['total_amount']; echo $row['m_name'];?></h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"> <h5>পিতার নাম : </h5></th>
                    <td class=""><h5><?php echo $row['f_name'];?></h5></td>
                  
                    </tr>
                    
                    <tr>
                    <th scope="row"><h5>মোবাইল: </h5></th>
                    <td class=""><h5><?php echo $row['phone_no'];?></h5></td>
                    </tr>
                </tbody>
                </table>
              </div>
          </div>
    </div> 
       <!-- table 1 end-->    


   

<!-- ============================================= 222222222 ========================================================= -->   
    
<?php
 $sql = "SELECT sum(savings) AS `savings` FROM `member_premier_data` where current_id=$id";
 
 $result = mysqli_query($conn, $sql);
 $data = mysqli_fetch_array($result);
 $savings = $data['savings'];
 $l_total= $row['total_amount'];
 $profit= $row['profit_amount'];
 
?>


    <div class="col-md-4  mt-4">
         <div class="card shadow p-2">
              <div class="table-responsive">
              <table class="table table-warning">
                <thead>
                    <tr>
                      <th scope="col"><h5 class="text-danger">মোট লোন :</h5></th>
                    <td class="text-right" scope="col"><h5><?php echo $l_total; ?> টাকা</h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h5 class="text-danger">আদায়:</h5></th>
                    <td class="text-right" scope="col"><h5><?php echo $joma;?> টাকা</h5></td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><h5>বাকী: </h5></th>
                    <td class="text-right"><h5><?php echo ($l_total-$joma);?> টাকা</h5></td>
                 
                    </tr>
                <tr>
                    <th scope="row"><h5>সঞ্চয় আদায়: </h5></th>
                    <td class="text-right"><h5><?php echo $savings;?> টাকা</h5></td>
                    </tr>
                    
                                   
                </tbody>
                </table>
              </div>
          </div>
    </div> 
       <!-- table 2 end-->    
       
       
        </div>
    </div>

<hr>


<!-- ============================================= 33333333 ========================================================= -->   

<div class="container">
<div class="text-right mb-3">
<button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">আরও তথ্য যোগ করুন</button>

</div>
    <div class="row">
    
        <div class="col-md-6 col-sm-12">
        <div class="text-center h5 mb-3">
        ঋণ সংক্রান্ত বিবরণী
        </div>
        <div class="table-responsive shadow">
      
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col" width="200"><h6 class="text-danger">ঋণ গ্রহনের তারিখ: </h6></th>
                    <td class="text-left" scope="col"><h6><?php echo $row['loan_date'];?></h6></td>
                    </tr>
                </thead>
                <tbody>
                <th scope="row"><h6>ঋণের পরিমাণ: </h6></th>
                    <td class="text-left"><h6><?php echo $row['total_amount'];?> টাকা</h6></td>
                  </tr>
              
                <tr>
                    <th scope="row"><h6>মূনাফার পরিমাণ: </h6></th>
                    <td class="text-left"><h6><?php echo $row['profit_amount'];?> টাকা</h6></td>
                    </tr>
                    <tr>
                    <th scope="row"><h6>সঞ্চয়ের পরিমাণ :  </h6></th>
                    <td class="text-left"><h6><?php echo $row['savings_amount'];?> টাকা</h6></td>
                 
                    </tr>

                    <tr>
                      <th scope="row"> <h6>মোট কিস্তির সংখ্যা: </h6></th>
                      <td class="text-left"><h6><?php echo $row['premier'];?> টি</h6></td>
                    </tr>
                    
                    <tr>
                      <th scope="row"> <h6>সাপ্তাহিক কিস্তির পরিমাণ: </h6></th>
                      <td class="text-left"><h6><?php echo $row['premier_amount'];?> টাকা</h6></td>
                    </tr>

                    
                    <tr>
                      <th scope="row"> <h6>ভর্তি ফি </h6></th>
                      <td class="text-left"><h6><?php echo $row['add_cost'];?> টাকা</h6></td>
                    </tr>
                    
                    
                    <tr>
                      <th scope="row"> <h6>অন্যান্য ফি </h6></th>
                      <td class="text-left"><h6><?php echo $row['others_cost'];?> টাকা</h6></td>
                    </tr>

                </tbody>
                </table>
              </div>
        </div>
        <!-- table 3 end -->


        <!-- table 4 -->
        <div class="col-md-6 col-sm-12">
        <div class="text-center h5 mb-2">
        সদস্যের পরিচিতি তথ্য
        </div>
        

<!-- =============================================  4444444444444  ========================================================= -->
        <form action="">
        <div class="table-responsive  shadow mt-3 p-0">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col" width="200"><h6>বর্তমান ঠিকানা: </h6></th>
                    <td class="text-left" scope="col"><input value="<?php echo $row['present_addr'];?> " class="ui-input" type="text"></td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                  <tr>
                    <th scope="row" width="200"><h6>স্থায়ী ঠিকানা: </h6></th>
                    <td class="text-left"><h6><?php echo $row['permanent_addr'];?></h6></td>
                    </tr>
                    <tr>
                    <tr>
                      <th scope="col" width="200"><h6>ভোটার আই.ডি নং: </h6></th>
                      <td class="text-left" scope="col"><h6><?php echo $row['nid'];?></h6></td>
                    </tr>
                    
                    <tr>
                    <th scope="row"> <h6>জামিনদার: </h6></th>
                    <td class="text-left"><h6><?php echo $row['refer_name'];?></h6></td>
                    </tr>
                    <tr>
                    <th scope="row"> <h6>জামিনদারের মোবাইল নং: </h6></th>
                    <td class="text-left"><h6><?php echo $row['refer_phone'];?></h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>জামিনদারের ঠিকানা: </h6></th>
                      <td class="text-left"><h6><?php echo $row['refer_addr'];?></h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>বিবাহিত: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>ধর্ম: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>লিঙ্গ: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>বর্তমান পেশা: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                </tbody>
                </table>
              </div>
              <!-- table 4 end -->
              </form>




        </div>
        
    </div>
</div>







<table class="table table-striped table-dark table-bordered" id="datatable">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">আরও তথ্য যোগ করুন
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form  action="action/more_info.php" method="post">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ভোটার আই.ডি নং
                        </label>
                        <input type="text" class="form-control" name="first_name" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:
                        </label>
                        <input type="text" class="form-control" name="last_name" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="test" value="<?php echo $identy; ?>" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:
                        </label>
                        <textarea class="form-control" id="message-text">
                        </textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                        <button type="submit" value="submit" name="submit" onclick="myFunction()"  class="btn btn-primary">ঠিক আছে
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>




            <!-- --------------------------------------------------------------------------------------------- -->

<?php
    }
  }

include('part/footer.php');



}
?>



