<?php
 // persiapkan curl
 $ch = curl_init(); 

 // set url 
 curl_setopt($ch, CURLOPT_URL, "https://equran.id/api/surat");

 // return the transfer as a string 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

 // $output contains the output string 
 $output = curl_exec($ch); 

 // tutup curl 
 curl_close($ch);      

 // menampilkan hasil curl
 $data = json_decode($output); 
 print_r($data);