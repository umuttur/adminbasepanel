<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mobil Uygulama Güncelleme</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
          <?php 
                if (isset($_POST['save'])) {
                    if ($_POST['save']==1001) {
                        $id= $_POST['id'];
                        $tittle = $_POST['tittle'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $newprice = $_POST['newprice'];
                        $adddate = date('Y-m-d H:i:s');
                        $statu = $_POST['statu'][0];
                        $image ="images/". $_FILES['images']['name'];
                        $image_tmp= $_FILES['images']['tmp_name'];
                        if ($image_tmp != '') {
                            if (file_exists($image)) {
                                print '<div class="alert alert-danger">İşlem Başarısız Aynı Dosya Var..</div>';
                            }
                            else {
                                $sql = "SELECT image FROM qp_mobileapp WHERE id = {$id}";
                                $query = $adminclass->pdoQuery($sql);
                                if ($query) {
                                    $delete_image= $query[0]['image'];
                                    unlink($delete_image);
                                }
                                move_uploaded_file($image_tmp,$image);
                                $sql="UPDATE qp_mobileapp SET tittle=?, description=?, price=?, newprice=?, adddate=?, user_id=?, statu=?, image=? WHERE id=?";
                                $args= [$tittle, $description, $price, $newprice, $adddate, $user_id, $statu, $image, $id];
                                $args = $adminclass->getSecurity($args);
                                $query = $adminclass->pdoPrepare($sql,$args);
                                if ($query) {
                                    print '<div class="alert alert-success">Resim Güncelleme Başarılı..</div>';
                                    header("location: ./mobiluygulama");
                                }
                                else {
                                    print '<div class="alert alert-danger">İşlem Başarısız..</div>';
                                }
                            }
                        }


                        $sql="UPDATE qp_mobileapp SET tittle=?, description=?, price=?, adddate=?, user_id=?, statu=? WHERE id=?";
                        $args= [$tittle, $description, $price, $adddate, $user_id, $statu, $id];
                        $args = $adminclass->getSecurity($args);
                        $query = $adminclass->pdoPrepare($sql,$args);
                        if ($query) {
                            print '<div class="alert alert-success">İşlem Başarılı..</div>';
                            header("location: ./mobiluygulama");
                        }
                        else {
                            print '<div class="alert alert-danger">İşlem Başarısız..</div>'; }



                        
                        // $image = 'images/'.$_FILES['images']['name'];
                        // $image_tmp = $_FILES['images']['tmp_name'];

                        // if (file_exists($image)) {
                        //     print '<div class="alert alert-danger">Aynı İsimde Dosya Mevcut !</div>';
                        // }
                        // else {
                        // move_uploaded_file($image_tmp, $image);





                        // }
                    }
                }
                
                if (isset($_GET['id'])) {
                    $id = $adminclass->getSecurity($_GET['id']);              
                ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Uygulama Güncelleme</h3>
                </div>
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php print $id ;?>">
                <?php 
                $sql = "SELECT * FROM qp_mobileapp WHERE id = {$id}";
                $query = $adminclass->pdoQueryObj($sql);
                if ($query) {
                ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Uygulama Adı</label>
                    <input type="text" class="form-control" name="tittle" value="<?php echo $query[0]->tittle;?>">
                  </div>
                  <div class="form-group">
                    <label>Uygulama Özellikleri</label>
                    <textarea class="form-control" rows="3" name="description"><?php echo $query[0]->description; ?></textarea>
                    </div>
                    <div class="form-group">
                     <label>Uygulama Fiyatı</label>
                      <input type="text" class="form-control" name="price" value="<?php print $query[0]->price;?>">
                     </select>
                      </div>
                      <div class="form-group">
                     <label>İndirimli Fiyatı</label>
                      <input type="text" class="form-control" name="newprice" value="<?php print $query[0]->newprice;?>">
                     </select>
                      </div>
                  <div class="form-group">
                     <label>Uygulama Durum</label>
                     <select class="form-control" name="statu[]">
                         <option value="1">Aktif</option>
                         <option value="2">Pasif</option>
                     </select>
                      </div>
                  <div class="form-group">
                    <label>Uygulama Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="images">
                      </div>
                    </div>
                    <img src="<?php echo $query[0]->image;?>" style="width: 200px;;">
                  </div>
                </div>
                <?php }}?>
                <!-- /.card-body -->
                <input type="hidden" name="save" value="1001">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            

              <!-- /.card-body -->
            </div>
        
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
