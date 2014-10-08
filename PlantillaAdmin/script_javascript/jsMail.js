    var editor;
    function $(id){
        return document.getElementById(id);
    }
    function formato(f){
        editor.execCommand(f, false, null);
    }
    function rev(t)    {
        return t.split("<").join("&lt;").split(">").join("&gt;").split("\"").join("&quot;");
    }
    function insertarEnlace(){
        var u;
        if(!(u=prompt('ingresar url','http://')))return;
        editor.execCommand("CreateLink",false,u);
    }
    function insertarImagen(){
        var u;
        if(!(u=prompt('ingresar url','http://')))return;
        editor.body.focus();
        editor.execCommand("InsertImage",false,u);
    }
    function color(c){
        editor.execCommand("forecolor",false,c);
    }

    function colorFondo(c){
        var h=window.ActiveXObject?'backcolor':'hilitecolor';
        editor.execCommand(h,false,c);
    }
    function inHTML(){
        var u,u2;
        if(!(u=prompt('ingresar html','')))return;
        
            try{
                editor.execCommand("inserthtml",false,u);
            }catch(e){
                try{
                    editor.body.focus();
                    u2=editor.selection.createRange();
                    u2.pasteHTML(u);
                }catch(E){
                    alert('nop');
                }
            }
    }

    function htmlOEditor(e){
        e=e || window.event;
        ob=e.target || e.srcElement
        $('edit').style.display=(ob.value=='html')?'none':'block';
        $('ht').style.display=(ob.value!='html')?'none':'block';
        //Retorna el contenido dentro de "ht" :)
        $('ht').innerHTML=rev(editor.body.innerHTML);
        document.write($('ht').innerHTML);

            
        //Retorna "editor" o "html"
        ob.value=(ob.value=='html')?'editor':'html';
    }
    
    window.onload=function(){
        
        editor=$('edit').contentDocument || $('edit').contentWindow.document;
        editor.designMode='on';
    }