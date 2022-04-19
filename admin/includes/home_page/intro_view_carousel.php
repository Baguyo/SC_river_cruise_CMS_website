<div class="card vh-100">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">HOME PAGE | introduction section list of carousel</h1>
    </div>
    <div class="card-body">
    

<div class="table-responsive-md" style="font-size: 13px;">

    <table class="table table-light">
        <thead>
            <tr>
                <th>Heading</th>
                <th>Sub heading</th>
                <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th>
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                    $fetch_all_carousel = $connection->query("SELECT * FROM home_page_intro");
                    while($row = $fetch_all_carousel->fetch_assoc()){
                ?>
                    <tr>
                        <td> <?=$row['intro_heading']?> </td>
                        <td> <?=$row['intro_sub_heading']?> </td>
                        <td> <img src="../images/<?= $row['intro_image']?>" alt="" class="img-responsive" width="100%" > </td>
                        <td> <?= $row['intro_button_name'] ?> </td>
                        <td> <?= $row['intro_button_color'] ?> </td>
                        <td> <?= $row['intro_button_icon'] ?> </td>
                        <td> <?= $row['intro_button_link'] ?> </td>
                        <td>
                            <a class="btn btn-info" href="home-page.php?section=intro&source=edit_caro&id=<?=$row['id']?>">EDIT</a>
                        </td>
                        <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='intro' >DELETE </a>
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
