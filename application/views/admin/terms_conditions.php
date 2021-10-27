<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?=$page_title;?></h2>
                    <ol class="breadcrumb">
                        
                        <li>
                            <a href="<?=base_url();?>/admin/dashboard">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong><?=$page_title;?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?=$page_title;?></h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="" autocomplete="off">
                                <div class="form-group"><label class="col-sm-2 control-label">Terms And Conditions</label>
                                    <div class="col-sm-10">
                                       <textarea name="data" id="" cols="30" rows="10"><?=$details->data;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Privacy Policies</label>
                                    <div class="col-sm-10">
                                       <textarea name="privacy_policies" id="" cols="30" rows="10"><?=$details->privacy_policies;?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?=$details->id;?>">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php 
$this->load->view('admin/includes/footer');
?>
<script>
        CKEDITOR.replace( 'data' );
        CKEDITOR.replace( 'privacy_policies' );
</script>