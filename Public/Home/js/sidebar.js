function toumingin(test1)
{
	 document.getElementById("huizhang").style.opacity="1";
	 document.getElementById("like").style.opacity="1";
	 document.getElementById("wenke").style.opacity="1";
	 document.getElementById("jiaowu").style.opacity="1";
	 document.getElementById("shijian").style.opacity="1";
	 document.getElementById("zuzhi").style.opacity="1";
	 document.getElementById("bianji").style.opacity="1";
	 document.getElementById("tongchou").style.opacity="1";
	 document.getElementById("more").style.opacity="1";
	
}
function toumingout(test2)
{
	 document.getElementById("huizhang").style.opacity="0.2";
	 document.getElementById("wenke").style.opacity="0.2";
	 document.getElementById("like").style.opacity="0.2";
	 document.getElementById("jiaowu").style.opacity="0.2";
	 document.getElementById("shijian").style.opacity="0.2";
	 document.getElementById("zuzhi").style.opacity="0.2";
	 document.getElementById("bianji").style.opacity="0.2";
	 document.getElementById("tongchou").style.opacity="0.2";
	 document.getElementById("more").style.opacity="0.2";
}
window.onload = function(){
	var intro_height = document.getElementById("intro");   
	var side_height = GetCurrentStyle(intro_height,"height");   
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
