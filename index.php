<?php 
require 'inc/Header.php';
if(isset($_SESSION['carname']))
{
	?>
	<script>
	window.location.href="dashboard.php";
	</script>
	<?php 
}
else 
{
}
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
                <form class="theme-form" method="post">
                  <h4 class="text-center">Sign in to account</h4>
                  <p class="text-center">Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" name="username" type="text" required="" placeholder="AXZ" value="admin">
					<input type="hidden" name="type" value="login"/>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********" value="admin@123">
                     
                    </div>
                  </div>
				  
                  <div class="form-group mb-0">
                    
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in                 </button>
                    </div>
                  </div>
                 
                </form>
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
<!-- 
  <script>
    document.querySelector('.theme-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        const formData = new FormData(this);
        
        fetch('inc/Operation.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.ResponseCode === "200" && data.Result === "true") {
                alert(data.message);
                window.location.href = data.action; // Redirect to dashboard
            } else {
                alert(data.title + ": " + data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error.message);
            alert('An error occurred. Please try again.');
        });
    });
</script> --> 

</html>