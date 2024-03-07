 if(document.getElementById('P1')){
  var V1=parseInt(document.getElementById("P1").textContent); 

}
if (document.getElementById('P2')) {
   var VN1=parseInt(document.getElementById("P2").textContent);
}
if (document.getElementById('PA1')) {
   var VA1=parseInt(document.getElementById("PA1").textContent);
}

 var V2=document.getElementById("Label4");
 var VN2=document.getElementById("LabelN4");
  var VA2=document.getElementById("LabelA4");
 var Valide2 = document.getElementById("Valide2");
 var Valide1 = document.getElementById("Valide1");
 var ValideN2 = document.getElementById("ValideN2");
 var ValideN1 = document.getElementById("ValideN1");
 var ValideA2 = document.getElementById("ValideA2");
 var ValideA1 = document.getElementById("ValideA1");
 let A=0;
    let B = 0;
    
function Rotate1(Depart, Degree, IDControl) {
    while (Depart < Degree) {
        $(IDControl).css({ transform: 'rotate(' + Depart + 'deg)' });
        Depart = Depart + 3;
      
    }
   
}
function Rotate2(Depart, Degree, IDControl) {
    while (Depart < Degree) {
        $(IDControl).css({ transform: 'rotate(' + Depart + 'deg)' });
        Depart = Depart + 1;
    }
}
function rotateFinale(HidValue, IDcontrol1, IDcontrol2,Affichage) {
        if (HidValue > 180) {
            let Resu1 = 182;
            Rotate1(A, Resu1, IDcontrol1);
            let Resu2 = HidValue - 179;
            setTimeout(function () { Rotate2(B, Resu2, IDcontrol2); },544);
        /*    Rotate2(B, Resu2, IDcontrol2);*/
        if(HidValue>0){
            Affichage.textContent=Math.round((HidValue/360)*100) +" %";
        }else{
            Affichage.textContent="0%";
        }
        
        }
        else {
            Rotate1(A, HidValue, IDcontrol1);
            let Resu3 = 0;
            Rotate2(A, Resu3, IDcontrol2);
           if(HidValue>0){
            Affichage.textContent=Math.round((HidValue/360)*100) +" %";
        }else{
            Affichage.textContent="0%";
        }
        }
    }

 if(document.getElementById('P1')){
 rotateFinale(V1, Valide2, Valide1,V2);
}
if (document.getElementById('P2')) {
   rotateFinale(VN1, ValideN2, ValideN1,VN2);
}
if (document.getElementById('PA1')) {
   rotateFinale(VA1, ValideA2, ValideA1,VA2);
}






















