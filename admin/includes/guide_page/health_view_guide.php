<?php 

$important_info = array();
$health_guide = array();
$transport_guide = array();


$fetch_all_carousel = $connection->query("SELECT * FROM guide_page");
while($row = $fetch_all_carousel->fetch_assoc()){
    if(!is_null($row['health_guide'])){
        // echo $row['health_guide']. "<br> <br>";
        $health_guide[] = $row;
    }elseif(!is_null($row['transport_guide'])){
        $transport_guide[] = $row;
    }elseif(!is_null($row['important_info'])){
        $important_info[] = $row;
    }
     
}
?>
<div class="card">
    <div class="card-header bg-success text-white">
        <h1 class="text-center">GUIDE PAGE | Guide section list of guides</h1>        
    </div>
    <div class="card-body">
    




<div class="table-responsive-lg mt-5" >

    <table class="table table-light">
        <h3 class="text-center">HEALTH AND SAFETY GUIDE</h3>
        <thead>
            <tr>
                <th>Message</th>
                <!-- <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th> -->
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            
                for($i = 0; $i < count($health_guide); $i++){
            ?>

                <tr>
                    <td><?= $health_guide[$i]['health_guide'] ?></td>
                    <td>
                        <a href="guide-page.php?section=healthAsafety&source=edit_guide&id=<?=$health_guide[$i]['id']?>" class="btn btn-info" >EDIT</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$health_guide[$i]['id']?>" tbl='guide' >DELETE </a>
                    </td>
                </tr>

            <?php 
                }

            ?>
                
        </tbody>
    </table>


    <table class="table table-light">
        <h3 class="text-center">IMPORTANT INFORMATION</h3>
        <thead>
            <tr>
                <th>Message</th>
                <!-- <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th> -->
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            
                for($i = 0; $i < count($important_info); $i++){
            ?>

                <tr>
                    <td><?= $important_info[$i]['important_info'] ?></td>
                    <td>
                        <a href="guide-page.php?section=healthAsafety&source=edit_guide&id=<?=$important_info[$i]['id']?>" class="btn btn-info" >EDIT</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$important_info[$i]['id']?>" tbl='guide' >DELETE </a>
                    </td>
                </tr>

            <?php 
                }

            ?>
                
        </tbody>
    </table>

    <table class="table table-light">
        <h3 class="text-center">TRANSPORTATION GUIDE</h3>
        <thead>
            <tr>
                <th>Message</th>
                <!-- <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th> -->
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            
                for($i = 0; $i < count($transport_guide); $i++){
            ?>

                <tr>
                    <td><?= $transport_guide[$i]['transport_guide'] ?></td>
                    <td>
                        <a href="guide-page.php?section=healthAsafety&source=edit_guide&id=<?=$transport_guide[$i]['id']?>" class="btn btn-info" >EDIT</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$transport_guide[$i]['id']?>" tbl='guide' >DELETE </a>
                    </td>
                </tr>

            <?php 
                }

            ?>
                
        </tbody>
    </table>


</div>

        
    </div>
</div>
