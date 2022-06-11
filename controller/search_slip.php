<?php
    session_start();
    include "connections.php";
    

    if(isset($_SESSION['user'])){
        $pcn = $_SESSION['user'];
    
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
    $user_details->bindvalue("pcn_number", $pcn);
    $user_details->execute();

    $users = $user_details->fetchAll();
    foreach($users as $user):
        // if(isset($_POST['search'])){
    $tdate = $_POST['tdate'];
    $search_slip = $connectdb->prepare("SELECT * FROM payments WHERE pcn_number = :pcn_number AND payment_status = 1 AND YEAR(tdate) = '$tdate'");
    $search_slip->bindvalue("pcn_number", $pcn);
    $search_slip->execute();
    $n = 1;

    ?>
    
<?php    
    if(!$search_slip->rowCount() > 0){
        echo "<p class='reg_success'>You have not made payment for this selected year</p>";
    }else{
    $years = $search_slip->fetchAll();
    foreach($years as $year){
        $paid_year = $year->tdate;
    }
?>
<h2>PSN Clearance slip for <span><?php echo $tdate?></span></h2>
<section id="clearanceSlip">
    
    <div class="logos">
        <img src="../images/psn_logo2.png" alt="Acpn logo">
        <P>PSN slip</P>
    </div>
    <div class="receipt_num">
        <p><?php 
            $get_receipt = $connectdb->prepare("SELECT receipt_number FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = '$tdate' AND payment_status = 1");
            $get_receipt->bindvalue("pcn_number", $pcn);
            $get_receipt->execute();
            $receipt = $get_receipt->fetch();
            echo $receipt->receipt_number;
        ?></p>
    </div>
    <div class="slip">
        
        <div class="slip_back">
            <img src="../images/psn_logo2.png" alt="psn">
        </div>
        <div class="details">
            <div class="logos_passport">
                <div class="passports">
                    <img src="<?php echo '../passports/'.$user->passport;?>" alt="member passport">
                </div>
            </div>
            <p class="full_name"><?php echo $user->first_name . " " .$user->last_name?></p>
            <p><?php echo $user->pharmacy?></p>
            <p><span>Registration ID: </span><?php echo $user->reg_number?></p>
            <div class="qr_code">
            <img src="../images/qr_code.png" alt="qr_code">
            </div>
        </div>
    </section>
        <div class="download">
            <button id="print" onclick="window.print()">Print slip <i class="fas fa-print"></i></button>
        </div>
        <?php }
            endforeach;
        }
        ?>