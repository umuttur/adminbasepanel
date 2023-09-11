<?php
class AdminClass
{
    protected $pdo = null;
    protected $host = 'localhost';
    protected $dbname = 'adminpanel';
    protected $username = 'root';
    protected $password = '';
    protected $charset = 'utf8';

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host; dbname=$this->dbname; charset=$this->charset;", $this->username, $this->password);
        } catch (PDOException $error) {
            die($error->getMessage());
        }
        if (!isset($_SESSION['mail']) && !isset($_SESSION['login'])) {
            header('location: ./login.php');
        }
    }
    public function getColorCount($color_desc) {
        $sql="SELECT COUNT(*) as total FROM `qp_color` WHERE color_desc = ?";
        $prepare= $this->pdo->prepare($sql);
        $prepare->execute([$color_desc]);
        $response = $prepare->fetch(PDO::FETCH_OBJ);
        if ($response) {
            return $response;
        }
        else {
            return false ;
        }
    }
    public function getSizeCount($size_desc) {
        $sql="SELECT COUNT(*) as total FROM `qp_size` WHERE size_desc = ?";
        $prepare= $this->pdo->prepare($sql);
        $prepare->execute([$size_desc]);
        $response = $prepare->fetch(PDO::FETCH_OBJ);
        if ($response) {
            return $response;
        }
        else {
            return false ;
        }
    }

    public function getCategories($categoryList, $parent = 0) {
        $data = [];
        foreach ($categoryList as $category) {
            if ($category->parent_id == $parent) {
                //CHİLD BULUYOR ()
                $childCategory = $this->getCategories($categoryList,$category->id);
                if ($childCategory) {
                    $category->child = $childCategory;
                }
                 $data[] = $category;
            }
        }
      return $data;
    }

    public function getStatu($data) {
        switch ($data) {
            case '1':
                return 'Aktif';
                break;
            case '2':
                return 'Pasif';
                break;
            default:
                return 'Belirsiz';
                break;
        }
    }

    public function pdoPrepare($sql,$args =[]) {
        $statment = $this->pdo->prepare($sql);
        $response = $statment->execute($args);
        if ($response) {
            return $response;
        } else {
            return false;
        }
    }
    public function pdoQueryObj($sql) {
        $query= $this->pdo->query($sql,PDO::FETCH_OBJ)->fetchAll();
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function pdoQuery($sql) {
        $query= $this->pdo->query($sql,PDO::FETCH_ASSOC)->fetchAll();
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function pdoInsert($sql, $args) {
        $statment = $this->pdo->prepare($sql);
        $response = $statment->execute($args);
        if ($response) {
            return '<div class="alert alert-success">İşlem Başarılı</div>' ;
        } else {
            return '<div class="alert alert-danger">İşlem Başarısız...</div>' ;
        }
    }
    public function pdoDelete ($sql, $args) {
        $statment = $this->pdo->prepare($sql);
        $response = $statment->execute($args);
        if ($response) {
            return '<div class="alert alert-success">Silme İşlemi Başarılı</div>' ;
        } else {
            return '<div class="alert alert-danger">Silme İşlem Başarısız...</div>' ;
        }

    }
    public function getAbout() {
        $sql = $this->pdo->query("SELECT * FROM qp_about ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
        if ($sql) {
            return $sql;
        }
        else {
            return false;
        }
    }




    public function getSecurity($data) {
        if (is_array($data)) {
            $variable = array_map('htmlspecialchars', $data);
            $response = array_map('stripslashes', $variable);
            return $response;
        }
        else {
            $variable = htmlspecialchars($data);
            $response = stripslashes($variable);
            return $response;
        }
    }
}
