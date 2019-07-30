<div class="wm-courses wm-courses-popular">
			<?php 
			$check = [];
			foreach ($related as $row) { ?>
                                <ul class="row">
                                    <li class="col-md-4">
                                        <div class="wm-courses-popular-wrap">
                                            <figure> <a href="#"><img style="width: 175px;height: 220px;" src="<?php echo base_url('assets/uploads/'.$row->gambar);?>" alt=""> <span class="wm-popular-hover"> <small>see course</small> </span> </a>
                                                <figcaption>
                                                    
                                                    <h6><a href="#"></a></h6>
                                                </figcaption>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="#"></a><?php echo $row->nm_lowongan?> </h6>
                                                <div class="wm-courses-price"> <span><?php echo $row->tgl ?></span> </div>
                                                <ul>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-social7"></i></a></li>
                                                    <li><a href="#" class="wm-color"><i class="wmicon-social6"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php } ?>
                            </div>						
						</div>
                        <!-- end 9 -->

					</div>
				</div>
			</div>
			<!--// Main Section \\-->
                                                