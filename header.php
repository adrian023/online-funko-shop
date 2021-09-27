<nav class="header-container">
		<a href="#"><img src="images/logo1.png" id="logo1"></a>
		<div id="nav-containerr">
			<div id="nav-menu-containerr">
				<ul class="nav-menuu">
					<li><a href="home.php"> Home </a></li>
					<li><a href="shop.php"> Shop </a></li>
					<li><a href="about.php"> About </a></li>
					<li>
          <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          
            <div class="dropdown">
			         <button class="dropbtn"><a href="#">
                <?php 
                if(!isset($_SESSION['login']))
                 echo "My Account";

                 else{
                  $email=$_SESSION['login'];
                  $sql ="SELECT FullName FROM tblusers WHERE EmailId= '$email' ";
                  $result=mysqli_query($con,$sql);
                  if (mysqli_num_rows($result) > 0) {
                  foreach($result as $result) {
                  echo htmlentities ($result['FullName']);}}
                 }
                 ?> 
                </a></button>
               <ul class="dropdown-content">
           
                       <?php if($_SESSION['login']){ ?>
                       <li><a href="purchase_history.php">Order History</a></li>
                       
                       <li><?php
                          if(!empty($_SESSION["shopping_cart"])) {
                          $cart_count = count(array_keys($_SESSION["shopping_cart"]));?>
                          <a href="cart.php">Cart <span>(<?php echo $cart_count; ?>)</span></a>
                          <?php }

                          else { ?>
                          <a href="cart.php">Cart <span>(<?php echo 0; ?>)</span></a>
                          <?php } ?>
                        </li>

                        <li><a href="logout.php">Log Out</a></li>
                        
                        <?php } 

                        else { ?>
                        <li><a href="login_reg.php">Order History</a></li>
                        <li><a href="login_reg.php">Cart</a></li>
                        <li><a href="login_reg.php">
                        <?php 
                        if(!isset($_SESSION['login']))
                        echo "Log in";

                        else
                        echo "Log out";
                        ?>
                        </a></li>
                        <?php } ?>
                      </ul>
                    </li>
                  </ul>
                </div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>