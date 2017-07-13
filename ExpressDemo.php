<?php  
	header("Contetn-Type:text/html;charset=utf-8");
    $host = "http://jisukdcx.market.alicloudapi.com";
    $path = "/express/query";
    $method = "GET";
    $appcode = "6c9172b7f193433d8dda13c3be6d6e6f";//你的阿里云appcode
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "number=3330206649362&type=auto";
    $bodys = "";
    $url = $host . $path . "?" . $querys;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }

    $res = curl_exec($curl);
    $jsonarr = json_decode($res,true);
    $result = $jsonarr['result'];
    if($result['issign'] == 1) echo '已签收'.'<br />';
    else echo '未签收'.'<br />';
    foreach($result['list'] as $val)
    {
        echo $val['time'].' '.$val['status'].'<br />';
    }
?>
