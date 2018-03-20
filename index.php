<?php 
// Zielbilddateien sollen alle dieselbe Breite haben
// 
// Die  Höhe der Zieldatei soll anhand folgender Werte
// berechnet werden: Quellbreite, Quellhöhe und Zielbreite

$src = './source/wolga.jpg'; // vgl. wolga2.jpg
$imgInfo = getimagesize($src);
$srcWidth = $imgInfo[0];
$srcHeight =$imgInfo[1];

$srcImg = imagecreatefromjpeg($src);



/*
 * gleiche Breite (200)
 *  src                dst
    600 breite        200 breite
 * ------------  =   ---------------
 *  485 höhe          x ($dstHeight)

    $dstWidth = 200;
 *  $dstHeight = $srcHeight * $dstWidth / srcWidth;
    $dstHeight = 485 * 200 / 600
 *  

*/
// Berechnung
$dstWidth = 200;
$dstHeight = intval($srcHeight * $dstWidth / $srcWidth);

$dstImg = imagecreatetruecolor($dstWidth, $dstHeight);
imagecopyresampled($dstImg, $srcImg, 0,0,0,0, $dstWidth,
        $dstHeight, $srcWidth, $srcHeight);
//imagejpeg($dstImg, './dest/bild.jpeg');
//imagejpeg($dstImg, './dest/wolga_200x161.jpg');
// pathinfo(); basename();
$pathinfo = pathinfo($src);
//$basename = basename($src);
    //imagejpeg($dstImg, './dest/wolga_200x161.jpg');
//imagejpeg($dstImg, './dest/'.$pathinfo['filename'].'_'.
//        $dstWidth.'x'.$dstHeight.'.'.$pathinfo['extension']);

$pInfo = pathinfo($src);
$dstFilename = $pInfo['filename'];
$dstExtension = $pInfo['extension'];
$dstPath = './dest/'.$dstFilename . '_' . $dstWidth . 'x' . 
        $dstHeight . '.' . $dstExtension;
imagejpeg($dstImg, $dstPath);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 05 GD Image Manipulation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            
           
            
            
        </div>

    </body>
</html>
<pre>
<?php 
// var_dump($srcHeight);
// var_dump('dstHeight: '.$srcHeight);
// echo $srcImg;
var_dump($pathinfo);
//var_dump($basename);
//var_dump($imagejpeg);


?>
</pre>