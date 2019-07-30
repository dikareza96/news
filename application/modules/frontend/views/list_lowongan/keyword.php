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
                                    <h2>Lowongan Terpopuler</h2>
                                </div>
                                <ul>
                                <?php $no =0;foreach ($popular as $row) : $no++;?>
                                    <li>
                                        <figure>
                                            <a href="<?php echo base_url("daftar-lowongan/detail/$row->slug")?>"><img style="width:70px;height:70px;" src="<?=base_url()?>assets/uploads/<?=$row->gambar;?>" alt=""></a>
                                        </figure>
                                        <div class="wm-Article">
                                            <h6><a href="<?php echo base_url("daftar-lowongan/detail/$row->slug")?>"><?php echo $row->nm_lowongan ?></a></h6>
                                            <time ><?php echo date("d-M-Y", strtotime($row->tgl));?></time>
                                            <a ><i class="wmicon-social7"></i><?php echo $row->total_view ?></a>
                                        </div>                                      
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>

                            <div class="widget widget_categories">
                                <div class="wm-widget-title">
                                    <h2>Lokasi</h2>
                                </div>
                                <ul><?php foreach ($lokasi as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-lowongan/daftar-lokasi/$row->slug_lokasi")?>"><?php echo $row->nama_lokasi ?></a></li>

                                   

                                   <?php } ?>  
                                </ul>
                            </div>
                            <div class="widget widget_categories">
                                <div class="wm-widget-title">
                                    <h2>Kategori</h2>
                                </div>
                                <ul>
                                <?php foreach ($kategori as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-lowongan/daftar-kategori/$row->slug_kategori")?>" ><?php echo $row->Jenis_Kategori ?></a></li>
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
                            <!-- konten -->
                            <!-- <div class="wm-message wm-typography-element">
                           
                                                <div class="wm-title-typoelements">
                                                    <h2>Hasil pencarian <span>""</span></h2>
                                                </div>  
                                                <div class="message alert error-message" >
                                                    <button class="close" data-dismiss="alert">
                                                        <i class="fa fa-times-circle"></i>
                                                    </button>
                                                    <p>Error! This would be an error message.</p>
                                                </div>  
                                                
                                            </div> -->

                            <div class="wm-courses wm-courses-popular wm-courses-mediumsec">
                                <ul class="row">
                                 <?php 
                                    
                            if (count($results) > 0) {
                                    foreach ($results as $loker) {
                                        ?>
                                    <li class="col-md-12">

                                            
                                        <div class="wm-courses-popular-wrap">

                                            <figure> <a href="<?php echo base_url("daftar-lowongan/detail/$loker->slug")?>"><img class="img-list-loker" src="<?=base_url()?>assets/uploads/<?=$loker->gambar;?>" alt=""> <span class="wm-popular-hover"> <small>Lebih lanjut</small> </span> </a>
                                                <figcaption>
                                                   
                                                    <h6><a href="#"><?php echo $loker->nm_perusahaan ?></a></h6>
                                                </figcaption>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="<?php echo base_url("daftar-lowongan/detail/$loker->slug")?>"><?php echo $loker->nm_lowongan ?></a></h6>
                                                <p><?php
                                             $limited_word = word_limiter($loker->Deskripsi,15);
                                             echo $limited_word;?></p>
                                                <div class="wm-courses-price"> <span><?php echo date("d, M Y", strtotime($loker->tgl));?> - <?php echo date("d, M Y", strtotime($loker->tgl_akhir));?></span> </div>
                                                <ul>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-social7"></i><?php echo $loker->total_view ?></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-black"></i><?php echo $loker->Jenis_Kategori ?></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-pin"></i><?php echo $loker->nama_lokasi ?></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-black"></i>Diposting oleh: <?php echo $loker->admin ?></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li>   <?php
                                    }
                                    } else {
                                echo "  <div class='wm-message wm-typography-element'>
                                
                                 <div class='message alert error-message' >
                                        <button class='close' data-dismiss='alert'>
                                            <i class='fa fa-times-circle'></i>
                                        </button>
                                        <p>Hasil pencarian tidak ditemukan</p>
                                 </div>  </div>";
                                                }
                                                ?>
                                   
                                   
                                </ul>
                            </div>
                            <div class="wm-pagination">
                                <ul>
                                 <?php 
                                 echo $this->pagination->create_links();
                                    ?>
                                    <!-- <li><a href="#" aria-label="Previous"> <i class="wmicon-arrows4"></i> Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>...</li>
                                    <li><a href="#">18</a></li>
                                    <li><a href="#" aria-label="Next"> <i class="wmicon-arrows4"></i> Next</a></li> -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
