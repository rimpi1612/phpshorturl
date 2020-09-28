<?php
    class ShortUrl{

        // Connection of the database
        private $conn;

        // Table Name
        private $db_table = "test_short_url";

        // Columns of the Table
        
        public $id;
        public $longUrl;
        public $shortUrl;
        public $urlLabel;
        public $hitCount;
        public $urlStatus;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL URLS
        public function getUrls(){
            $sqlQuery = "SELECT 
                        id, 
                        long_url, 
                        short_url, 
                        url_label, 
                        hit_count, 
                        url_status 
                        FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

       
        // get single url
        public function getShortUrl(){
            $sqlQuery = "SELECT
                        id, 
                        long_url, 
                        short_url, 
                        url_label, 
                        hit_count, 
                        url_status
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    short_url = :short_url
                    ";
            
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":short_url", $this->shortUrl);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            return $dataRow;
        } 
        
         // CREATE SHORT URL
         public function createShortUrl(){
            $short = $this->getShortUrl();
            if(!empty($short)) {
                return false;
            }
       
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        long_url = :longUrl, 
                        short_url = :shortUrl, 
                        url_label = :urlLabel, 
                        hit_count = :hitCount, 
                        url_status = :urlStatus
                    ";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // bind data
            $stmt->bindParam(":longUrl", $this->longUrl);
            $stmt->bindParam(":shortUrl", $this->shortUrl);
            $stmt->bindParam(":urlLabel", $this->urlLabel);
            $stmt->bindParam(":hitCount", $this->hitCount);
            $stmt->bindParam(":urlStatus", $this->urlStatus);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        // UPDATE HIT COUNT
        public function updateHitCount(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        hit_count = :hitCount 
                    WHERE 
                        id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            // bind data
            $stmt->bindValue(":hitCount", $this->hitCount);
            $stmt->bindValue(":id", $this->id);
            if($stmt->execute()){
                
                return true;
            }
            return false;
        }

        // UPDATE URL STATUS
        public function updateUrlStatus(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    url_status = :urlStatus 
                    WHERE 
                        id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            // bind data
            $stmt->bindValue(":urlStatus", $this->urlStatus);
            $stmt->bindValue(":id", $this->id);
            if($stmt->execute()){
                
                return true;
            }
            return false;
        }

        // DELETE URL
        public function deleteUrl(){
            $sqlQuery = "delete from 
                        ". $this->db_table ."
                    WHERE 
                        id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            // bind data
            $stmt->bindValue(":id", $this->id);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
    }
?>
