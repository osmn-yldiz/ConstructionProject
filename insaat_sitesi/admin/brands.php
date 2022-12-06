<?php  

include 'config.php';


include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
    $ID = cleanData($_GET['ID'], 1);
    $BrandsInfo = BrandsFind($ID);
}

$BrandsList = BrandsList();



?>

<?php include 'header.php'; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> <?php echo ($ID > 0 ? "Marka Güncelle":"Marka Ekle") ?></h2>

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
                            <form enctype="multipart/form-data" action="<?php if($ID > 0) echo 'brands_duzenle.php?ID='.$ID; else echo 'brands_ekle.php'; ?>" method="POST" role="form">
                                <div class="form-group">
                                    <label for="">Marka İsmi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="<?php echo $BrandsInfo['Name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Marka Resmi</label>
                                    <img height="150" src ="../uploads/popup/<?php echo $BrandsInfo['Images']; ?>">
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="Images">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Marka Linki</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="Link" value="<?php echo $BrandsInfo['Link']; ?>">
                                </div>

                                <!-- <input type="hidden" name="ID" value="<?php echo $ID; ?>"> -->
                                <button type="submit" name="<?php echo ($ID > 0 ? "guncelle":"ekle") ?>" class="btn btn-default"><?php echo ($ID > 0 ? "Güncelle":"Ekle") ?></button>
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

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-user"></i> Popuplar</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div>
                                <table class="table table-striped table-bordered bootstrap-datatable responsive">
                                    <thead>
                                        <tr>
                                            <th>Marka İsmi</th>
                                            <th>Marka Resmi</th>
                                            <th>Marka Linki</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($BrandsList as $row) 
                                        {        
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $row['Name']; ?></td>
                                                <td>
                                                    <?php if ($row['Images'] != '') { ?>
                                                        <img height="150" src="../uploads/brands/<?php echo $row['Images']; ?>">
                                                    <?php } else {
                                                        echo 'Resim Yok';
                                                    } ?>
                                                </td>
                                                <td class="center"><?php echo $row['Link']; ?></td>

                                                <td class="center">
                                                    <a class="btn btn-success" href="brands.php?ID=<?php echo $row['ID']; ?>">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="btn btn-danger" href="brands_sil.php?ID=<?php echo $row['ID']; ?>&Images=<?php print $row['Images'] ?>">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Sil
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }  
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/span-->

                </div><!--/row-->

                <?php include 'footer.php'; ?>
