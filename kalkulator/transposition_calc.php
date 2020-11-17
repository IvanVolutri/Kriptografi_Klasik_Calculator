<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta charset="UTF-8">
	<title>Transposition Chipper</title>
</head>
<link rel="stylesheet" href="bootstrap.css">
<script type="text/javascript">
	function Encrypt() {
	    plaintext = document.getElementById("p").value.toLowerCase().replace(/[^a-z]/g, "");  
	    if(plaintext.length < 1){ alert("please enter some plaintext"); return; }    
	    var key = document.getElementById("key").value.toLowerCase().replace(/[^a-z]/g, "");  
	    var pc = document.getElementById("pc").value.toLowerCase().replace(/[^a-z]/g, "");
	    if(pc=="") pc = "x";    
	    while(plaintext.length % key.length != 0) plaintext += pc.charAt(0);    
	    var colLength = plaintext.length / key.length;
	    var chars = "abcdefghijklmnopqrstuvwxyz"; 
	    ciphertext = ""; k=0;
	    for(i=0; i < key.length; i++){
	        while(k<26){
	            t = key.indexOf(chars.charAt(k));
	            arrkw = key.split(""); arrkw[t] = "_"; key = arrkw.join("");
	            if(t >= 0) break;
	            else k++;
	        }
	        for(j=0; j < colLength; j++) ciphertext += plaintext.charAt(j*key.length + t);
	    }
	    document.getElementById("c").value = ciphertext;
	}
	function Decrypt(f) {
	    ciphertext = document.getElementById("c").value.toLowerCase().replace(/[^a-z]/g, "");  
	    if(ciphertext.length < 1){ alert("please enter some ciphertext (letters only)"); return; }    
	    keyword = document.getElementById("key").value.toLowerCase().replace(/[^a-z]/g, ""); 
	    klen = keyword.length;
	    if(klen <= 1){ alert("keyword should be at least 2 characters long"); return; }
	    // first we put the text into columns based on keyword length
	    var cols = new Array(klen);
	    var colLength = ciphertext.length / klen;
	    for(i=0; i < klen; i++) cols[i] = ciphertext.substr(i*colLength,colLength);
	    // now we rearrange the columns so that they are in their unscrambled state
	    var newcols = new Array(klen);
	    chars="abcdefghijklmnopqrstuvwxyz"; j=0;i=0;
	    while(j<klen){
	        t=keyword.indexOf(chars.charAt(i));        
	        if(t >= 0){
	            newcols[t] = cols[j++];
	            arrkw = keyword.split(""); arrkw[t] = "_"; keyword = arrkw.join("");
	        }else i++;         
	    }    
	    // now read off the columns row-wise
	    plaintext = "";
	    for(i=0; i < colLength; i++){
	        for(j=0; j < klen; j++) plaintext += newcols[j].charAt(i);
	    }            
	    document.getElementById("p").value = plaintext;    
	}
 </script>
<body>
	<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transposition Chiper</title>
  </head>
  <body class="w3-grey">
<div class="w3-top">
  <div class="w3-dark-grey w3-xlarge" style="max-width:3000px;margin:auto">
     <a href="/kriptografi_UTS/index.html"><div class="w3-button w3-padding-16 w3-left">Back</div></a>
    <div class="w3-right w3-padding-16"></div>
    <div class="w3-center w3-text-black w3-padding-16">Kriptografi</div>
  </div>
</div>
<br><br><br><br><br>
    <div class="w3-container w3-center w3-dark-grey">
      <div class="starter-template" style="text-align:left;">
      	<div class="center" style="width: 600px;margin: auto;">
	<table class="w3-table w3-container w3-center" style="width:80%; padding:100px;">
		<tr>
			<td colspan="3">
				<h1 class="w3-text-black w3-center">TRANSPOSITION CIPHER</h1>
			</td>
		</tr>
		<tr>
			<td>Key</td>
			<td>:</td>
			<td>
				<input id="key" placeholder="Kunci" class="form-control" name="key" size="10" value="" type="text"> 
				<br>
			</td>
		</tr>
		<tr>
			
			<td>Plain text</td>
			<td>:</td>
			<td>
				<textarea id="c" class="form-control" name="c" rows="4" cols="50" placeholder="Masukkan Plain text"></textarea><br>
				<input name="btnDe" class="w3-button w3-black btn btn-primary" value="Enkripsi" onclick="Decrypt()" type="button">
			</td>
		</tr>
		<br>
		<tr>
			<td colspan="3">
				
				
			</td>
		</tr>
		<tr>
			<td>Chiper Text</td>
			<td>:</td>
			<td>
				<input id="pc" name="pc"  size="1" value="x" type="hidden">
				<textarea id="p" class="form-control" name="p" rows="4" cols="50" placeholder="Masukkan Chiper text"></textarea><br>
				<input name="btnDe" class="w3-button w3-black btn btn-primary" value="Dekripsi" onclick="Encrypt()" type="button">
			</td>
			<tr>
				<td>
				
			</td>

			</tr>
		</tr>
	</table>
	</div>
  </body>
</html>