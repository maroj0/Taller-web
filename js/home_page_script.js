$(document).ready(function () {
    $('#example').DataTable();
});

function start() {
    // Initializes the client with the API key and the Translate API.
    gapi.client.init({
      'apiKey': 'AIzaSyAsGZso29QPAEVLl6WRXo_uFn_OVmDg2q0',
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
    maxResults: 40
  });
  request.execute(function(response) {
    console.log(response)
    var playlistItems = response.result.items;
    if (playlistItems) {
      contador = 0;
      $('#example').append('<tr>');
      $.each(playlistItems, function(index, item) {
        if(contador==4){
          $('#example').append('</tr>');
          $('#example').append('<tr>');
          contador=0
        }
        displayResult(item);
        contador=contador+1;
        agregar_video_categoria(item.id.videoId)
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
    $('#seccion_resultados').append('<h2>'+ titulo_categoria + '</h2>');
    $('#seccion_resultados').append('<table id=' + titulo_categoria + ' class="display" style="width:100%">'); 
  }
}

function displayResult(item) {
    var videoId = item.id.videoId;
    var linkVideo = 'https://www.youtube.com//embed/'+ videoId
    $('#example').append('<iframe src="' + linkVideo + '"></iframe>');
  }
  
function agregar_video_categoria(idVideo){
  if (playlistItems) {
    $.each(playlistItems, function(index, item) {
      if(item.id.videoId == idVideo){
        var linkVideoCategoria = 'https://www.youtube.com//embed/'+ idVideo
        $('#' + $('#titulo_categoria').val()).append('<iframe src="' + linkVideoCategoria + '"></iframe>');
      }
    });
  } else {
    $('#example').html('Sorry you have no uploaded videos');
  }
}