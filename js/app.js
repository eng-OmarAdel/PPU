
// Set constraints for the video stream
var constraints = { video: true, audio: false };

// Define constants
const cameraView = document.querySelector("#camera--view"),
    cameraOutput = document.querySelector("#camera--output"),
    cameraSensor = document.querySelector("#camera--sensor"),
    cameraTrigger = document.querySelector("#camera--trigger");

// Access the device camera and stream to cameraView
function cameraStart() {
    navigator.mediaDevices
        .getUserMedia(constraints)
        .then(function(stream) {
            cameraView.srcObject = stream;
            cameraView.style.transform="scaleX(1)";
            setTimeout(function(){
                  var ctx = cameraSensor.getContext("2d");
                  ctx.rect(101, 10, 100, 31);
                  ctx.strokeStyle = "black";
                  ctx.stroke();
        }, 500);
        })
        .catch(function(error) {
            console.error("Oops. Something is broken.", error);
        });
}
$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}
// Take a picture when cameraTrigger is tapped
cameraTrigger.onclick = function() {
    cameraSensor.width = cameraView.videoWidth;
    cameraSensor.height = cameraView.videoHeight;
    cameraSensor.getContext("2d").drawImage(cameraView, 0, 0);
    if($.urlParam('service')=='electricity'){
      var ctx = cameraSensor.getContext("2d");
      ctx.rect(20, 55, 440, 99);
      ctx.strokeStyle = "black";
      ctx.stroke();
    }

    // cameraOutput.src = cameraSensor.toDataURL("image/webp");
    //Canvas2Image.saveAsJPEG(cameraSensor,cameraSensor.width , cameraSensor.height);

    var image = Canvas2Image.convertToPNG(cameraSensor);
    var image_data = image.getAttribute('src');
    //var image_data = cameraSensor.toDataURL("image/png");

    $.post('server/serving.php',
      {
        'data' : image_data ,
        'service' : $.urlParam('service')
      },function(data,status){
        setTimeout(function(){
          window.location.href = "/";
        }, 500);
      }
    );
    // cameraOutput.classList.add("taken");
    // track.stop();
};

// Start the video stream when the window loads
window.addEventListener("load", cameraStart, false);
