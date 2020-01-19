<footer>
        <div class="pp-supported">
            <div class="row">
                <div class="column">
                    <span>Payment methods available</span>
                    <img src="images/payments/americanexpress.png" alt="American express" title="American express" />
                    <img src="images/payments/visa.png" alt="Visa" title="Visa" />
                    <img src="images/payments/mastercard.png" alt="Mastercard" title="mastercard" />
                  
                    <img src="images/payments/mpesa.png" alt="Mpesa" title="Mpesa" />
                    
                    <img src="images/payments/airtel.png" alt="Airtel money" title="Airtel money" />
                   
                        <img src="images/payments/mtn-money.png" alt="MTN money" title="MTN money" />
                        
					
                        <img src="images/payments/eft.png" alt="eft" title="EFT" />
                </div>
            </div>
        </div>
        <div class="pp-summary">
            <div class="title-bar hide-for-medium" data-responsive-toggle="pp-footer">
                <button type="button" data-toggle="pp-footer"><i class="pe-7s-plus"></i> More Info</button>
            </div>
            <div class="row" id="pp-footer" data-animate="hinge-in-from-top hinge-out-from-top">
                <div class="column large-2 medium-3 small-6 col c1">
                    <h4><a href="about-us.html">ABOUT US</a></h4>
                    <a href="#">About us</a>
                    <a href="#">developers</a>
                    <a href="#">Security</a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy policy</a>
                    <ul>
                                    <?php 
$sql = "SELECT * FROM cms WHERE type = 'About'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo '<li><a href="Page.php?code='.$row['alias'].'">'.$row['title'].'</a></li>';
    }
}else{
    echo '<li><a href="#"> </a></li>'; 
}               ?>
                    </ul>
                </div>
                <div class="column large-2 medium-3 small-6 col c2">
                    <h4><a href="#">Personal</a></h4>
                    
                
                    <ul>
                                     <?php 
$sql = "SELECT * FROM cms WHERE type = 'Personal'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo '<li><a href="Page.php?code='.$row['alias'].'">'.$row['title'].'</a></li>';
    }
}else{
    echo '<li><a href="#"> </a></li>'; 
}               ?>
                    </ul>
                </div>
                <div class="column large-2 medium-3 small-6 col c3">
                    <h4><a href="#">Business</a></h4>
                    <ul>
                        <li><a href="api.php">Api</a></li>
                        
                          <?php 
$sql = "SELECT * FROM cms WHERE type = 'Business'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo '<li><a href="Page.php?code='.$row['alias'].'">'.$row['title'].'</a></li>';
    }
}else{
    echo '<li><a href="#"> </a></li>'; 
}               ?>
                    </ul>
                </div>
                <div class="column large-4 medium-3 small-6 col c4">
                    <h4><a href="#">Talk to Us</a></h4>
                    <div class="row">
                           
                            <div class="column large-6 medium-12">
                               
                                Whatsapp: +254706745202 <br />
                                Email: support@paymentprocessor-script.com <br />
                                <a href="#">Help &amp; Support</a>
                            </div>
                    </div>
                </div>
                <div class="column large-2 medium-12 col last">
                    <h4>Countries</h4>
                    <div class="row">
                        This Payment processor works for any country. </br> 
                </div>
            </div>
        </div>
                    <!--END SUMMARY-->
    <div class="pp-copyright bl">
        <div class="row">
            <div class="column medium-12">
                    <div class="social">
                        <a href="https://www.facebook.com/#" target="_blank"><i class="pe-7s-facebook"></i></a>
                        <a href="https://twitter.com/#" target="_blank"><i class="pe-7s-twitter"></i></a>
                        <a href="https://www.youtube.com/user/#" target="_blank"><i class="pe-7s-youtube"></i></a>
                        <a href="https://plus.google.com/u/0/#" target="_blank"><i class="pe-7s-google-plus"></i></a>
                        <a href="https://www.linkedin.com/company/#" target="_blank"><i class="pe-7s-linkedin2"></i></a>
                        <a href="https://www.instagram.com/#" target="_blank"><i class="pe-7s-instagram"></i></a>
                    </div>
                    <?php
                     $sql_site= "SELECT * FROM site_config where id = 1";
$result_site = $mysqli->query($sql_site);
    while($row = $result_site->fetch_assoc()) {
    $site = $row['site_name'];
    }?>
                ©2009-2020 <?php echo $site; ?>™, all rights reserved
            </div>
        </div>
    </div>
    <!--END COPYRIGHT-->
    <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5sW6aMbVgSQxnVuuiaV6dcoMYhv3ixox";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</footer>