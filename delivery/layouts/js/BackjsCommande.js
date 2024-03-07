var TDBTN=document.querySelectorAll(".BTNValid");

for (var i = 0; i < TDBTN.length; i++) {
	TDBTN[i].children[0].addEventListener("click",function(event){
		var TR= this.parentElement;
		var form =TR.parentElement.parentElement.children[0];
		
		var txtaria=this.parentElement.previousElementSibling.children[1];
		if(txtaria.value==""){
			event.preventDefault();
			txtaria.style.border= "1px solid red";
		}else{
			txtaria.previousElementSibling.value=txtaria.value;
			form.submit();
		}
		
		// this.parentElement.previousElementSibling.children[0].readOnly=true;
		 
	})
    TDBTN[i].children[1].addEventListener("click",function(event){
    	var form =TR.parentElement.parentElement.children[0];
		event.preventDefault();
		var txtaria=this.parentElement.previousElementSibling.children[1];
		txtaria.style.border= "1px solid green";
		txtaria.readOnly=true;
		
		// if(txtaria.value==""){
		// 	event.preventDefault();
		// 	txtaria.style.border= "1px solid green";
		// }else{
		// 	event.preventDefault();
		// 	txtaria.previousElementSibling.value=txtaria.value;
		// 	// form.submit();
		// }
		// alert("nn");
		// this.parentElement.previousElementSibling.children[0].readOnly=true;
		 
	})


}