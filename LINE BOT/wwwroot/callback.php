<?php // callback.php
include('config.php');
//define("LINE_MESSAGING_API_CHANNEL_SECRET", '405b474427b5107c1c901414dd160073');
//define("LINE_MESSAGING_API_CHANNEL_TOKEN", 'ea3q+iXyuJM9xdOVy/j4aqndxwvnsTicP0/LfpvX9xucfBKyJvQjniwePZ69EwRGeoEHzx6am91Jjq2iKuuheXpR1rhgNApSpPN1IxYaq/V0X39dcySbKTWxspAByxIfxe8IaHLuHDlK0aMCgsFKSAdB04t89/1O/w1cDnyilFU=');

define("LINE_MESSAGING_API_CHANNEL_SECRET", '*******************');
define("LINE_MESSAGING_API_CHANNEL_TOKEN", '********************');

require __DIR__."/../vendor/autoload.php";
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\StickerMessage;
use LINE\LINEBot\KitchenSink\EventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\Util\UrlBuilder;


use LINE\LINEBot\Constant\ActionType;
use LINE\LINEBot\Constant\MessageType;
use LINE\LINEBot\Constant\TemplateType;

use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;

use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;

$bot = new \LINE\LINEBot(
    new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),
    ['channelSecret' => LINE_MESSAGING_API_CHANNEL_SECRET]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

