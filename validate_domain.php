<?php 
require 'inc/Header.php';
?>
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href="#"><img class="img-fluid for-light" src="<?php echo $set['weblogo'];?>" alt="looginpage"></a></div>
              <div class="login-main"> 
              <div id="getmsg"></div>
                <div class="theme-form">
                  <h4 class="text-center">Validate Domain</h4>
                  <p class="text-center">Enter Purchase Code And Enjoy!!</p>
                  <div class="form-group">
                    <label class="col-form-label">Enter Envato Purchase Code</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Envato Purchase Code" required="">
                    <!-- <input value="2c963b64-b12c-4920-ada3-c40562651288" type="text" class="form-control" id="inputCode" placeholder="Enter Envato Purchase Code" required=""> -->
				
                  </div>
                  
				  
                  <div class="form-group mb-0">
                    
                    <div class="text-end mt-3">
                      <button type="submit" class="btn btn-primary btn-block w-100" id="redirectButton">Activate Domain</button>
                      <!-- <button class="btn btn-primary btn-block w-100" id="sub_activate">Activate Domain</button> -->
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
	  require 'inc/Footer.php';
	  ?>
      
    </div>
  </body>


</html>

<script>
  document.getElementById("redirectButton").addEventListener("click", function () {
    window.location.href = "dashboard.php";
  });
</script>
