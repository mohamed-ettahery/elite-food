 var CommandeV=parseInt(document.getElementById("CommandeV").textContent); 
 var CommandeNV=parseInt(document.getElementById("CommandeNV").textContent); 
 var CommandeA=parseInt(document.getElementById("CommandeA").textContent);
 var CourbeV=document.getElementById("CourbeV"); 
 var CourbeNV=document.getElementById("CourbeNV");
 var CourbeA=document.getElementById("CourbeA");
 function Courbe(Commande,Courbe){
     $(Courbe).css("transition","all 2s");
      $(Courbe).css("height",Commande+"%"); 
 }
Courbe(CommandeV+1,CourbeV);
Courbe(CommandeNV,CourbeNV);
Courbe(CommandeA,CourbeA);