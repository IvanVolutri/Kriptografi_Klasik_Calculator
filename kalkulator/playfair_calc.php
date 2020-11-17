<!DOCTYPE html>
<html>
<head>
  <title>Playfair Chiper</title>
  <script type="text/javascript">
    var isChet = false;
var isEnd = false;
var flag = false;
var flagX = false;
var flagAdd = false;
function getKeyword(key) { 
   var key = document.getElementById("key").value;
   return document.getElementById("key").value;
}

function getString() {
  return document.getElementById("String").value;
}

function processKey() { 
  var key = getKeyword();
  key = key.toUpperCase().replace(/\s/g, '').replace(/J/g, "I");
  var result = [];
  var temp = '';
  var alphabet = 'ABCDEFGHIKLMNOPQRSTUVWXYZ';
  for(var i = 0; i < key.length; i++) {
    if (alphabet.indexOf(key[i]) !== -1) {
      alphabet = alphabet.replace(key[i], '');
      temp += key[i];
    }
  }
  temp += alphabet;
  var result = [];
  temp = temp.split('');
  while(temp[0]) {
    result.push(temp.splice(0,5));
  }
  return result;
}

function cipher() {
  var keyresult = processKey();
  var res = [];
  var error = 'Warning!!! String is empty';
  var str = getString();
  if(str === '') {
    document.getElementById('printValue').innerHTML = error;
  }
  // var err = 'ERRORX';
  var textPhrase, separator;
  str = str.toUpperCase().replace(/\s/g, '').replace(/J/g, "I");
  if(str.length === 0) {
    //document.getElementById("printValue").innerHTML = err.toUpperCase().replace(/\s/g, '').replace(/J/g, "I");
    }
  else {
    textPhrase = str[0];
  }
  var help = 0; flagAdd = false;
  for(var i = 1; i < str.length; i++) {
      if(str[i - 1] === str[i]) {
        if(str[i] === 'X') {
          separator = 'Q';
        }
        else {
          separator = 'X';
        }
        textPhrase += separator + str[i];
        help = 1; 
      }
      else {
        textPhrase += str[i];
      }
    if(help === 1) {
      flagAdd = true;
    }
  }
  
  if(textPhrase.length % 2 !== 0) {
    if(textPhrase[textPhrase.length - 1] === 'X') {
      textPhrase += 'Q';
      isEnd = true;
      flagX = false;
    }
    else {
      textPhrase += 'X';
      isEnd = true;
      flagX = true;
    }
  }
  
  var t = [];
  var enCodeStr = '';
  for(var i = 0; i < textPhrase.length; i += 2){
    var pair1 = textPhrase[i];
    var pair2 = textPhrase[i + 1];
    var p1i, p1j, p2i, p2j;
    for(var stroka = 0; stroka < keyresult.length; stroka++) {
      for(var stolbec = 0; stolbec < keyresult[stroka].length; stolbec++){
        if (keyresult[stroka][stolbec] == pair1){
          p1i = stroka;
          p1j = stolbec;
        }
        if (keyresult[stroka][stolbec] == pair2){
          p2i = stroka;
          p2j = stolbec;
        }
      }
    }
    var coord1 = '', coord2 = '';
    
    if(p1i === p2i) {
      if(p1j === 4) {
        coord1 = keyresult[p1i][0];
      }
      else {
        coord1 = keyresult[p1i][p1j + 1];
      }
      if(p2j === 4) {
        coord2 = keyresult[p2i][0];
      }
      else {
        coord2 = keyresult[p2i][p2j + 1]
      }
    }
    if(p1j === p2j) {
      if(p1i === 4) {
        coord1 = keyresult[0][p1j];
      }
      else {
        coord1 = keyresult[p1i + 1][p1j];
      }
      if(p2i === 4) {
        coord2 = keyresult[0][p2j];
      }
      else {
        coord2 = keyresult[p2i + 1][p2j]
      }
    }
    if(p1i !== p2i && p1j !== p2j) {
      coord1 = keyresult[p1i][p2j];
      coord2 = keyresult[p2i][p1j];
    }
    enCodeStr = enCodeStr + coord1 + coord2;
  }
  document.getElementById("printValue").innerHTML = enCodeStr;
  // alert("Добавили букву в середине слова? - " + flagAdd);
  return enCodeStr;
}

