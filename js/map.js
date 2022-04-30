var map = L.map('map').setView([-27.36708, -55.89608], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiYWd1c2NhciIsImEiOiJjbDJsZW55dmUwY3hxM2NxaHBianZ4a3h4In0.YSXjC_KHv43XaeT_GlS1-A'
}).addTo(map);

const search = new GeoSearch.GeoSearchControl({
    provider: new GeoSearch.OpenStreetMapProvider(),
  });

  const start = async function(consulta = null) {
    var result = null;
    const provider = new GeoSearch.OpenStreetMapProvider();
    var search = document.getElementById('calle').value;
    if(document.getElementById('altura').value){
      search += ' ' + document.getElementById('altura').value;
    }
    
    search += ', ' + document.getElementById('ciudad').value;
    search += ', ' + document.getElementById('provincia').value;
    search += ', ' + document.getElementById('pais').value;

    if(consulta){
        result = await provider.search({ query: consulta });
     }else{
        result = await provider.search({ query: search });
        console.log(result);
     }
     if(result != null && result.length > 0){      
       var zoom = 0;
       switch(result[0].raw.type.toString()){
         case 'administrative':
           zoom = 12;
           break;
         case 'residential':
           zoom= 17;
           break;
         default:
           console.log(result[0].raw.type.toString());
           zoom= 16;
       }
       if(this.marker){
         this.marker.remove();
       }      
       this.map.setView([result[0].y,result[0].x], zoom);     
       this.marker = L.marker([result[0].y,result[0].x],{title:result[0].label}).addTo(map);      
       document.getElementById('lat').value = result[0].y;
       document.getElementById('long').value = result[0].x;
    }
}

function buscarUbicacion(){
    start();
}

