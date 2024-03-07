// alert("cc"):;
// var Items=document.querySelectorAll('.nav-item');
// for (var i = 0; i < Items.length; i++) {
//     if(i==3){
//         continue
//     }
//     Items[i].addEventListener("click",function(event){
//         event.preventDefault();
//        this.classList.add("active");

//     })
// }
 var CommandeV=parseInt(document.getElementById("CommandeV").textContent); 
 var CommandeNV=parseInt(document.getElementById("CommandeNV").textContent); 
 var CommandeA=parseInt(document.getElementById("CommandeA").textContent);
  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Valide',     CommandeV],
          

          ['Non Valide',CommandeNV],
          ['Attend',  CommandeA]
          
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

//  var CourbeV=document.getElementById("CourbeV"); 
//  var CourbeNV=document.getElementById("CourbeNV");
//  var CourbeA=document.getElementById("CourbeA");
//  function Courbe(Commande,Courbe){
//      $(Courbe).css("transition","all 2s");
//       $(Courbe).css("height",Commande+"%"); 
//  }
// Courbe(CommandeV+1,CourbeV);
// Courbe(CommandeNV,CourbeNV);
// Courbe(CommandeA,CourbeA);