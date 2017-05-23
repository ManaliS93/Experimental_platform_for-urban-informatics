

function submitOne(){
	var city = document.getElementById("topLeft").elements[0].value;
	var position = document.getElementById("topLeft").elements[1].value;
	var radius = document.getElementById("topLeft").elements[2].value;
	var venues = document.getElementById("topLeft").elements[3].value;
	//var selection = document.getElementById("topLeft").elements.namedItem("Arts").value;
	var selection1 = "";
	var inputElements = document.getElementsByClassName("Boxes1");
	
	for(var i = 0;inputElements[i];i++){
		if(inputElements[i].checked){
			selection1 = selection1 + inputElements[i].name;
		}		
	}
	
	//var selection = $('.Boxes1:checked').val(); -- gives the first checked value..jQuery code
	alert(city+" : "+position+" : "+radius+" : "+venues+" : "+selection1);
	return false;
}

function submitTwo(){
	var selection2 = "";
	var inputElements = document.getElementsByClassName("Boxes2");
	
	for(var i = 0;inputElements[i];i++){
		if(inputElements[i].checked){
			selection2 = selection2 + inputElements[i].name;
		}		
	}
	alert("Selected models: "+selection2);
}

function submitThree(){
	var selection3 = "";
	var inputElements = document.getElementsByClassName("Boxes3");
	
	for(var i = 0;inputElements[i];i++){
		if(inputElements[i].checked){
			selection3 = selection3 + inputElements[i].name;
		}		
	}
	alert("Selected profiles: "+selection3);
}
