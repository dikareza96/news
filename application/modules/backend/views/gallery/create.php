
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                   Create
                </h3>
            </div>

          
          </div>
          <div class="clearfix"></div>
           <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">
           

                  <form action="<?php echo base_url()."backend/".$route."/store"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate method="post">

                    <span class="section"></span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="" required="required" type="text">

                      </div>
                    </div>
                   

                     
                 
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Featured Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
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

                </div>
              </div>
            </div>
          </div>
        </div>

     