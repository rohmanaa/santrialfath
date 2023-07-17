function view(){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4 && xhr.status === 200){
      document.getElementById('chat').innerHTML = xhr.responseText;
    }
  }
  xhr.open('GET','chat.php',true);
  xhr.send();
}
setInterval(function(){view()},1000);
//insert
function insert(){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4 && xhr.status === 200){
      xhr.responseText;
    }
  }
  xhr.open('POST','php/insert.php',true);
  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhr.send('pesan='+form1.pesan.value);
  form1.pesan.value='';
  return false;
}