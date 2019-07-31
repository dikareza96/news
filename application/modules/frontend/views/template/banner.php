<div class="wm-main-banner">
            
            <div class="wm-banner-three">

                <?php foreach ($popular as $row) {?>
                <div class="wm-banner-three-layer">
                    <img src="<?=base_url()?>assets/education-html/extra-images/banner-view3-1.jpg" alt="">
                    <div class="wm-caption-three">
                        <div class="container">
                            <div class="wm-caption-three-inner">
                                <h1><?php echo $row->title ;?></h1>
                                <p><?php
                                             $limited_word = word_limiter($row->content,15);
                                             echo $limited_word;?></p>
                                <a class="wm-discover-btn wm-bgcolor-three" href="<?php echo base_url("daftar-berita/detail/$row->slug")?>">Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
                
            </div>

        </div>