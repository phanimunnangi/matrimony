	<div class="footer">	
		<div class="col-md-6">		
			Copyright <a href="#">MatrimonyApp</a> &copy; <?=date('Y');?>-<?=date('Y', strtotime('+1 years'));?></a>	
		</div>		
		<div class="col-md-6 text-right">	
			<div> Made With <i class="fa fa-heart" style="color: red"></i> By <a href="#####">MatrimonyApp</a></div>	
		</div>	
	</div>
</div>
    <!-- Mainly scripts -->
    <script src="<?=base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url();?>admin_assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Flot -->
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.spline.js"></script> 
	<script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/flot/curvedLines.js"></script>
    <!-- Peity -->
    <script src="<?=base_url();?>admin_assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url();?>admin_assets/js/demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>admin_assets/js/inspinia.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?=base_url();?>admin_assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Jvectormap -->
    <script src="<?=base_url();?>admin_assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url();?>admin_assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Sparkline -->
    <script src="<?=base_url();?>admin_assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline demo data  -->    <script src="<?=base_url();?>admin_assets/js/demo/sparkline-demo.js"></script>
    <!-- Sweet alert -->
    <script src="<?=base_url();?>admin_assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- ChartJS-->
    <script src="<?=base_url();?>admin_assets/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?=base_url()?>admin_assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?=base_url()?>admin_assets/js/plugins/chosen/chosen.jquery.js"></script>
    <script src="<?=base_url()?>admin_assets/js/validate.min.js"></script>
    <script src="<?=base_url()?>admin_assets/js/fSelect.js"></script>
	<div class="modal fade" id="validationPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class="modal-title" id="myModalLabel">Validation Confirmation</h3>
		  </div>
		  <div class="modal-body">
			<p>Please fill this form to proceed to next tab. </p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
		  </div>
		</div>
	  </div>
	</div>

    <script>
        $('.chosen-select').chosen({width: "100%"}); 
         $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',   
            timeOut: 4000
            };
            <?php if($this->session->flashdata('success_message')){?>
            toastr.success(<?= $this->session->flashdata('success_message') ?>);
            <?php } ?>
            <?php if($this->session->flashdata('error_message')){?>
            toastr.error(<?= $this->session->flashdata('error_message') ?>);
            <?php } ?>
            <?php if($this->session->flashdata('warning_message')){?>
            toastr.warning(<?= $this->session->flashdata('warning_message') ?>);
            <?php } ?>
            <?php /*<?= ((validation_errors()) && (null !== validation_errors())) ? "toastr.warning('".removeNewLine(removepTag(validation_errors()))."');":"" */?>
            }, 1300);
            //Date picker script starts here
            
            });

         $(function() {
            $('.number').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
        });

         $('.number').on("cut copy paste",function(e) {
              e.preventDefault();
           });
    </script>

    <script src="<?= base_url() ?>admin_assets/js/plugins/dataTables/datatables.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables').DataTable({
                pageLength: 25,
                responsive: true,
            });

        });
        $(document).ready(function(){
            $('.dataTables1').DataTable({
                pageLength: 50,
                responsive: true,
                columnDefs: [ { 
                    orderable: false, 
                    targets: [0]
                } ]
            });

        });
    </script>

<script>
            function check_file_size(val){
        
        var uploadField = document.getElementById(val);

        var FileName = uploadField.files[0].name;
        var FileExtension = FileName.split('.')[FileName.split('.').length - 1];
            //alert(FileExtension);
            if(uploadField.files[0].size >  2000000 || !(FileExtension == 'jpg' || FileExtension == 'JPG' || FileExtension == 'jpeg' || FileExtension == 'JPEG' || FileExtension == 'png' || FileExtension == 'PNG')){
                swal({
                        title: "Warning!",
                        text: "Please Upload Image Files Only\nMax upload size 2 MB",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        closeOnConfirm: false
                    });
               document.getElementById(val).value = "";
                
            };
        }
    </script>

<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script>
        //CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>
