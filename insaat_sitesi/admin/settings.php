<?php  

include 'config.php';
include 'functions.php';

loginControl();

$lineSettingsCategories = settingsList();
$lineSettings = $lineSettingsCategories[0];
$lineSettingsLabel = $lineSettingsCategories[1];

?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Menu Güncelle":"Menu Ekle") ?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                        class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form action="settings_duzenle.php" method="POST" role="form">
                                <?php foreach ($lineSettings as $key =>$value){
                                 ?>

                                    <div class="form-group">
                                        <label for=""><?php echo $lineSettingsLabel[$key] ?></label>
                                        <input type="text" class="form-control" name="<?php echo $key ?>" value="<?php echo $value; ?>">
                                        <input type="hidden" name="Label[<?php print $key ?>]" value="<?php echo $lineSettingsLabel[$key]; ?>">
                                    </div> 

                                <?php } ?>
                                <!-- <input type="hidden" name="ID" value="<?php echo $ID; ?>"> -->
                                <button type="submit" name="guncelle" class="btn btn-default">Güncelle</button>
                            </form>
                            <?php 
                            foreach($error['errEmpty'] as $val){
                                print "<div class='alert alert-danger'>".$val."</div>";
                            }
                            ?>
                            <?php 
                            foreach($error['errOther'] as $val){
                                print "<div class='alert alert-warning'>".$val."</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--/span-->

            </div><!--/row-->

            <?php include 'footer.php'; ?>
