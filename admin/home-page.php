
<?php require_once "includes/header.php" ?>
    <?php 
            if(isset($_GET['source']) && isset($_GET['section'])){
                    $source = mysqli_real_escape_string($connection,$_GET['source']);
                    $section = mysqli_real_escape_string($connection,$_GET['section']);
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
                                if($section == "intro" && $source == "add_caro"){
                                    include_once "includes/home_page/intro_add_carousel.php";
                                }elseif ($section == "intro" && $source == "view_caro") {
                                    include_once "includes/home_page/intro_view_carousel.php";
                                }elseif($section == "intro" && $source == "edit_caro" && isset($_GET['id'])){
                                    include_once "includes/home_page/intro_edit_carousel.php";
                                }
                                //FEATURES WITHOUT IMAGE
                                elseif($section == "features" && $source == "add_feat"){
                                    include_once "includes/home_page/feat_add_features.php";
                                }elseif($section == "features" && $source == "view_feat"){
                                    include_once "includes/home_page/feat_view_features.php";
                                }elseif($section == "features" && $source == "edit_feat" && isset($_GET['id'])){
                                  include_once "includes/home_page/feat_edit_features.php";
                                }
                                //FEATURES WITH IMAGE
                                elseif($section == "features_img" && $source == "add_feat_img"){
                                  include_once "includes/home_page/feat_img_add_img.php";
                                }elseif($section == "features_img" && $source == "view_feat_img"){
                                  include_once "includes/home_page/feat_img_view_img.php";
                                }elseif($section == "features" && $source == "edit_feat_img" && isset($_GET['id'])){
                                  include_once "includes/home_page/feat_img_edit_img.php";
                                }
                                //REVIEW SECTION
                                elseif($section == "reviews" && $source == "add_review"){
                                  include_once "includes/home_page/reviews_add_review.php";
                                }elseif($section == "reviews" && $source == "view_review"){
                                  include_once "includes/home_page/reviews_view_review.php";
                                }elseif($section == "reviews" && $source == "edit_review" && isset($_GET['id'])){
                                  include_once "includes/home_page/reviews_edit_review.php";
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

            if($tbl == "features"){
               $query = "DELETE FROM home_page_features WHERE id = ?";
            }elseif($tbl == "intro"){
              $query = "DELETE FROM home_page_intro WHERE id = ?";
            }elseif($tbl == "features_img"){
              $query = "DELETE FROM home_page_features_img WHERE id = ?";
            }elseif($tbl == "review"){
              $query = "DELETE FROM home_page_reviews WHERE id = ?";
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