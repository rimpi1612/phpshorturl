
		 <?php 
        include('header.php');
        include_once '../config/database.php';
        include_once '../models/ShortUrl.php';
        $database = new Database();
        $db = $database->getConnection();
        $item = new ShortUrl($db);
        $stmt = $item->getUrls();
        if(isset($_GET['type']) && $_GET['type']=='delete'){
            $item->id=$_GET['id'];
            $item->deleteUrl();
        }
        if(isset($_GET['type']) && $_GET['type']=='status'){
			   $item->id=$_GET['id'];
			   $status=$_GET['status'];
            if($status=='active'){
               $item->urlStatus = 1;
               
            }else{
               $item->urlStatus = 0;
               
            }
            $item->updateUrlStatus();
		   }
       ?>
     
         <!-- Page Content Start -->
         <!-- ================== -->
         <div class="wraper container-fluid">
            <div class="page-title">
               <h3 class="title">Short Link</h3>
			   <h4 class="title"><a href="form.php">Add Link</a></h4>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Text</th>
                                          <th>Short Link</th>
                                          <th>Link</th>
                                          <th>Hit Count</th>
										  <th></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                              <?php
                              $i = 1;
                               while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                 extract($row);
										?>
                                       <tr>
                                          <td><?php echo $i++;?></td>
                                          <td><?php echo $row['url_label']?></td>
                                          <!--td><!?php //echo $row['short_url']?></td-->
                                          <td><a href="<?php echo "http://localhost/shorturl/" . $row['short_url']?>" target="_blank">
                                             <?php echo "http://localhost/shorturl/".$row['short_url']?></a>
                                          </td>
                                          <td><?php echo $row['long_url']?></td>
                                          <td><?php echo $row['hit_count']?></td>
										  <td>
										   <a href="?id=<?php echo $row['id']?>&type=delete">Delete</a>
                                    <?php
                                       if($row['url_status']==1){
                                          ?>
                                          <a href="?id=<?php echo $row['id']?>&type=status&status=deactive">Active</a>
                                          <?php
                                       } else{
                                          ?>
                                          <a href="?id=<?php echo $row['id']?>&type=status&status=active">Deactive</a>
                                          <?php
                                       }
                                 ?>
                                 </td>
                                       </tr>
                                       <?php  } ?>
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
         
		 <?php include('footer.php')?>