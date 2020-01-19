            <?php
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$sql = "SELECT * FROM transactons where sender_name = '".$_SESSION['username']."' OR recipient_name = '".$_SESSION['username']."' ORDER BY date DESC LIMIT 1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo '<span>
				    
						
							<p style="color:#096669;font-size:22px;font-weight: bold;">$ '.$row['balance'].' USD</p>
								
				</span>';
    }
} else {
    echo "<p style='color:red;text-align:center;'>Get started. Add funds to see a balance here.</p>";
}

            
           $mysqli->close();
             
            ?>
      