function changeImages(vol) {
  const volume = Math.round(vol);
  array = getJSONStream()
  imgspath = ["images/" + array["expression"] + "1.png", "images/" + array["expression"] + "2.png"]
  if (volume >= 1){
    document.getElementById("character").src=imgspath[1];
  }
  else if(document.getElementById("character").src != "images/ender1.png") {
    document.getElementById("character").src=imgspath[0];
  }
}
/** Declare a context for AudioContext object */
let audioContext

/**
 * This method updates leds
 * depending the volume detected
 * 
 * @param {Float} vol value of volume detected from microphone

/**
 * Method used to create a comunication between
 * AudioWorkletNode, Microphone and AudioWorkletProcessor
 * 
 * @param {MediaStream} stream If user grant access to microphone, this gives you
 * a MediaStream object necessary in this implementation
 */

async function fetchMicrophoneStream(){
  try {
    if (navigator.mediaDevices) {
      console.log("getUserMedia supported.");
      navigator.mediaDevices
        .getUserMedia({ audio: true, video: false })
        .then(async (stream) => {
          audioContext = new AudioContext()
          await audioContext.audioWorklet.addModule('js/vumeter-processor.js')
          let microphone = audioContext.createMediaStreamSource(stream)

          const node = new AudioWorkletNode(audioContext, 'vumeter')
          node.port.onmessage  = event => {
              let _volume = 0
              let _sensibility = 4
              if (event.data.volume)
                  _volume = event.data.volume;
              changeImages((_volume * 100) / _sensibility)
          }
          microphone.connect(node).connect(audioContext.destination)
        })
        .catch((err) => {
          console.log(`The following gUM error occurred: ${err}`);
        });
    } 
  } catch(e) {
      alert(e)
  }
}

fetchMicrophoneStream()
