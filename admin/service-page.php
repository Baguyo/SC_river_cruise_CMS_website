
<?php require_once "includes/header.php" ?>
    <?php 
            if(isset($_GET['source']) && isset($_GET['type'])){
                    $source = mysqli_real_escape_string($connection,$_GET['source']);
                    $type = mysqli_real_escape_string($connection,$_GET['type']);
            }else{
                die("lol");
            }

            
    ?>
    <div class="wrapper">
        
        <?php require_once "includes/navigation.php" ?>


        <div class="page-wrapper ">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <?php 
                                if($type == "kayaking" && $source == "add"){
                                    include_once "includes/service_page_kayaking/kayaking_add_info.php";
                                }elseif ($type == "kayaking" && $source == "view") {
                                    include_once "includes/service_page_kayaking/kayaking_view_image.php";
                                }
                                elseif ($type == "raft" && $source == "add") {
                                  include_once "includes/service_page_raft_crusing/raft_crusing_add_info.php";
                                }elseif ($type == "raft" && $source == "view") {
                                  include_once "includes/service_page_raft_crusing/raft_cruising_view_image.php";
                                }elseif ($type == "firefly" && $source == "add") {
                                  include_once "includes/service_page_firefly_watching/firefly_watching_add_info.php";
                                }elseif ($type == "firefly" && $source == "view") {
                                  include_once "includes/service_page_firefly_watching/firefly_watching_view_image.php";
                                }
                            ?>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- DELETE WAITING CONFIRMATION -->
    <div class="modal fade delete_modal" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h3>Are you sure to delete ?</h3>
      </div>
      <div class="modal-footer">
        <form method="post">
            <input type="hidden" name="id_delete" value="" class="id_delete">
            <input type="hidden" name="tbl" value="" class="tbl_delete">
            <input type="submit" value="DELETE" class="btn btn-danger delete_link_button" name="delete_data">
            <button type="button" class="btn btn-primary" data-dismiss="modal">CLOSE</button>    
        </form>
        
      </div>
    </div>
  </div>
</div>


<!-- SUCCESS DELETE -->
<div class="modal fade delete_success" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return location.reload(true)">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h3 class="text-center text-success">DELETED SUCCESSFULLY
            <i class="fas fa-check"></i>
        </h3>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





<?php  require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {
        // $(".delete_carousel").click(function(e){
        //     var id_to_delete = $(this).attr('rel');
        //     $('.carousel_id').attr("value", id_to_delete);
        //     $('.delete_carousel_modal').modal("show");
        // })

        $(".delete").click(function(e){
          var id_to_delete = $(this).attr('rel');
          var table = $(this).attr('tbl');
          $('.id_delete').attr("value",id_to_delete);
          $('.tbl_delete').attr("value",table);
            $('.delete_modal').modal("show");
        })

    });
</script>

<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['delete_data'])){
            $id  = sanitize_input( $_POST['id_delete']);
            $tbl  = sanitize_input( $_POST['tbl']);

            if($tbl == "kayaking"){
               $query = "DELETE FROM service_page_kayaking WHERE id = ?";
            }elseif($tbl == "raft_crusing"){
              $query = "DELETE FROM service_page_raft_crusing WHERE id = ?";
            }elseif($tbl == "firefly_watching"){
              $query = "DELETE FROM service_page_firefly_watching WHERE id = ?";
            }

            $delete_carousel_stmt = $connection->prepare($query);
            $delete_carousel_stmt->bind_param("i",  $id);
            $delete_carousel_stmt->execute();
            $delete_carousel_stmt->store_result();
            if($delete_carousel_stmt->affected_rows == 1){


                
                echo "
                <script type='text/javascript'>;
                $(document).ready(function () {
                    $('.delete_success').modal('show');
                    setInterval(function(){
                        $('.delete_success').modal('hide');
                        location.reload(true);
                    },4000)                    
                });
                </script>
                ";
                
            }
        }
    }
?>