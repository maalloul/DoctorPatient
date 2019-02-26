<?php

include 'database.php';
extract($_POST);
?>

<head>

</head>

<body>
<div id="patientin"></div>
<input type="button" id='showfill' value="Add Subscription" style='display:none;'>
<div id="fill" style='display:none;'>
Desription <input type='text' placeholder='Add description' required id="des">
Price <input type='text' placeholder='Enter the price' required id='price'>
<input type="button" id='Addfill' value="Submit Subscription">
<input type="hidden" value='' id='id'>


</div>
<table id='table' style='display:none;'>
<caption id='caption'></caption>
<tr>
<th>Date</th>
<th>Medical Description</th>
<th>Price</th>
</tr>

</table>
<div id='totals'></div>


<?php

	echo "<script type='text/javascript'>
	document.getElementById('showfill').onclick=function(){
	if(document.getElementById('fill').style.display=='none'){
		document.getElementById('fill').style.display='block';
	}
	else{
		document.getElementById('fill').style.display='none';
	}
}

setInterval(ajaxCall, 1000); //300000 MS == 5 minutes
		function ajaxCall(){
		 var x = 0 ;


			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
							 		 document.getElementById('patientin').innerHTML='';

		 var info = this.responseText;
		 
		 if(info!=''){
			 document.getElementById('totals').style.display='block';

			 					document.getElementById('showfill').style.display='block';

	 
		
	 var split = info.split(' ');
	 
	 var type = split[0].split(':');
	 if(type[0] == 'new'){
		 document.getElementById('id').value=type[1];
		 		 document.getElementById('patientin').innerHTML='';

		 var desc = document.createTextNode('A new patient is in ');
		 var text = document.createTextNode('Description');
		 var name = split[1];
		 var phone = split[2];
		 var text2 = document.createTextNode('Name: '+name+' Phone Number: '+phone);
		 document.getElementById('patientin').appendChild(desc);
		 document.getElementById('patientin').appendChild(text2); 
	 }
	 else{
		 
		 		 document.getElementById('id').value=type[1];
var rowCount = document.getElementById('table').rows.length;
var tableHeaderRowCount = 1;

		 var tds=document.getElementsByTagName('tr');
		 for(var j = tableHeaderRowCount ; j < rowCount;j++){
			 document.getElementById('table').deleteRow(tableHeaderRowCount);
		 }
		 				 document.getElementsByTagName('caption')[0].remove();

				 		 document.getElementById('patientin').innerHTML='';


		 		 var desc2 = document.createTextNode('A patient visits you again ');

		 document.getElementById('patientin').appendChild(desc2);
		var old=info.split(' ');
		var id=(old[0].split(':'))[1];
		var name=old[1];
		var phone=old[2];
		var cp = document.createElement('caption');
		cp.appendChild(document.createTextNode('Subscriptions of '+name));
				 document.getElementById('table').appendChild(cp);
						 		 		 var desc3 = document.createTextNode('Name: '+name+' Phone Number: '+phone);

					 					document.getElementById('table').style.display='block';
		 document.getElementById('patientin').appendChild(desc3);

			  var tblBody = document.createElement('body');
			x = 0 ;

		for(var i = 3 ; i < old.length-1;i++){
			if(old[i]!='' && old[i+1]!='' && old[i+2]!=''){
				var date=old[i];
				var desc = old[i+1];
								var price = old[i+2];
             
				var text = document.createTextNode(date);
				var text2 = document.createTextNode(desc);
								var text3 = document.createTextNode(price);
				x = x + parseInt(price);

				var tr = document.createElement('tr');
				var td1	= document.createElement('td');
								var td2	= document.createElement('td');
				var td3	= document.createElement('td');
				td1.appendChild(text);
				td2.appendChild(text2);
				td3.appendChild(text3);
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
    tblBody.appendChild(tr);
	  document.getElementById('table').appendChild(tr);

i+=2;	
					document.getElementById('totals').innerHTML = '';
document.getElementById('totals').innerHTML = 'Total Price: ' + x;


			}
		}
		
		

		
	 } 
	 			 					


		 		 var text = document.createTextNode('Description');

			 
	 
	  document.getElementById('Addfill').onclick=function(){
	   	  var id =  document.getElementById('id').value;

	  var desc =  document.getElementById('des').value;
		var price =  document.getElementById('price').value;
		var today = new Date();
		var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
document.getElementById('des').value='';
document.getElementById('price').value='';

var xhttp2 = new XMLHttpRequest();
  
  	
xhttp2.open('GET', 'addinfoforpatient.php?id='+id+'&desc='+desc+'&price='+price+'&time='+dd+'/'+mm+'/'+yyyy, true);
  xhttp2.send();

	   
	  }
				 
		 }
		 else{
			 document.getElementById('fill').style.display='none';
document.getElementById('showfill').style.display='none';
document.getElementById('table').style.display='none';
document.getElementById('totals').innerHTML='';
 x = 0 ;

		 }
		 
	}
  }
  
  xhttp.open('GET', 'doctorcheckspatientstatus.php', true);
  xhttp.send();
  }
  
  

	  	
	
	
	</script>";



?>

</body>