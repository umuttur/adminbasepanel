<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>VİZYONUMUZ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
    if (isset($_POST['save'])) {
        if ($_POST['save'] == 1001) {
            $title =$adminclass->getSecurity( $_POST['title'] );
            $description =$adminclass->getSecurity( $_POST['description'] );
            $statu = $adminclass->getSecurity($_POST['statu'][0]);
            $adddate=date('Y-m-d H:i:s');
            $sql = "INSERT INTO qp_vision (tittle, description, adddate, user_id, statu) VALUES (?,?,?,?,?)";
            $args = [$title,$description,$adddate,$user_id,$statu];
            $result = $adminclass->getSecurity($args);
            print $adminclass->pdoInsert($sql, $result);
        }
    }

    if (isset($_POST['update'])) {
        if ($_POST['update'] == 1002) {
            $id = $_POST['id'];
            $tittle = $_POST['tittle'];
            $description = $_POST['description'];
            $statu = $_POST['statu'][0];
            $sql="UPDATE qp_vision SET tittle=?, description=?, statu=? WHERE id = ?";
            $args= [$tittle,$description,$statu,$id];
            $args=$adminclass->getSecurity($args);
            $variable=$adminclass->pdoPrepare($sql,$args);
            if ($variable == 1) {
                print '<div class="alert alert-success">İşlem Başarılı</div>' ;
            }
            else {
                print '<div class="alert alert-danger">İşlem Başarısız.....</div>' ;
            }
        }
    }

    if (isset($_POST['dataDelete'])) {
        $delete_id = $_POST['dataDelete'];
        $sql = "DELETE FROM qp_vision WHERE id = ?";
        $args = [$delete_id];
        $result = $adminclass->pdoDelete($sql,$args);
        print $result;
    }

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-newpost">
                  YENİ EKLE
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>BAŞLIK</th>
                    <th>AÇIKLAMA</th>
                    <th>DURUM</th>
                    <th>TARİH</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php
            $sql="SELECT * FROM qp_vision ORDER BY id ASC";
            $variable= $adminclass->pdoQuery($sql);
            if ($variable != false) {
            foreach ($variable as $value) {
            ?>
                  <tr>
                    <td><?php print $value['id'];?></td>
                    <td><?php print $value['tittle'];?></td>
                    <td><?php print $value['description'];?></td>
                    <td><?php print $adminclass->getStatu($value['statu']);?></td>
                    <td><?php print $value['adddate'];?></td>
                    <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php print $value['id'];?>">SİL</button>
                    <div class="modal fade" id="modal-default<?php print $value['id'];?>">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Vizyonumuz | Sil</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                    <input type="hidden" name="dataDelete" value="<?php print $value['id'];?>">
                                    <p><?php print $value['tittle'];?> || Bölümünü Silmek İstiyormusunuz ?</p>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">VAZGEÇ</button>
                                        <button type="submit" class="btn btn-danger">SİL</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default-update<?php print $value['id'];?>">GÜNCELLE</button>
                        <div class="modal fade" id="modal-default-update<?php print $value['id'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Vizyonumuz | Güncelle</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
         <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" name="tittle" value="<?php print $value['tittle']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" name="description"><?php print $value['description']?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                        <?php 
                        if ($value['statu'] == 1) {
                            echo
                            '<option value="1" selected>Aktif</option>
                            <option value="2">Pasif</option>';
                        } else{
                            echo
                            '<option value="1">Aktif</option>
                            <option value="2" selected>Pasif</option>';
                        }
                        ?>
                        </select>

                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">VAZGEÇ</button>
                    <button type="submit" class="btn btn-success">KAYDET</button>
                 </div>
                 <input type="hidden" name="id" value="<?php print $value['id']?>">
                 <input type="hidden" name="update" value="1002">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
                    </td>
                  </tr>
            <?php } }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>BAŞLIK</th>
                    <th>AÇIKLAMA</th>
                    <th>DURUM</th>
                    <th>TARİH</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modal-default-newpost">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Vizyonumuz | Yeni Ekle</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
         <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" name="title">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">VAZGEÇ</button>
                    <button type="submit" class="btn btn-success">KAYDET</button>
                 </div>
                 <input type="hidden" name="save" value="1001">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

