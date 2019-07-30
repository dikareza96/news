   <!--<div class="copyright-info">
            <p class="pull-right">Web Informasi - Teknik Informatika<a href=""></a></p>
    </div> -->

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo base_url('assets/production/js/bootstrap.min.js')?>"></script>
 
  <!-- bootstrap progress js -->
  <script src=" <?php echo base_url('assets/production/js/progressbar/bootstrap-progressbar.min.js')?>"></script>
  <script src="<?php echo base_url('assets/production/js/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <!-- ckeditor -->
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/production/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/production/js/datepicker/daterangepicker.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/production/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js" type="b38fddbec7c73bad0e68f2be-text/javascript"></script> -->
 
  <!-- icheck -->
  <script src="<?php echo base_url('assets/production/js/icheck/icheck.min.js')?>"></script>
  <!-- pace -->
  <script src="<?php echo base_url('assets/production/js/pace/pace.min.js')?>"></script>
  <script src="<?php echo base_url('assets/production/js/custom.js')?>"></script>
  <!-- form validation -->
  <script src="<?php echo base_url('assets/production/js/validator/validator.js')?>"></script>
  <!-- textarea resize -->
  <script src="<?php echo base_url('assets/production/vendors/autosize/dist/autosize.min.js')?>"></script>
<!-- CK Editor -->
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autocomplete/countries.js"></script>
  <script src="<?php echo base_url(); ?>assets/production/vendors/devbridge-autocomplete/src/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url(); ?>assets/production/js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
    
  </script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

  
  <script>
    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
      .on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

    // bind the validation to the form submit event
    //$('#send').click('submit');//.prop('disabled', true);

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit)
        this.submit();
      return false;
    });

    /* FOR DEMO ONLY */
    $('#vfields').change(function() {
      $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function() {
      validator.defaults.alerts = (this.checked) ? false : true;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);

  </script>
  
 


</body>

</html>
