function start() {
    // Initializes the client with the API key and the Translate API.
    gapi.client.init({
      'apiKey': 'AIzaSyAB8xfQcZeTRIY30eQGPZt61jCsppkhvxc',
      'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
    }).then(function() {
      // Executes an API request, and returns a Promise.
      // The method name `language.translations.list` comes from the API discovery.
      return gapi.client.youtube.search.list({
        q: 'cats',
        part: 'snippet',
      });
    }).then(function(response) {
      //console.log(response);
      console.log(response);
    }, function(reason) {
      console.log('Error: ' + reason.result.error.message);
    });
};
  // Loads the JavaScript client library and invokes `start` afterwards.
  gapi.load('client', start);
  
  
// Search for a specified string.
function search() {
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet',
    maxResults: 10
  });
  request.execute(function(response) {
    console.log(response)
    var playlistItems = response.result.items;
    if (playlistItems) {
      $.each(playlistItems, function(index, item) {
        displayResult(item);
      });
    } else {
      $('#example').html('Sorry you have no uploaded videos');
    }
  });
}

function agregar_categoria(){
  var titulo_categoria = $('#titulo_categoria').val();
  if(($('#' + titulo_categoria).val())==""){
    alert('La categoria ya existe');
  }else{
    $('#seccion_resultados').append('<div id=' + titulo_categoria + ' class="categoria" style="width:100%"></div>'); 
  }
}

function displayResult(item){
    var videoId = item.id.videoId;
    var linkVideo = 'https://www.youtube.com//embed/'+ videoId
    var cuadro_video = ''
    cuadro_video = cuadro_video + '<div class="cuadro_video">' + '<iframe src="' + linkVideo + '"></iframe>' + '<button id="' + videoId + '">Agregar Video</button></div>'
    $('#example').append(cuadro_video);
  }

function agregar_video_categoria(idVideo){
  var linkVideoCategoria = 'https://www.youtube.com//embed/'+ idVideo
  $('#' + $('#titulo_categoria').val()).append('<iframe src="' + linkVideoCategoria + '"></iframe>');
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}