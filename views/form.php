<?php 
       include('header.php');
       $message = '';
       if(isset($_GET['message'])) {
         $message = $_GET['message'];
       }
?>
         <!-- Page Content Start -->
         <!-- ================== -->
         <div class="wraper container-fluid">
            <div class="page-title">
               <h3 class="title">Add Short Link</h3>
            </div>
            <div class="row">
               
               <div class="col-md-12">
                  <div class="panel panel-default">
                     
                     <div class="panel-body">
                        <form class="form-horizontal" role="form" action="/shorturl/api/create.php"  method="post">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Link</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="long_url" name="long_url" placeholder="Link" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputPassword3" class="col-sm-3 control-label">Custom Short Link Label</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="short_url" name="short_url" placeholder="Short Link" pattern="[A-Za-z0-9]{5,9}" title="Must contain 5 to 9 Characters and Numbers" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputPassword4" class="col-sm-3 control-label">Short Description</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="url_label" name="url_label" placeholder="Info" required>
                              </div>
                           </div>
                           
			<div class="form-group m-b-0">
                              <div class="col-sm-offset-3 col-sm-9">
                                 <button type="submit" class="btn btn-info">Generate</button>
                              </div>
                        </div>

                           <div class="form-group">
                              <p class="col-sm-3" id = "msg"><?php echo $message;?></p>
                           </div>
                           
                        </form>
                     </div>
                     <!-- panel-body -->
                  </div>
                  <!-- panel -->
               </div>
               <!-- col -->
            </div>
            <!-- End row -->
            
         </div>
         <!-- Page Content Ends -->
         <!-- ================== -->
         <!-- Footer Start -->
          <?php include('footer.php')?>
