<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategoriler</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-8">
                        <!-- general form elements disabled -->
                        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Kategori Ekle</h3>
              </div>
              <?php 
                  if (isset($_POST['save'])) {
                    if ($_POST['save'] == 1001) {
                        $tittle =$_POST['tittle'];
                        $parent_id=$_POST['parent_id'];
                        $statu =$_POST['statu'];
                        $adddate=date('Y-m-d H:i:s');
                        $sql = "INSERT INTO qp_categories(tittle, parent_id, statu, user_id, adddate) VALUES (?,?,?,?,?)";
                        $args = [$tittle,$parent_id,$statu,$user_id,$adddate];
                        $result = $adminclass->getSecurity($args);
                        $response = $adminclass->pdoPrepare($sql, $result);
                        if ($response) {
                            print '<div class="alert alert-success">Kategori Eklendi... </div>' ;
                            header("refresh:1;url=kategoriler");
                        } else {
                            print '<div class="alert alert-danger">Kategori Eklenmedi... </div>' ;
                        }
                    }
                }
              ?>
              <div class="card-body">
                <form method="POST">
                      <div class="form-group">
                        <label>Kategori Açıklaması</label>
                        <input type="text" class="form-control" name="tittle">
                      </div>
                      <div class="form-group">
                        <label>Üst Kategori</label>
                        <select class="form-control" name="parent_id">
                          <option value="0" selected>Yok</option>
                          <?php
                          $sql = "SELECT * FROM qp_categories ORDER BY qp_categories.tittle ASC";
                          $categories = $adminclass->pdoQueryObj($sql);

                          if ($categories) {
                            foreach ($categories as $category) { ?>
                             <option value="<?php print $category->id; ?>"><?php print $category->tittle; ?></option>
                            <?php }} ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu">
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="hidden"  name="save" value="1001">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
          </div>
          <div class="col-sm-4">
            <pre>
                <?php 
                $sql = "SELECT * FROM qp_categories";
                $categoryList = $adminclass->pdoQueryObj($sql);
                //print_r($categoryList);
                $category = $adminclass->getCategories($categoryList);
                //print_r($category);
                if ($category) {
                    foreach ($category as $value) {
                        print 'ANA KATEGORİLER: '.$value->tittle.'<br>' ;
                        if (isset($value->child)) {
                            foreach ($value->child  as $value) {
                                print 'ALT KATEFORİLER: '.$value->tittle.'<br>';
                            }

                        }
                    }
                }

                ?>
            </pre>
          </div>
        </div>
    </div>
    </section>
    </div>