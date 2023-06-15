

function getJSONStream(){
    var filePath = "assets/stream.json"
    var result = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", filePath, false);
    xmlhttp.send(); 
    if (xmlhttp.status==200) {
      result = xmlhttp.responseText;
    }
    var array = JSON.parse(result) 
    return array 
  }

  
try {

  /**
   * @returns {string} OBS Browser plugin version
  */
 window.obsstudio.pluginVersion
 // => 2.17.0
 /**
  * @typedef {number} Level - The level of permissions. 0 for NONE, 1 for READ_OBS (OBS data), 2 for READ_USER (User data), 3 for BASIC, 4 for ADVANCED and 5 for ALL
 */

lastscene = "scene1"
function changeScene(){
  array = getJSONStream();
  scene = array["scene"];
  if (lastscene != scene){
    window.obsstudio.setCurrentScene(scene)
    lastscene = scene;
  }
  }

$(function(){
  setInterval(changeScene, 300);
});
}

catch(e){
  alert(e)
}