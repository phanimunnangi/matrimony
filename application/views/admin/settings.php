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
                            <?php foreach ($details as $detail) { ?>
                            <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-2 control-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" required="" value="<?=$detail->phone;?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mail" value="<?=$detail->mail;?>" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Facebook</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="facebook" value="<?=$detail->facebook;?>" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Twitter</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="twitter" value="<?=$detail->twitter;?>" required=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Youtube</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="youtube" value="<?=$detail->youtube;?>" required=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pinterest</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="pinterest" value="<?=$detail->pinterest;?>" required=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Google Plus</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="google_plus" value="<?=$detail->google_plus;?>" required=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Instagram</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="instagram" value="<?=$detail->instagram;?>" required=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" required="" name="location"><?=$detail->location;?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Logo</label>
                                    <div class="col-sm-2">
                                        <img src="<?=base_url();?><?=$detail->logo;?>" class='img-responsive'>
                                        <input type="hidden" name="file1" value="<?=$detail->logo;?>">
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <input type="hidden" name="id" value="<?=$detail->id;?>">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

<?php 
$this->load->view('admin/includes/footer');
?>
<script>
        CKEDITOR.replace( 'location' );
</script>