function deCodeCipher() {
  var deCodeStr = '';
  var text = '';
  var error = "Warning!!! String is empty";
  var text1 = cipher();
  if(text1 === '') {
    document.getElementById('printDeCode').innerHTML = error;
  }
  var keyresult = processKey();
  for(var i = 0; i < text1.length; i += 2){
    var pair1 = text1[i];
    var pair2 = text1[i + 1];
    var p1i, p1j, p2i, p2j;
    for(var stroka = 0; stroka < keyresult.length; stroka++) {
      for(var stolbec = 0; stolbec < keyresult[stroka].length; stolbec++){
        if (keyresult[stroka][stolbec] == pair1){
          p1i = stroka;
          p1j = stolbec;
        }
        if (keyresult[stroka][stolbec] == pair2){
          p2i = stroka;
          p2j = stolbec;
        }
      }
    }
    var coord1 = '', coord2 = '';
    
    if(p1i === p2i) {
      if(p1j === 0) {
        coord1 = keyresult[p1i][4];
      }
      else {
        coord1 = keyresult[p1i][p1j - 1];
      }
      if(p2j === 0) {
        coord2 = keyresult[p2i][4];
      }
      else {
        coord2 = keyresult[p2i][p2j - 1]
      }
    }
    if(p1j === p2j) {
      if(p1i === 0) {
        coord1 = keyresult[4][p1j]
      }
      else {
        coord1 = keyresult[p1i - 1][p1j];
      }
      if(p2i === 0) {
        coord2 = keyresult[4][p2j];
      }
      else {
        coord2 = keyresult[p2i - 1][p2j]
      }
    }
    if(p1i !== p2i && p1j !== p2j) {
      coord1 = keyresult[p1i][p2j];
      coord2 = keyresult[p2i][p1j];
    }
    text = text + coord1 + coord2;
  }
  text = text.split('');
  
  for(var i = 0; i < text.length; i++) {
    var count;
    if (flagAdd) {
      if(text[i] === text[i + 2] && (text[i + 1] === 'X' || text[i + 1] === 'Q')) {
        count = i + 1;
        text.splice(count, 1);
      }
    }
    else if(flagAdd && isEnd && (flagX || !flagX)) {
      if(text[i - 2] === text[i] && (text[i - 1] === 'X' || text[i - 1] === 'Q'))
        count = i + 1;
      text.splice(count, 1);
    }
    else if(!flagAdd) {
      break;
    }
  }
  if(flagX) {
    text.pop();
  }
  if(isEnd && !flagX) {
    text.pop();
  }
  text = text.join('');
  console.log(text);
  document.getElementById('printDeCode').innerHTML = text;
}
  </script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-grey">
<div class="w3-top">
  <div class="w3-dark-grey w3-xlarge" style="max-width:3000px;margin:auto">
     <a href="/kriptografi_UTS/index.html"><div class="w3-button w3-padding-16 w3-left">Back</div></a>
    <div class="w3-right w3-padding-16"></div>
    <div class="w3-center w3-text-black w3-padding-16">Kriptografi</div>
  </div>
</div>
<br><br><br><br><br><br>
  <div class="w3-container w3-center w3-dark-grey">
    <h1 class="w3-text-black">Playfair Chiper</h1>
    <div>
    <div class="w3-container w3-center">
      <div class="w3-container w3-center" style="margin: auto;">
      <table class="w3-center w3-white w3-table w3-container" style="max-width: 350px;margin: auto;">
      <tr>
        <td><label>Key :</label>  </td>
        <td><input id="key" type="text" class="form-control" placeholder="Enter key" required></td>
      </tr>
      <tr>
        <td>
          <label>Plain Text:</label>
        </td>
        <td>
          <input id="String" type="text" class="form-control otstup" placeholder="Enter a word or string">
        </td>
      </tr>
      </table>
      </div>
      <br>
      <div>
        <button class="w3-button w3-black btn btn-primary form-control" onclick="processKey(), cipher()">Enkripsi</button>
      </div>
      <div>
        <h4 class="text-center" id="printValue"></h4>
      </div>
      <button class="w3-button w3-black btn btn-success form-control" onclick="deCodeCipher()">Dekripsi</button>
    </div>
      <div>
        <h4 class="text-center" id="printDeCode"></h4>
      </div>
    </div>
  </div>
</body>
</html>