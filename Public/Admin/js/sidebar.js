window.onload = function(){
	var photo_height = document.getElementById("photo");   
	var side_height = GetCurrentStyle(photo_height,"height");   
	document.getElementById('sidebar').style.height = side_height;
}
function GetCurrentStyle (obj, prop) {     
    if (obj.currentStyle) {        
        return obj.currentStyle[prop];     
    }      
    else if (window.getComputedStyle) {        
        propprop = prop.replace (/([A-Z])/g, "-$1");           
        propprop = prop.toLowerCase ();        
        return document.defaultView.getComputedStyle (obj,null)[prop];     
    }      
    return null;   
}   
