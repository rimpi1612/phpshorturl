<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../models/ShortUrl.php';

    $database = new Database();
    $db = $database->getConnection();
    $itemCount = 0;
    $items = new ShortUrl($db);
    $stmt = $items->getUrls();
    $itemCount = $stmt->rowCount();
    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $urlArr = array();
        $urlArr["body"] = array();
        $urlArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $row['id'],
                "longUrl" => $row['long_url'],
                "shortUrl" => $row['short_url'],
                "urlLabel" => $row['url_label'],
                "hitCount" => $row['hit_count'],
                "urlStatus" => $row['url_status']
            );

            array_push($urlArr["body"], $e);
        }
        echo json_encode($urlArr);
    }else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>