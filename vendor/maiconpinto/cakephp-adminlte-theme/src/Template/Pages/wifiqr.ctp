<?php include("qrcode.php");   ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QRCODE GENERATOR
        <small>Wifi tools</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Wifi tools</a></li>
        <li class="active">QR Generator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <!-- Main row -->
      <div class="row">
        <?php  if(array_key_exists("essid", $_POST)): ?>
            <div class="col-md-3" style="padding-top:0px">
          <!-- general form elements -->
            <!-- /.box-header -->
            <!-- form start -->
           
                <div class="box-body">
                        <p><img src="<?php 
                            $qr = new qrcode();

                            if(array_key_exists("essid", $_POST))
                            {
                             //wifi network configuration works on Android devices
                             //First param - Authentication type WPA or WEP
                             //Second param - Network SSID
                             //Third param - password
                             $qr->wifi($_POST["security"], $_POST["essid"], $_POST["key"]);
                             echo $qr->get_link();
                            }

                          ?>" border="0"></p>
                </div>
                
                
            </div>
        <?php endif ?>
        <div class="col-md-5" style="padding-top:10px">
          <!-- general form elements -->
            <!-- /.box-header -->
            <!-- form start -->
             
                <?php  if(!array_key_exists("essid", $_POST)): ?>
           
                <div class="form-group">
                     <form method="post" accept-charset="utf-8" role="form" action="/pages/wifiqr">
                         <div style="display:none;">
                             <input type="hidden" name="_method" value="POST"/>
                         </div>
                         <fieldset>
                        <div class="form-group text required">
                            <label for="network">Wifi Network Name (ESSID)</label>
                            <input type="text" name="essid" required="required" id="essid" class="form-control"/>
                        </div><div class="form-group password required">
                             <label for="password">Key</label>
                             <input type="text" name="key" required="required" id="key" class="form-control"/>
                        </div>
                             <div class="form-group select">
                                 <label for="group-id">Security</label>
                                <select name="security" class="form-control">
                                    <option value="">No Encryption</option>
                                    <option value="WPA">WPA</option>
                                    <option value="WEP">WEP</option>
                                 </select>
                             </div>
                         </fieldset>
                         <button class="btn btn-success" type="submit">Generate QR</button> 
                    </form>
            
                </div>
                 <?php else: ?>
                   <div class="form-group">
                     <form method="post" accept-charset="utf-8" role="form" action="/pages/wifiqr">
                         <div style="display:none;">
                             <input type="hidden" name="_method" value="POST"/>
                         </div>
                         <fieldset>
                        <div class="form-group text required">
                            <label for="network">Wifi ESSID:&nbsp;</label><?php echo $_POST["essid"] ?>
                        </div>
                        <?php  if($_POST["security"]!=""): ?>     
                            <div class="form-group password">
                                 <label for="password">Key:&nbsp;</label><?php echo $_POST["key"] ?>
                            </div>
                         <?php endif ?>
                         <div class="form-group select">
                             <label for="group-id">Encryption:&nbsp;</label><?php if ($_POST["security"]=="") echo "Open Wifi"; else echo $_POST["security"]; ?>
                         </div>
                         </fieldset>
                         <div class="row">
                            <div class="col-md-3">
                             <button class="btn btn-success" type="submit">Regenerate QR</button>
                         </div> 
                          <div class="col-md-2">
                             <a href="printqr?<?php echo 'essid='. $_POST["essid"] . '&key=' . $_POST["key"] . '&security=' . 
$_POST["security"] ?>">
                                 <button type="button" class="btn btn-success">Printable</button>
                              </a>
                         </div>
                         </div>
                          
                    </form>
            
                </div>
                  
                <?php endif ?>
              </div>
              <!-- /.box-body -->

              
              
              <div class="box-footer">
               
              </div>
           
          </div>
            
           
     </div>

      <!-- /.row (main row) -->
          
    </section>
    <!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/iCheck/flat/blue',
    'AdminLTE./plugins/morris/morris',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  'AdminLTE./plugins/morris/morris.min',
  'AdminLTE./plugins/sparkline/jquery.sparkline.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'AdminLTE./plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
  

<?php  $this->end(); ?>
