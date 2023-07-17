<?php
    $id = $_GET['id'];
 // persiapkan curl
 $ch = curl_init(); 

 // set url 
 curl_setopt($ch, CURLOPT_URL, "https://equran.id/api/surat/$id");

 // return the transfer as a string 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

 // $output contains the output string 
 $output = curl_exec($ch); 

 // tutup curl 
 curl_close($ch);      

 // menampilkan hasil curl
 $detail = json_decode($output); 
 ?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Quran</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <style>
    @font-face {
        font-family: arabfont;
        src: url(fonts5/scheherazade.bold.ttf);
    }

    .arab {
        font-family: 'arabfont';
        font-size: 25pt;
        font-variant: inherit;
        line-height: 2;
    }

    .bg-br {
        background-image: url(images/pictures/pr.svg);
    }
    </style>
</head>


<body>
    <div id="page">
        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>quranid.php"
                class="header-title"><?php echo $detail->nama.' - '.$detail->nama_latin; ?></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-20px"></div>
        

        <div class="card card-style bg-br">

            <div class="content">
             <div class="d-flex">
                    <div class="me-auto">
                        <div class="list-group list-custom-large mt-n3">
                            <a href="#" class="border-0">
                                <img src="images/pictures/sholat.svg" class="rounded-sm">
                                <span class="color-white"><?php echo $detail->nama.' - '.$detail->nama_latin; ?></span>
                                <strong><?php echo $detail->tempat_turun.' &#10070; '.$detail->arti.' &#10070; '.$detail->jumlah_ayat; ?></strong>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="list-group list-custom-large mt-1">

                    <audio controls mute loop style="width:100%">
                        <source src="<?= $detail->audio; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>

                </div>
            </div>
        </div>

        <div class="content mt-n3 mb-n3"> 
		   <div class="search-box search-dark shadow-sm border-0 bg-theme rounded-sm bottom-0 mb-5 header-fixed">
			   <i class="fa fa-search"></i>
			   <input type="text" id="myInput" class="border-0" onkeyup="myFunction()" placeholder="Search here..">
		   </div>
</div>
        <div class="card card-style">
        
            <?php foreach($detail->ayat as $row):
    ?>
<ul id="myUL" style="list-style-type: none;  padding: 10px;" >
            <div class="content">
           
                <div class="d-flex">

                    <div class="ms-auto align-self-center text-right">
                        <div dir="rtl" lang="ar" class="arab mb-3 pt-3">
                            <p><?=$row->ar?></p>
                        </div>
                    </div>

                </div>
              
                <div class="d-flex">
                    <div class="align-self-center">
                        <span class="color-blue-dark font-12 font-500 ps-1"><?=$row->nomor?>. <?=$row->tr?></span><br>
                        <li> <span class="color-theme font-12 font-500 ps-1"><?=$row->nomor?>. <?=$row->idn?></span>   </li>
                    </div>
              
                </div>

            </div>
            </ul>
            <div class="divider mb-5 mt-n2 bg-gray-dark"></div>
           
            <?php
endforeach;?>
 

        </div>
      
        </div>

        <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
        </script>



        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>