$events = $bot->parseEventRequest($body, $signature);
//$packageId = '1';
//$stickerId = '2';
foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        $text = $event->getText();
        //$id = $event->getUserId();
        //$textid = $text.' '.$id;
        $kata_kunci = "/pesan";
        $kata_kunci_status = "/status";
        $kata_kunci_saran = "/saran";
        $text_baru_banget = explode(' ',$text,4);
        $text_komparasi = $text_baru_banget[0]." ".$text_baru_banget[1]." ".$text_baru_banget[2]." ".$text_baru_banget[3];
        if($text == "/command"){
            $text_balasan = "/status <ID device> Untuk melakukan pengecekan manula\n\n/pesan <ID Dokter> <ID Device> <isi pesan> untuk mengirim pesan kepada manula\n\n /saran <ID Device> untuk melihat pesan dokter";
            $bot->replyText($reply_token, $text_balasan);
        }
        else if($text == $text_komparasi && $kata_kunci == $text_baru_banget[0]){
            $query_dokter = mysql_query("select * from tb_profiledokter");
            $query_manula = mysql_query("select * from tb_profilemanula");
            while ($data_dokter = mysql_fetch_array($query_dokter)) 
            {
                if($data_dokter['dokterId'] == $text_baru_banget[1]){
                    $status_dokter = "ada";
                }
                else {
                    $status_dokter = "tidak ada";
                }
            }
            while ($data_manula = mysql_fetch_array($query_manula)) 
            {
                if($data_manula['beaconId'] == $text_baru_banget[2]){
                    $status_manula = "ada";
                }
                else {
                    $status_manula = "tidak ada";
                }
            }
            if($status_dokter == "tidak ada"){
                $text_balasan = "ID Dokter tidak dikenali";
            }
            else if($status_manula == "tidak ada"){
                $text_balasan = "ID Manula tidak dikenali";
            }
            else if ($status_dokter == "ada" && $status_manula == "ada"){
                $query_simpan = mysql_query("INSERT INTO tb_pesandokter(dari, kepada, pesan, waktu) values('$text_baru_banget[1]', '$text_baru_banget[2]', '$text_baru_banget[3]', NOW()) ") or die(mysql_error());

                if ($query_simpan){
                    $text_balasan = "Pesan telah tersimpan!";
                }
            }
            
            $bot->replyText($reply_token, $text_balasan);
            
        }
        else if($text && $kata_kunci_status == $text_baru_banget[0]){
            //$bot->replyMessage($reply_token, new StickerMessageBuilder('1', '2'));
            //$bot->pushMessage($reply_token, new StickerMessageBuilder($packageId, $stickerId));
            
            $queryManula = mysql_query("SELECT tb_profilemanula.beaconId, tb_profilemanula.nama as namaManula, tb_bpm.bpm, tb_bpm.aktivitas, tb_bpm.waktu FROM tb_bpm INNER JOIN tb_profilemanula ON tb_bpm.tb_profileManula_beaconId=tb_profilemanula.beaconId WHERE tb_profilemanula.beaconId = '$text_baru_banget[1]' ORDER BY tb_bpm.waktu DESC;");
            $query_manula = mysql_query("select * from tb_profilemanula");
            $dataManula = mysql_fetch_array($queryManula);
            while ($data_manula = mysql_fetch_array($query_manula)) 
            {
                if($data_manula['beaconId'] == $text_baru_banget[1]){
                    $status_manula = "ada";
                }
                else {
                    $status_manula = "tidak ada";
                }
            }
            if($status_manula == "ada"){
                $bot->replyMessage(
                $reply_token,
                new TemplateMessageBuilder(
                'Status',
                new ButtonTemplateBuilder(
                    $dataManula['namaManula'],
                    "Heart rate ".$dataManula['bpm']." bpm\nAktivitas ".$dataManula['aktivitas'],
                    'https://artificialoflaksman.com/project_root/padrayana.jpg',
                    [
            
                        new PostbackTemplateActionBuilder('Saran dari dokter', 'post=', "/saran ".$text_baru_banget[1]),
    
                    ]
                )
                )
                );
            }
            else if($status_manula == "tidak ada"){
                $text_balasan = "ID Manula tidak dikenali";
                $bot->replyText($reply_token, $text_balasan);
            }
            
            
        }
        else if($text && $kata_kunci_saran == $text_baru_banget[0]){
            
            $queryPesan = mysql_query("SELECT tb_profiledokter.nama as namaDokter, tb_pesandokter.dari, tb_pesandokter.kepada, tb_pesandokter.pesan, tb_pesandokter.waktu, tb_profilemanula.beaconId, tb_profilemanula.nama as namaManula FROM tb_pesandokter INNER JOIN tb_profiledokter ON tb_pesandokter.dari=tb_profiledokter.dokterId INNER JOIN tb_profilemanula ON tb_pesandokter.kepada=tb_profilemanula.beaconId WHERE tb_profilemanula.beaconId = '$text_baru_banget[1]' ORDER BY waktu DESC;");
            $query_manula = mysql_query("select * from tb_profilemanula");
            $dataPesan = mysql_fetch_array($queryPesan);
            while ($data_manula = mysql_fetch_array($query_manula)) 
            {
                if($data_manula['beaconId'] == $text_baru_banget[1]){
                    $status_manula = "ada";
                }
                else {
                    $status_manula = "tidak ada";
                }
            }
            
            if($status_manula == "ada"){
                $text_balasan = $dataPesan['pesan'];
                $bot->replyText($reply_token, $text_balasan);
            }
            else if($status_manula == "tidak ada"){
                $text_balasan = "ID Manula tidak dikenali";
                $bot->replyText($reply_token, $text_balasan);
            }
            
        }
        else if($text == "/menu"){
            //$bot->replyMessage($reply_token, new StickerMessageBuilder('1', '2'));
            //$bot->pushMessage($reply_token, new StickerMessageBuilder($packageId, $stickerId));
            $bot->replyMessage(
            $reply_token,
            new TemplateMessageBuilder(
                'BOT Pemantauan',
                new ButtonTemplateBuilder(
                    'Bot Pemantau',
                    'Selamat datang di BOT Pemantauan',
                    'https://artificialoflaksman.com/project_root/home2.jpg',
                    [
                        new UriTemplateActionBuilder('Aplikasi Admin', 'https://artificialoflaksman.com/admin'),
                        new UriTemplateActionBuilder('Aplikasi Pemantau', 'https://artificialoflaksman.com/ta/login.php'),
    
                    ]
                )
            )
            );
        }
        else if($text == "id"){
            $id = $event->getUserId();
            
            $url_hasil = 'https://api.line.me/v2/bot/profile/'.$id;
			$curl = curl_init($url_hasil);
			curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type:application/json', 
													 'Authorization:Bearer IsFZryYhiiFmMsIjh27bkweRfuErINvjXlKnJ9EtLsquadAtczXpjZHqHMVTKdJYu5tq+4pw7b7PQn7gqTtr+fC8vy2UhPanDj3fTc42CQvpoAHeY5iT2Mviuc1fsbOjDannfhmEZFSTxhBS2IoZgAdB04t89/1O/w1cDnyilFU='
													)
			
				);
			
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); // mengembalikan header setelah request
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); //security mati
			
			$hasil = curl_exec($curl);
			curl_close($curl);
			
			
			$json = json_decode($hasil);
            //echo $json->displayName;
            
            //$text_balasan = $profile['displayName'];
            $bot->replyText($reply_token, $json->displayName);
        }
        else if($text == "x"){
                    $buttonTemplateBuilder = new ButtonTemplateBuilder(
                    'My button sample',
                    'Hello my button',
                    'https://gunglaksman.com/project_root/artificial.jpg',
                    [
                        new UriTemplateActionBuilder('Go to line.me', 'https://line.me'),
                        new PostbackTemplateActionBuilder('Buy', 'action=buy&itemid=123'),
                        new PostbackTemplateActionBuilder('Add to cart', 'action=add&itemid=123'),
                        new MessageTemplateActionBuilder('Say message', 'hello hello'),
                    ]
                );
                $templateMessage = new TemplateMessageBuilder('Button alt text', $buttonTemplateBuilder);
                $bot->replyMessage($reply_token, $templateMessage);
        }
        
        else if($text == "member"){
            $carouselTemplateBuilder = new CarouselTemplateBuilder([
                    new CarouselColumnTemplateBuilder('Status kehadiran member', 'member lagi ada di lab gak ya?', 'https://gunglaksman.com/project_root/artificial.jpg', [
                        //new UriTemplateActionBuilder('Go to line.me', 'https://line.me'),
                        //new PostbackTemplateActionBuilder('Buy', 'action=buy&itemid=123'),
                        new MessageTemplateActionBuilder('Adrian', 'halo Adrian!'),
                        new MessageTemplateActionBuilder('Agung', 'halo Agung!'),
                        new MessageTemplateActionBuilder('Aldi', 'halo Aldi!'),
                    ]),
                    new CarouselColumnTemplateBuilder('Status kehadiran member', 'member lagi ada di lab gak ya?', 'https://gunglaksman.com/project_root/artificial.jpg', [
                        //new PostbackTemplateActionBuilder('Add to cart', 'action=add&itemid=123'),
                        new MessageTemplateActionBuilder('Byan', 'halo Byan!'),
                        new MessageTemplateActionBuilder('Sierly', 'halo Sierly!'),
                        new MessageTemplateActionBuilder('Qijul', 'halo Qijul!'),
                    ]),
                ]);
                $templateMessage = new TemplateMessageBuilder('Member', $carouselTemplateBuilder);
                $bot->replyMessage($reply_token, $templateMessage);
        }
    else if ($event instanceof LINE\LINEBot\Event\MessageEvent\StickerMessage) {
        $packageId = '1';
        //$stickerId = rand(1,500);
        $stickerId = '5';
        $reply_token = $event->getReplyToken();
        //$textid = "itu stiker ya ?";
        //$bot->replyText($reply_token, $packageId);
        $bot->replyMessage($reply_token, new StickerMessageBuilder($packageId, $stickerId));
        //$bot->pushMessage($reply_token, new StickerMessageBuilder($packageId, $stickerId));
    }
}

echo "OK";

?>