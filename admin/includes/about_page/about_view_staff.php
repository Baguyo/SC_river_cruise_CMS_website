<div class="card vh-100">
    <div class="card-header bg-info text-white">
        <h1 class="text-center">ABOUT PAGE | Staff section list of staff</h1>
    </div>
    <div class="card-body">
    

<div class="table-responsive-md" style="font-size: 13px;">

    <table class="table table-light">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                    $fetch_all_staff = $connection->query("SELECT * FROM about_page_staff");
                    while($row = $fetch_all_staff->fetch_assoc()){
                ?>
                    <tr>
                        <td> <?=$row['name']?> </td>
                        <td> <?=$row['description']?> </td>
                        <td> <img src="../images/<?= $row['staff_image']?>" alt="" class="img-responsive" width="100%" > </td>
                        <td>
                            <a class="btn btn-info" href="about-page.php?section=staff&source=edit_staff&id=<?=$row['id']?>">EDIT</a>
                        </td>
                        <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='staff' >DELETE </a>
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
