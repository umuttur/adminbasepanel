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