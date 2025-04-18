    <?php
    class ConnectDb
    {
        private $pdo;
        private static  $instance = null;
        private function __construct()
        {
            $option = [PDO::ERRMODE_EXCEPTION => PDO::ATTR_ERRMODE]; // This attribute controls how PDO reports errors.
            try {
                $this->pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME .
                    ';port=' . PORT, USERNAME, PASSWORD, $option);
            } catch (PDOException $e) {
                exit('error: ' . $e->getMessage());
            }
        }
        public static function getInstance()
        {
            if (self::$instance == null) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        public function getConnect()
        {
            return $this->pdo;
        }
    }
