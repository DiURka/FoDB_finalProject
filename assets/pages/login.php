        <?if ($_SESSION['signedUp'] == true) {?>
            <div class="prompt text-bg-success">
                <span><code>Signed Up </code> successfully!</span>
            </div>
        <?}
        else if ($_SESSION['prompt'] == true) {?>
            <div class="prompt text-bg-warning">
                <span>Please log in to proceed...</span>
            </div>
        <?}
        else if ($_SESSION['incorrect'] == true) {?>
            <div class="prompt text-bg-danger">
                <span>Login or password is incorrect. Check your credentials and try again...</span>
            </div>
        <?} 
        else if ($_SESSION['empty'] == true) {?>
            <div class="prompt text-bg-danger">
                <span>Plase fill out the form correctly...</span>
            </div>
        <?}?>

        <?
        $_SESSION['signedUp'] = false;
        $_SESSION['prompt'] = false;
        $_SESSION['incorrect'] = false;
        $_SESSION['empty'] = false;
        ?>
        
        <section class="d-flex align-items-center">
        <!-- <div id="error-message" class="alert alert-danger mt-3" style="display: none;"></div> -->
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="" id="signin" class="img-fluid" alt="login-image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="assets/inc/validateUser.php" method="POST">
                <!-- <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  <p class="lead fw-normal me-3">Sign in with</p>
                  <div class="brands d-inline-flex">
                    <div class="g-signin2" data-onsuccess="onGoogleSignIn"></div>
                    <i class="fab fa-facebook-f mx-2"></i>
                    <i class="fab fa-linkedin-in mx-2"></i>
                  </div>
                </div>
                
                <div class="divider d-flex align-items-center my-5">
                  <p class="text-center fw-bold mx-3">Or</p>
                </div> -->
                
                <!-- Email input -->
                <div class="form-outline my-4">
                  <input type="text" name="userName" id="form3Example3" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example3">Username or Email</label>
                </div>
                
                <!-- Password input -->
                <div class="form-outline my-4">
                  <input type="password" name="userPass" id="form3Example4" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- <div class="d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input me-2" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body">Forgot password?</a>
                </div> -->
                
                <div class="w-100 text-center text-lg-start mt-4 d-inline-flex justify-content-between align-items-end">
                  <button type='submit' name='submit' class="submit-button btn-primary btn-lg px-4">Login</button>
                  <p class="small fw-bold">Don't have an account? <a href="?id=registration" class="link-danger">Register</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>