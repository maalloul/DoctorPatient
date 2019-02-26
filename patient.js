window.onload=page();
function page(){
setInterval(ajaxCallStatus, 1000); //300000 MS == 5 minutes



function ajaxCallStatus(){
var id = document.getElementById('id').value;	

			var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
	  
	var st = this.responseText;
	//alert(st);
	if(st == 'admit'){
		document.getElementById("status").value='admit';
  }	
  else if(st == 'closed'){
		document.getElementById("status").value='closed';
	  
  }
  
 
		}

  xhttp2.open('GET', "updatepatientstatus.php?id="+id, true);
  xhttp2.send();
  


}

}
