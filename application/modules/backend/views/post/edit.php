
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                   Edit
                </h3>
            </div>

          
          </div>
          <div class="clearfix"></div>
           <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">
            <?php  foreach ($post as $row) {
                
                ?>

                  <form action="<?php echo base_url()."backend/".$route."/update"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate method="post">

                    <span class="section"></span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required"></span>
                      </label>
                       <input id="id" name="id" required="required" type="hidden" value="<?php echo $row->id; ?>">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="title" class="form-control col-md-7 col-xs-12" name="title" value="<?php echo $row->title; ?>" required="required" type="text">

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Content<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         
                         <textarea id="editor1" name="content" rows="10" cols="80">
                                           <?php echo $row->content; ?>
                    </textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" id="post_category" name="post_category" tabindex="-1">
                          <option value>Select a category</option>
                            <?php
                            foreach($category as $key) {
                              ?>
                             <?php
                                    $selected = '';
                                    if ($key->id == $row->post_category) {
                                    $selected = 'selected="selected"';
                                    }
                                   ?> 
                            <option value="<?php echo $key->id?>" <?php echo $selected?> ><?php echo $key->title?></option>
                              <?php } ?>
                            
                        </select>
                      </div>
                    </div>
                     
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Subcategory</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" id="post_subcategory" name="post_subcategory" tabindex="-1">
                          <option value>Select a subcategory</option>
                            <?php
                            foreach($subcategory as $key) {
                              ?>
                             <?php
                                    $selected = '';
                                    if ($key->id == $row->post_subcategory) {
                                    $selected = 'selected="selected"';
                                    }
                                   ?> 
                            <option value="<?php echo $key->id?>" <?php echo $selected?> ><?php echo $key->title?></option>
                              <?php } ?>
                            
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Featured Image</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                        <img style="width: 200px;height: 200px;" src="<?=base_url()?>assets/uploads/<?=$row->img;?>">
                      </div>
                    </div>
                  
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo site_url("backend/".$route."/index");?>" class="btn btn-default m-t-15 waves-effect">Kembali</a>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>
 <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

     