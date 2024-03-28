<?php
require_once 'core/init.php';
//include_once 'database.php';
include_once 'header.php';
/**
 * Description of index
 *
 * @author prabitha
 */

    
$hash =isset($hash) ? $hash: "";

?>

        <div class="container-fluid vh-100" style="margin-top:300px">
            <div class="" style="margin-top:200px">
                <div class="rounded d-flex justify-content-center">
                    <div style="display:block" id="sign-up" class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Create Account</h3>
                        </div>
     
                        
                            
  <form action="" class="was-validated" id="registerform">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-envelope text-white"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary">
                                    <i class="bi bi-lock-fill text-white"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary">
                                    <i class="bi bi-unlock-fill text-white"></i>
                                </span>
                                <input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="d-grid col-12 mx-auto">
                               
    <input type="submit" class="btn btn-primary" value="Sign Up" />
                            </div>
                            <p class="text-center mt-3">Already have an account?
                                <span class="text-primary"><a onclick="login()" href="javascript:void(0);">Sign in</a></span>
                            </p>
                        </div>
  </form>  
                    </div>
                    
                       <div style="display:none" id="login" class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Sign In</h3>
                        </div>
     
                        
                            
  <form action="" class="was-validated" id="loginform">
                        <div class="p-4">
                    
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-envelope text-white"></i></span>
                                <input type="email" name="email" value="<?php echo $hash; ?>" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary">
                                    <i class="bi bi-lock-fill text-white"></i></span>
                                <input type="password" class="form-control" placeholder="password" name ="password" required>
                            </div>
                     <input type="checkbox" name="remember" id="remember" />
			Remember me
                            <div class="d-grid col-12 mx-auto">
                               
			
                                <input type="submit" class="btn btn-primary" value="Sign In" />
                            </div>
                            <p class="text-center mt-3">
                               
		
		
	
                                <span class="text-primary"><a onclick="signUp()" href="javascript:void(0);">Sign Up</a></span>
                            </p>
                        </div>
  </form>  
                    </div>
                   
                </div>
            </div>
        </div>
  <?php
        include_once 'footer.php';
  