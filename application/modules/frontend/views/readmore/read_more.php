
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
                                <ul><?php foreach ($category as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-berita/daftar-kategori/$row->slug")?>"><?php echo $row->title ?></a></li>

                                   

                                   <?php } ?>  
                                </ul>
                            </div>
                            <div class="widget widget_categories">
                                <div class="wm-widget-title">
                                    <h2>Subkategori</h2>
                                </div>
                                <ul>
                                <?php foreach ($subcategory as $row) {?>
                                    <li><a href="<?php echo base_url("daftar-berita/daftar-subkategori/$row->slug")?>" ><?php echo $row->title ?></a></li>
                                <?php } ?>     
                                </ul>
                            </div>


                            
                          
                            
                           
                        </aside>
						<div class="col-md-9">
						<?php foreach ($post as $row) { ?>
							<div class="wm-blog-single wm-courses">
								<figure class="wm-detail-thumb ">
									<ul class="gallery" >

									<li><a title="" data-rel="prettyPhoto[gallery1]" href="<?php echo base_url('assets/uploads/'.$row->img);?>"><img class="img-artikel" src="<?php echo base_url('assets/uploads/'.$row->img);?>" alt=""></a></li>
									</ul>


								</figure>
								<div class="wm-blog-author wm-ourcourses">
									<div class="wm-blogauthor-left">
										
												
												
										

									</div>
									<div class="wm-our-courses">
										<ul>
										    <!--  <li>
												<a ><i class="wmicon-black"></i>Oleh : <?php echo $row->admin; ?></a>
											</li> -->
											<li>
												<a ><i class="wmicon-social"></i><?php echo $row->total_view ?> viewer</a>
											</li>
											<li>
												<a ><i class="wmicon-folder2"></i><?php echo $row->category_name ?></a>
											</li>
											<li>
												<a href="#"><i class="wmicon-folder2"></i><?php echo $row->subcategory_name ?></a>
											</li>

											 <li>
												<a ><i class="wmicon-time2"></i><?php echo date("D, d M Y H:i", strtotime($row->created_at)) ;?> WIB</a>
											</li> 
										</ul>
									</div>
								</div>								
							</div>
							<!--<div class="wm-courses-reviewes">
								<div class="wm-ourcourses-left">
									<h6>Reviews</h6>
									<div class="wm-rating">
										<span class="rating-box" style="width:100%"></span>																				
									</div>
									<a href="#">3 Reviews</a>
								</div>
								<div class="wm-ourcourses-right">
									<a class="wm-previous-icon" href="#"><i class="fa fa-angle-left" ></i>previous Course</a>
									<a class="wm-Next-icon" href="#">Next Course<i class="fa fa-angle-right" ></i></a>
								</div>
							</div>-->
							<div class="wm-our-course-detail">
								<div class="wm-title-full ">
									<h2><?php echo $row->title ?></h2>
									
								</div>
								<p class="wm-text"><?php echo $row->content ?></p>
								
								</div>								
								<?php } ?>							
								
							
							<div class="wm-courses-getting-started">
								
								
							
							</div>
							
								<div id="vc-feelback-main" data-access-token="52180a7e991e4b9fa5e8d79fc421b099" data-display-type="4"></div>			
										
									    
							
                           
                            
                            <div class="wm-title-full">
                                <h2>Berita Terkait</h2>
                            </div>
                            <div class="wm-courses wm-courses-popular">
							
                                <ul class="row">
                                <?php foreach ($related as $row) { ?>
                                    <li class="col-md-4">
                                        <div class="wm-courses-popular-wrap">
                                            <figure> <a href="<?php echo base_url("daftar-berita/detail/$row->slug/")?>"><img style="width: 260px;height: 220px;" src="<?php echo base_url('assets/uploads/'.$row->img);?>" alt=""> <span class="wm-popular-hover"> <small>Lebih Lanjut</small> </span> </a>
                                                <figcaption>
                                                    
                                                    <h6><a href="<?php echo base_url("daftar-berita/detail/$row->slug/")?>"><?php echo $row->title?></a></h6>
                                                </figcaption>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="<?php echo base_url("daftar-berita/detail/$row->slug/")?>"></a><?php echo $row->title?> </h6>
                                                <div class="wm-courses-price"> <span><?php echo date("D, d M Y H:i", strtotime($row->created_at)) ;?> WIB</span> </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                                
