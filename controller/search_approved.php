<?php
    session_start();
    include "connections.php";
    

        // if(isset($_POST['search'])){
    $tdate = $_POST['admin_tdate'];
    $search_approved = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 1 AND YEAR(tdate) = '$tdate'");
    $search_approved->execute();
    $n = 1;

    ?>
    

<h2>Approved members for "<span><?php echo $tdate?></span>"</h2>
<div class="options">
    <div class="search">
        <input type="search" id="searchApproved" placeholder="Enter keyword">
    </div>
    <button id="download_approved" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
</div>
                        
<table id="approved_table">
    <thead>
        <tr>
            <td>S/N</td>
            <td>Full Name</td>
            <td>PCN Number</td>
            <td>Place of Practice</td>
            <td>Receipt Number</td>
        </tr>
    </thead>
    <tbody>
        <?php
            
            
            $alls = $search_approved->fetchAll();

            foreach($alls as $all):
        ?>
        <tr>
            <td><button>
                <?php 
                $get_user = $connectdb->prepare('SELECT user_id FROM users WHERE pcn_number = :pcn_number');
                $get_user->bindvalue('pcn_number', $all->pcn_number);
                $get_user->execute();
                $user = $get_user->fetch();
                ?>    
                <a href="javascript:void(0)" onclick="viewUser('<?php echo $user->user_id;?>')" title="View profile"><?php echo $n?></a></button></td>
                <td><?php 
                    $get_name = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                    $get_name->bindvalue("pcn_number", $all->pcn_number);
                    $get_name->execute();
                    $names = $get_name->fetchAll();
                    foreach($names as $name){
                        echo $name->first_name . " " . $name->last_name;
                    }
                ?></td>
                <td><?php echo $all->pcn_number;?></td>
                <td><?php 
                    $get_pharm = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                    $get_pharm->bindvalue("pcn_number", $all->pcn_number);
                    $get_pharm->execute();
                    $pharms = $get_pharm->fetchAll();
                    foreach($pharms as $pharm){
                        echo $pharm->pharmacy;
                    }
                    ?></td>
                    <td><?php echo $all->receipt_number;?></td>


            </tr>
        <?php $n++; endforeach;?>
    </tbody>
</table>
    <?php
        if(!$search_approved->rowCount() > 0){
        echo "<p class='no_result'>'No result found!'</p>";
    }
    ?>