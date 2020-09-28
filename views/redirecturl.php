<?php
    include_once './config/database.php';
    include_once './models/ShortUrl.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new ShortUrl($db);
    $data=$_GET;
    if(isset($data) && is_array($data)){
        foreach($_GET as $key=>$val){
            $l=str_replace('/','',$key);	
            $item->shortUrl = $l;
        }
        $data = $item->getShortUrl();
        if($data) {
            if($data['url_status'] == 0) {
                $item->id = $data['id'];
                $item->hitCount = $data['hit_count']*1 + 1;
                $item->updateHitCount();

                header('location:'. $data['long_url']);
            }
        }
    }
    
?>