window.onload=page;
var ids = '';

function page(){

document.getElementById("addpatient").onclick=function(){
	if(document.getElementById("divpatient").style.display=="none"){
		document.getElementById("divpatient").style.display="block";
	}
	else{
		document.getElementById("divpatient").style.display="none";
	}
}
setInterval(ajaxCall, 1000); //300000 MS == 5 minutes
		function ajaxCall(){
			 document.getElementById('listofpatients').innerHTML='';

			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      ids =  this.responseText;
	 
		
		 
	 }
		 }
	 
		var split = ids.split('/');
		if(split.length == 0){
		 document.getElementById('listofpatients').innerHTML = 'Patients Waiting: not Found';	
		}
	 for(var i = 0 ; i < split.length ; i++){
		 var x = split[i].split(',');
		 if(x[0]!=''){
		var id=x[0];	 
		 var name=x[1];
		 var num = x[2];
		 var st=x[3];
		 var btnpatient = document.createElement('button');
		 var div = document.createElement('div');
		 div.innerHTML = 'Name: ' + name+ ' / PhoneNumber: ' + num;
		 var txt='';
		 if(st=='entered'){
		  txt = document.createTextNode('Accept');
		 }
		 else{
				  txt = document.createTextNode('Admitted/Close');
 
		 }
		
		 btnpatient.appendChild(txt);
		 btnpatient.setAttribute('id',id);
		 btnpatient.onclick=function(){
			 var txts = this.textContent || this.innerText;

			 if(txts=='Accept'){
			 	var xhttp2 = new XMLHttpRequest();
				var i = this.id;
 xhttp2.open('GET', "addpatienttoqueue.php?id="+i, true);
  xhttp2.send();
  
  
		 }
		 else{
				var xhttp3 = new XMLHttpRequest();
				var i = this.id;
 xhttp3.open('GET', "deletepatientfromqueue.php?id="+i, true);
  xhttp3.send();
   
		 }
		 };
		 document.getElementById('listofpatients').appendChild(div);
		 document.getElementById('listofpatients').appendChild(btnpatient);
		 }
	 }
  xhttp.open('GET', "secretarycheckspatientstatus.php", true);
  xhttp.send();
  }
}
	  
$( document ).ajaxComplete(function() {
	alert(ids);





  });
		

