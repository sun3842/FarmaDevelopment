
<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('pharmacy');?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12" id="gm_details">
                        <a href="<?php echo base_url('edit_pharmacy')."/".$pharmacy['pharmacy_id'] ?>" class="btn btn-warning btn-lg pull-right" >EDIT</a>
                        <div class="form-group" align="center">
                            <?php

                        $logo= $pharmacy['pharmacy_logo_storage_path'];
                            if($logo==null)
                            {
                                $logo='http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=No+Logo';
                            }
                            else
                            {
                                $logo=base_url().$pharmacy['pharmacy_logo_storage_path'];
                            }

                            ?>
                            <img src="<?php echo $logo ?>" width="200" height="200" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('business_name');?></label>
                            <p><?php echo $pharmacy['ragione_sociale'];?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('postal_code');?></label>
                            <p><?php echo $pharmacy['cap'];?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('city');?></label>
                            <p><?php echo $pharmacy['citta'];?></p>
                        </div>
                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('province');?></label>
                                    <p><?php echo $pharmacy['provincia'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('piva');?></label>
                                    <p><?php echo $pharmacy['piva'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('longitude');?></label>
                                    <p><?php echo $pharmacy['longitudine'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('latitude');?></label>
                                    <p><?php echo $pharmacy['latitudine'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">

                            <div class="col-sm-12">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('pharmacy_from_json');?></label>
                                <p><?php echo $pharmacy['pharmacy_from_json'];?></p>
                            </div>




                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('address');?></label>
                                    <p><?php echo $pharmacy['indirizzo'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('phone');?></label>
                                    <p><?php echo $pharmacy['telefono'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('fax');?></label>
                                    <p><?php echo $pharmacy['fax'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('email');?></label>
                                    <p><?php echo $pharmacy['email'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">URL</label>
                                    <p><?php echo $pharmacy['url'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1">URL App</label>
                                    <p><?php echo $pharmacy['url_app'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('local_ecommerce');?></label>
                                    <p><?php echo $pharmacy['ecommerce_locale'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('pharmacy_facebook_url');?></label>
                                    <p> <?php echo $pharmacy['pharmacy_facebook_url'];?> </p>

                                </div>
                            </div>
                        </div>













                        <div class="form-group">
                            <center><a class="btn-send" href="<?php echo site_url('home');?>">Indietro</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
