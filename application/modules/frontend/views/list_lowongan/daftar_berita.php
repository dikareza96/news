
        <!--// Mini Header \\-->
        <div class="wm-mini-header2" >
            
        </div>
        <!--// Mini Header \\-->

<!--// Main Content \\-->
        <div class="wm-main-content">
<!--// Main Section \\-->
            <div class="wm-main-section">
                <div class="container">
                    <div class="row">
                        
                        <aside class="col-md-3">
                        <div class="widget wm-search-course">

                         
                              <form action="<?php echo site_url('search'); ?>" method="post">
                                    <ul>
                                        
                                        <li> <input type="text" name="keyword" placeholder="Mau cari apa?"> <i class="wmicon-search"></i> 
                                        </li>
                                        
                                        <li> <input type="submit" value="Cari"></li>
                                    </ul>
                                </form>    
                                </div> 

                            <div class="widget widget_articles">
                                <div class="wm-widget-title">
                                    <h2>Berita Terpopuler</h2>
                                </div>
                                <ul>
                                <?php $no =0;foreach ($popular as $row) : $no++;?>
                                    <li>
                                        <figure>
                                            <a href="<?php echo base_url("daftar-berita/detail/$row->slug")?>"><img style="width:70px;height:70px;" src="<?=base_url()?>assets/uploads/<?=$row->img;?>" alt=""></a>
                                        </figure>
                                        <div class="wm-Article">
                                            <h6><a href="<?php echo base_url("daftar-berita/detail/$row->slug")?>"><?php echo $row->title ?></a></h6>
                                            <time ><?php echo date("D, d M Y H:i", strtotime($row->created_at)) ;?> WIB</time>
                                            <a ><i class="wmicon-social7"></i><?php echo $row->total_view ?></a>
                                        </div>                                      
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="widget widget_categories">
                                <div class="wm-widget-title">
                                    <h2>Kategori</h2>
                                </div>
                                <ul>
                                <?php foreach ($category as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-berita/daftar-kategori/$row->slug")?>" ><?php echo $row->title ?></a></li>
                                <?php } ?>     
                                </ul>
                            </div>

                            <div class="widget widget_categories">
                                <div class="wm-widget-title">
                                    <h2>Subkategori</h2>
                                </div>
                                <ul><?php foreach ($subcategory as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-berita/daftar-subkategori/$row->slug")?>"><?php echo $row->title ?></a></li>

                                   

                                   <?php } ?>  
                                </ul>
                            </div>
                            


                            
                          
                            
                           
                        </aside>
                        
                        <div class="col-md-9">
                           <!--  <div class="widget wm-search-course">
                                <form>
                                    <ul>
                                        
                                        <li> <input type="text" value="" placeholder="Mau cari apa?"> <i class="wmicon-search"></i> 
                                        </li>
                                        
                                        <li> <input type="submit" value="Cari"></li>
                                    </ul>
                                </form>         
                                
                               
                              
                            </div> -->

                            <div class="wm-courses wm-courses-popular wm-courses-mediumsec">
                                <ul class="row">
                                 <?php 
                                    $no =0; 
                                    foreach ($post as $row) {?>
                                    <li class="col-md-12">
                                  
                                        <div class="wm-courses-popular-wrap">
                                            <figure> <a href="<?php echo base_url("daftar-berita/detail/$row->slug")?>"><img class="img-list-loker" src="<?=base_url()?>assets/uploads/<?=$row->img;?>" alt=""> <span class="wm-popular-hover"> <small>Lebih lanjut</small> </span> </a>
                                                <figcaption>
                                                   
                                                    <h6><a href="#"><?php echo $row->title ?></a></h6>
                                                </figcaption>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="<?php echo base_url("daftar-berita/detail/$row->slug")?>"><?php echo $row->title ?></a></h6>
                                               <p><?php
                                             $limited_word = word_limiter($row->content,15);
                                             echo $limited_word;?></p>
                                                <div class="wm-courses-price"> <span><?php echo date("D, d M Y H:i", strtotime($row->created_at)) ;?> WIB</span> </div>
                                                <ul>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-social7"></i><?php echo $row->total_view ?></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-folder2"></i><?php echo $row->category_name ?></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-folder2"></i><?php echo $row->subcategory_name ?></a></li>
                                                    <!-- <li><a href="#" class="wm-color"><i class="wmicon-black"></i>Diposting oleh: <?php echo $row->admin ?></a></li> -->
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li><?php } ?>
                                   
                                   
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
            </div>
            <!--// Main Section \\-->
