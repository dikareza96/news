  <!--// Main Section \\-->
          
<div class="wm-main-content">

            <!--// gallery \\-->
            <div class="wm-main-section">
                <div class="container">
                    <div class="row">
                   
                        <div class="wm-gallery">
                            <ul class="row">
                                <?php foreach ($gallery as $row) {?>
                                <li class="col-md-4 wordpress">
                                    <figure>
                                        <a href="#">
                                            <img src="<?=base_url()?>assets/uploads/<?=$row->img;?>"  style="height: 217px" alt="">
                                        </a>                                       
                                        <figcaption>
                                            <div class="wm-gallery-text">
                                                <a href="" class="wmicon-search wm-icon-gallery"></a>
                                                <h6><?php echo $row->title;?></h6>
                                            </div>                                                                                      
                                        </figcaption>                                           
                                    </figure>
                                </li>
                                 <?php } ?>
                                
                            </ul>
                        </div>
                        <div class="wm-pagination">
                                <ul>
                                 <?php 
                                 echo $this->pagination->create_links();
                                    ?>
                                </ul>
                            </div>       
                    </div>
                </div>
            </div>
            <!--// gallery \\-->

        </div>

