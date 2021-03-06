<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <p class="text-muted">Modify Offers</p>
        </div>
    </div>

    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
              <?php echo form_open(base_url() . 'index.php/membership/update', 'role="form" class="form-horizontal"'); ?>

                <input type="hidden" name="membership_id" value="<?=$offer->price_table_id;?>">
                <div class="form-group">
                  <label for="membership_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Membership Type:</label>
                  <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <?php echo form_input('membership_type', $offer->price_table_title, 'id="title" class="form-control" required="required"') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="validity_period" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Validity Period:</label>
                  <div class="col-lg-3 col-sm-4 col-xs-4 col-mb">
                    <?php echo form_input('validity_period', $offer->offer_duration, 'placeholder="Validity period" id="validity_period" class="form-control" required="required"') ?>
                  </div>
                  <div class="col-sm-2 col-xs-2">
                      <?php
                      $option = array(
                        'months' => 'Month',
                        'years' => 'Year',
                        'days' => 'Day');
                      ?>
                      <?php echo form_dropdown('validity_type', $option, $offer->offer_type,'class="form-control"') ?>
                  </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Price:</label>
                    <div class="col-sm-3 col-xs-6 col-mb">
                        <div class="input-group">
                          <?php echo form_input('price', $offer->price_table_cost, 'id="price" class="form-control"') ?>
                          <span class="input-group-addon"> <?=$currency_symbol?> </span>
                        </div>            
                    </div>
                </div>
                <?php $i = 0; foreach ($features as $value) { $i++; ?>
                <div class="form-group">
                    <label for="feature_1" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Feature <?=$i ?>:</label>
                    <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                      <?php 
                        $data = array(
                            'name'        => 'feature['.$value->feature_id.']',
                            'id'          => 'feature_1',
                            'value'       => $value->feature_item,
                            'rows'        => '2',
                            'class'       => 'form-control textarea-wysihtml5'
                        ); ?>
                        <?php echo form_textarea($data) ?>
                    </div>
                </div>
                <?php } ?>

              <div class="col-xs-offset-1 col-sm-offset-2 col-xs-4">
                  <button type="submit" class="btn btn-primary col-xs-6">Update</button>&nbsp;
              </div>
            <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>

<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
    
