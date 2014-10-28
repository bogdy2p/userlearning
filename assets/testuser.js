// thenewboston.com training.
var xmlHttp = createXmlHttpRequestObject();
//alert("Function process has been run From the Testuser.js!");
 function process(){

    if(xmlHttp.readyState==0 || xmlHttp.readyState==4 ){
        var name = encodeURIComponent(document.getElementById("name").value);
        xmlHttp.open("POST","create_user.php?name="+name,true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send();
    }else{
        setTimeout('process()',1000);
    }
 }

 function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            var message = xmlDocumentElement.firstChild.data;
            document.getElementById("name").InnerHTML = message;
        }
    }
 }


 function createXmlHttpRequestObject(){
    var xmlHttp;
    if(window.ActiveXObject){
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp = false;
        }
    }else{
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){
            xmlHttp = false;
        }
    }
    if(!xmlHttp)
        alert("cant create that object !.... grr");
    else
        return xmlHttp;
 }