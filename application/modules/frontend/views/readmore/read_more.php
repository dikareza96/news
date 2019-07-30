
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
						<?php foreach ($loker as $row) { ?>
							<div class="wm-blog-single wm-courses">
								<figure class="wm-detail-thumb ">
									<ul class="gallery" >

									<li><a title="" data-rel="prettyPhoto[gallery1]" href="<?php echo base_url('assets/uploads/'.$row->gambar);?>"><img class="img-artikel" src="<?php echo base_url('assets/uploads/'.$row->gambar);?>" alt=""></a></li>
									</ul>


								</figure>
								<div class="wm-blog-author wm-ourcourses">
									<div class="wm-blogauthor-left">
										
												
												
										<a class="wm-authorpost">Perusahaan : <?php echo $row->nm_perusahaan ?></a>

									</div>
									<div class="wm-our-courses">
										<ul>
										     <li>
												<a ><i class="wmicon-black"></i>Oleh : <?php echo $row->admin; ?></a>
											</li>
											<li>
												<a ><i class="wmicon-social7"></i><?php echo $row->total_view ?> viewer</a>
											</li>
											<li>
												<a ><i class="wmicon-pin"></i><?php echo $row->nama_lokasi ?></a>
											</li>
											<li>
												<a href="#"><i class="wmicon-diploma"></i><?php echo $row->Jenis_Kategori ?></a>
											</li>

											<li>
												<a ><i class="wmicon-time2"></i><?php echo date("d, M Y", strtotime($row->tgl));?> - <?php echo date("d, M Y", strtotime($row->tgl_akhir));?></a>
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
									<h2><?php echo $row->nm_lowongan ?></h2>
									
								</div>
								<p class="wm-text"><?php echo $row->Deskripsi ?></p>
								
								</div>								
								<?php } ?>							
								
							
							<div class="wm-courses-getting-started">
								
								
							
							</div>
							
								<div id="vc-feelback-main" data-access-token="52180a7e991e4b9fa5e8d79fc421b099" data-display-type="4"></div>			
										
									    
							
                           
                            
                            <div class="wm-title-full">
                                <h2>Artikel Terkait</h2>
                            </div>
                            <div class="wm-courses wm-courses-popular">
							
                                <ul class="row">
                                <?php foreach ($related as $row) { ?>
                                    <li class="col-md-4">
                                        <div class="wm-courses-popular-wrap">
                                            <figure> <a href="<?php echo base_url("daftar-lowongan/detail/$row->slug/")?>"><img style="width: 260px;height: 220px;" src="<?php echo base_url('assets/uploads/'.$row->gambar);?>" alt=""> <span class="wm-popular-hover"> <small>Lebih Lanjut</small> </span> </a>
                                                <figcaption>
                                                    
                                                    <h6><a href="<?php echo base_url("daftar-lowongan/detail/$row->slug/")?>"><?php echo $row->nm_perusahaan?></a></h6>
                                                </figcaption>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="<?php echo base_url("daftar-lowongan/detail/$row->slug/")?>"></a><?php echo $row->nm_lowongan?> </h6>
                                                <div class="wm-courses-price"> <span><?php echo $row->tgl ?></span> </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//http-localhost-poltek.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                					
						</div> <!-- end 9 -->
                       

					</div>
				</div>
			</div>
			<!--// Main Section \\-->
			<script id="dsq-count-scr" src="//http-localhost-poltek.disqus.com/count.js" async></script>
			<script> 
(function() { 
var v = document.createElement('script'); v.async = true; 
v.src = "http://assets-prod.vicomi.com/vicomi.js"; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(v, s); 
})(); 
</script>