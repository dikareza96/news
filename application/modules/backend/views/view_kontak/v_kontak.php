
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          Data Kotak Saran
                    <!--<small>
                        Some examples to get you started
                      </small> -->
                    </h3>
                  </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <!--<h2>Default Example <small>Users</small></h2>-->
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                          <li><a href="#"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        

                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Pesan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php $no=1; 
                            foreach ($user as $row) {
                              ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->email ?></td>
                                <td><?php echo $row->tlp ?></td>
                                <td><?php echo $row->pesan ?></td>
                                <td>
                                  <a href="<?php echo base_url("backend/data_kontak/hapus_data_kontak/$row->id_kontak") ?>"><i class="fa fa-close"></i></a>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- /footer content -->

                  </div>
                  <!-- /page content -->
                </div>

              </div>

              <div id="custom_notifications" class="custom-notifications dsp_none">
                <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
                </ul>
                <div class="clearfix"></div>
                <div id="notif-group" class="tabbed_notifications"></div>
              </div>

              <script src="ajs/bootstrap.min.js"></script>

              <!-- bootstrap progress js -->
              <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
              <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
              <!-- icheck -->
              <script src="js/icheck/icheck.min.js"></script>

              <script src="js/custom.js"></script>


              <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
        <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="<?php echo base_url();?>assets/production/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/production/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
            "use strict";
            0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [{
                extend: "copy",
                className: "btn-sm"
              }, {
                extend: "csv",
                className: "btn-sm"
              }, {
                extend: "excel",
                className: "btn-sm"
              }, {
                extend: "pdf",
                className: "btn-sm"
              }, {
                extend: "print",
                className: "btn-sm"
              }],
              responsive: !0
            })
          },
          TableManageButtons = function() {
            "use strict";
            return {
              init: function() {
                handleDataTableButtons()
              }
            }
          }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
      </body>

      </html>
