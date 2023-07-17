<?php
    $id = $_GET['id'];
 // persiapkan curl
 $ch = curl_init(); 

 // set url 
 curl_setopt($ch, CURLOPT_URL, "https://equran.id/api/tafsir/$id");

 // return the transfer as a string 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

 // $output contains the output string 
 $output = curl_exec($ch); 

 // tutup curl 
 curl_close($ch);      

 // menampilkan hasil curl
 $detail = json_decode($output); 
 echo $detail->nomor.' - '.$detail->nama.' - '.$detail->nama_latin;
 echo "<hr>";
 echo "<ul>";
 foreach($detail->tafsir as $row):
    ?>
        <li><?= $row->surah.'.'.$row->ayat.'.'.$row->tafsir?></li>
    <?php
 endforeach;
 echo "</ul>";
