<!DOCTYPE html>
<html>
  
<head>
 <meta charset="utf-8">
 <meta name="viewport"    
  content="width=device-width">
 
 <title>Caesar Chiper</title>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <script>  
          
  const alphabet = [
      'A','B','C','D','E','F',
      'G','H','I','J','K','L',
      'M','N','O','P','Q','R',
      'S','T','U','V','W','X',
      'Y','Z' 
  ];
    
 function encryptText() {
  
  const form = document.forms[0];
  
  let title=
   document.getElementById("titleId");  
     
  title.innerHTML = "Chiper text";
  
  let shift= Number(form.shift.value); 
     
  let sourceText =  
    form.sourceText.value;       
     
  form.sourceText.value 
    = [... sourceText ].map(char =>
      encrypt(char, shift)).join('');
 }
    
 function decryptText() {
  const form = document.forms[0];
  let title = document.getElementById("titleId");       
  
  title.innerHTML = "Plain text";
       
  let shift =   
    Number(form.shift.value);
  let sourceText = 
    form.sourceText.value;    
     
  shift = 
     (alphabet.length - shift) %  
      alphabet.length;
    
  form.sourceText.value 
      = [... sourceText ].map(char => 
        encrypt(char,    
        shift)).join('');
 }
    
 function encrypt(char, shift) {
  let include =        
   alphabet.includes(
    char.toUpperCase()); 
     
  if (include){      
   let position =         
    alphabet.indexOf(
     char.toUpperCase());
      
  let newPosition = 
    (position+shift) %  
      alphabet.length;
  return alphabet[newPosition];
 }else  return char;
}        
</script>
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
<div class="w3-center w3-container">
  <form class="w3-container w3-center w3-padding-32 w3-dark-grey">       
   <caption><h1 class="w3-text-black">Caesar Chiper</h1></caption>   
   <p id="titleId">Plain text</p>
  
   <div>          
    <textarea name="sourceText" 
       rows="8"
       cols="50"         
       spellcheck="false"
       value="">                       
    </textarea>
   </div>
  
   <div>      
    <label for="shift">Shift:</label>
    <select id="shift" name="shift">
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
     <option value="11">11</option>
     <option value="12">12</option>
     <option value="13">13</option>
     <option value="14">14</option>
     <option value="15">15</option>
     <option value="16">16</option>
     <option value="17">17</option>
     <option value="18">18</option>
     <option value="19">19</option>
     <option value="20">20</option>
     <option value="21">21</option>
     <option value="22">22</option>
     <option value="23">23</option>
     <option value="24">24</option>
     <option value="25">25</option>
    </select> 
  </div>
   
  <div>      
    <input type="button" class="w3-button w3-black" id="decrypt" 
       value="Enkripsi" 
       onclick="encryptText();">
    <input type="button" class="w3-button w3-black" id="decrypt" 
       value="Dekripsi" 
       onclick="decryptText();">    
  </div>
  
  </form>
</div>
</body>
</html>