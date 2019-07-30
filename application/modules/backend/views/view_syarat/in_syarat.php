


  <!-- page content -->
  <div class="right_col" role="main">

    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>
           Input Data
         </h3>
       </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data  Lowongan<!--<small>sub title</small>--></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          


            <form action="<?php echo base_url()."backend/data_syarat/input_data_syarat"; ?> " class="form-horizontal form-label-left" novalidate method="POST" enctype="multipart/form-data">

              <span class="section"></span>
              
              


                 <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Perusahaan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select  name="id_loker" class="select2_single form-control" tabindex="-1">
                          <?php 
              foreach ($loker as $row){ //$kategori  ini dari data form_input_data_perusahaan  pada controller
              echo"<option value='$row->id_loker'>$row->nm_perusahaan</option>";
              }?> 
                         
                        </select>
                      </div>
                    </div> 

              


          
            
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi<span class="required"></span>
              </label>
              <div class="col-md-8 col-sm-6 col-xs-12">
                <!-- <textarea id="textarea" required="required" name="deskripsi" placeholder="apa yang harus di kuasasi" class="form-control col-md-7 col-xs-12"></textarea> -->
               
                <textarea id="ckeditor"></textarea>
               

               
                 
              </div>
              </div>




            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button id="send" type="submit" class="btn btn-success">Submit</button>
              </div>
</form>


            </div>
          </div>
        </div>
      </div>
    </div>

