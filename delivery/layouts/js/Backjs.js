var Photo=document.getElementById("Photo");
var File =document.getElementById('File');
var Anuller =document.getElementById('Anuller');

var Nompr=document.getElementById("Nompr");
var ICO =document.getElementById('ICO');
var inpPr=document.getElementById("inpPr");
var hnpr=document.getElementById("hnpr");
var HiddenNom=document.getElementById('HiddenNom');
var HiddenPrenom=document.getElementById('HiddenPrenom');
P1=document.getElementById('P1');


// alert('kk');

Photo.addEventListener("mouseenter", function( event ) {
	File.style.display="Block";
    Anuller.style.display="Block";

	 })
File.addEventListener("mouseenter", function( event ) {
	File.style.display="Block";
	Anuller.style.display="Block";
	 })
Photo.addEventListener("mouseleave", function( event ) {
	File.style.display="none";
	Anuller.style.display="none";
	 })

Anuller.addEventListener("mouseenter", function( event ) {
	Anuller.style.display="Block";
	File.style.display="Block";
	 })

File.addEventListener("change",function(event){
      document.forms["myfo"].submit();
						
						
})
Anuller.addEventListener('click',function(event){
	document.forms["myfo1"].submit();
})



Nompr.addEventListener("mouseenter", function( event ) {
	ICO.style.display="inline";
	 })
ICO.addEventListener("mouseenter", function( event ) {
	ICO.style.display="inline";
	 })
Nompr.addEventListener("mouseleave", function( event ) {
	if(inpPr.value!=""){
		
		hnpr.textContent=inpPr.value;
		splitNomPre=(hnpr.textContent).split(" ");
		HiddenNom.value=splitNomPre[0];
		HiddenPrenom.value=splitNomPre[1];
		
	}else{
		hnpr.textContent=hnpr.textContent;
		splitNomPre=(hnpr.textContent).split(" ");
		HiddenNom.value=splitNomPre[0];
		HiddenPrenom.value=splitNomPre[1];
	}
	
	hnpr.style.display="inline";
	ICO.style.display="none";
	
	inpPr.style.display="none";
	
	// var splitNomPre=(hnpr.textContent).split(" ");
	// console.log(splitNomPre[0]);
	 })
ICO.addEventListener("click", function( event ) {
	ICO.style.display="inline";
    hnpr.style.display="none";
	inpPr.style.display="inline";
	inpPr.value=hnpr.textContent;
	 })


var Divs = document.querySelectorAll(".profile-description-box div");
// alert(Divs[0].childNodes[0].innerHTML);
var LesIcons = document.querySelectorAll(".profile-description-box div .fa-edit");
var LesInputs = document.querySelectorAll(".profile-description-box div input");
var LesLabel = document.querySelectorAll(".profile-description-box div label");

for (var i = 0; i < Divs.length; i++) {
	Divs[i].addEventListener("mouseenter", function( event ) {
		this.children[3].style.display="inline";
		
	})
	
}

for (var i = 0; i < LesIcons.length; i++) {
	LesIcons[i].addEventListener("click",function(event){
		var input = this.previousElementSibling;
		ValLabel=input.previousElementSibling.textContent;
		
		this.previousElementSibling.style.display="inline";
		input.previousElementSibling.style.display = "none";
		input.value=ValLabel.split(" ").join("");
		
	})

}
for (var i = 0; i < Divs.length; i++) {
	Divs[i].addEventListener("mouseleave", function( event ) {

		this.children[3].style.display="none";
        var input = this.children[2];
        var label = this.children[1];
        var hiddenV=this.children[4];
       	if(input.value!=""){
		
		label.textContent=input.value;
		hiddenV.value=label.textContent;

	}else{
		label.textContent=label.textContent;
	}
        input.style.display="none";
        label.style.display="inline";
        hiddenV.value=label.split(" ").join("");
		
	})
	
}