<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../models/ShortUrl.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new ShortUrl($db);

    if(isset($_POST['long_url']) && isset($_POST['short_url'])){
        $data=$_POST;
        $item->longUrl = $data['long_url'];
        $item->shortUrl = $data["short_url"];
        $item->urlLabel = $data["url_label"];
        $item->hitCount = 0;
        $item->urlStatus = 0;
    } else {
        header('location:'.'/shorturl/views/form.php?message="URL Already Exists');
    }
    if($item->createShortUrl()){
        header('location:'.'/shorturl/views/list.php');
    } else{
        header('location:'.'/shorturl/views/form.php?message="URL Already Exists"');
    }
?>