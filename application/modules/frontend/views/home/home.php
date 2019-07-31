  <!--// Main Section \\-->
            <div class="wm-main-section wm-contact-service-two-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12 wm-contact-main wm-contact-main-color">
                            <div class="wm-contact-service-two">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <span class="wm-ctservice-icon wm-bgcolor-two"><i class="wmicon-pin"></i></span>
                                        <h5 class="wm-color">Address</h5>
                                        <p>195 Cooks Mine Road Espanola, NM 87532</p>
                                    </li>
                                    <li class="col-md-4">
                                        <span class="wm-ctservice-icon wm-bgcolor-two"><i class="wmicon-phone"></i></span>
                                        <h5 class="wm-color">Phone & Fax</h5>
                                        <p>+1 505-753-5656 +1 505-753-4437</p>
                                    </li>
                                    <li class="col-md-4">
                                        <span class="wm-ctservice-icon wm-bgcolor-two"><i class="wmicon-letter"></i></span>
                                        <h5 class="wm-color">E-mail</h5>
                                        <p><a href="mailto:name@email.com">Info@university.com</a> <a href="mailto:name@email.com">support@university.com</a></p>
                                    </li>
                                </ul>
                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>
            <!--// icon \\-->
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
                                        <a href="#"><img src="<?=base_url()?>assets/uploads/<?=$row->img;?>" style="height: 217px" alt=""></a>                                       
                                        <figcaption>
                                            <div class="wm-gallery-text">
                                                <a href="#" class="wmicon-search wm-icon-gallery"></a>
                                                <h6><?php echo $row->title;?></h6>
                                            </div>                                                                                      
                                        </figcaption>                                           
                                    </figure>
                                </li>
                                 <?php } ?>
                                
                            </ul>
                        </div>
                        <!-- <div class="wm-pagination">
                            <ul>
                                <li>
                                  <a href="#" aria-label="Previous">
                                   <i class="wmicon-arrows4"></i>
                                   Previous
                                  </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li> </li>
                                <li>...</li>
                                <li> </li>
                                <li><a href="#">18</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                   <i class="wmicon-arrows4"></i>
                                   Next
                                  </a>
                                </li>
                            </ul>
                        </div>        -->           
                    </div>
                </div>
            </div>
            <!--// gallery \\-->

        </div>
<!--// Main Section \\-->
            <div class="wm-main-section wm-popular-coursesgrid-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="wm-fancy-title-three wm-align-center">
                                <div class="wm-fancy-title-inner">
                                    <!-- <small class="wm-color-three">see our</small> -->
                                    <span class="wm-color-three">Berita Terbaru</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="wm-courses wm-courses-grid">
                                <ul class="row">
                                    <?php foreach ($post as $row) {?>
                                    <li class="col-md-3">

                                        <figure><a href=""><img style="width: 175px;height: 220px;" src="<?=base_url()?>assets/uploads/<?=$row->img;?>" alt=""></a> <span><?php echo date("D, d M Y H:i", strtotime($row->created_at)) ;?> WIB</span> <figcaption> <a href="<?php echo base_url("daftar-berita/detail/$row->slug")?>" class="wm-coursemodren-btn wm-color-three">Lebih lanjut</a> </figcaption> </figure>
                                        <div class="wm-courses-grid-text">
                                            <h5><a title="<?php echo $row->title?>" href="<?php echo base_url("daftar-berita/detail/$row->slug/")?>" class="wm-color-three"><?php
                $limited_word = word_limiter($row->title,4);
                echo $limited_word;?></a></h5>
                                            <ul class="courses-options">
                                                <li><i class="wmicon-social7"></i> <a ><?php echo $row->total_view?></a></li>
                                                <!--<li><i class="wmicon-social6"></i> <a href="#">10</a></li>-->
                                                <li><i class="wmicon-black"></i> <a ><?php echo $row->category_name ?></a></li>
                                                <li><i class="wm-color wmicon-pin"></i> <a ><?php echo $row->subcategory_name ?></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

