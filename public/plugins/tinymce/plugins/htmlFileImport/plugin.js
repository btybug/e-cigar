tinymce.PluginManager.add('htmlFileImport', function(editor, url) {
    editor.addButton('htmlFileImport', {
      text: "Import HTML File",
      icon: false,
      onclick: function() {
        if(editor.getContent() == ""){
            editor.showFileDialog();
        }
        else{
          editor.showReplaceContentConfirmDialog();
        }
      }
    });
    editor.showReplaceContentConfirmDialog = function(){  
      eval(editor.dialogConfirmReplaceContentId).Open();
      eval(editor.dialogConfirmReplaceContentId).setzIndex(101);
    }
    editor.showInvalidHtmlFileDialod = function(){
        eval(editor.dialogInvalidHtmlFileId).Open();
        eval(editor.dialogInvalidHtmlFileId).setzIndex(101);
    }
    editor.showFileDialog = function(){
        var fileSelector = document.createElement('input');
        fileSelector.setAttribute('type', 'file');
        fileSelector.style.display = 'none';
        fileSelector.onchange = function(e) { 
          var file = fileSelector.files[0];
          if (file) {
              var reader = new FileReader();
              reader.readAsText(file, "UTF-8");
  
              reader.onload = function (event) {
                  var bodyHtml = event.target.result;
  
                  var bodyOpen = bodyHtml.indexOf('<body');
                  if(bodyOpen == -1)
                      bodyOpen = bodyHtml.indexOf('< body');
  
                  var bodyClose = bodyHtml.indexOf('</body>') + 6;
                  if(bodyClose == -1)
                      bodyClose = bodyHtml.indexOf('</ body>') + 7;
  
                  if(bodyOpen != -1 && bodyClose != -1){
                      bodyHtml = bodyHtml.substring(bodyOpen, bodyClose);
                      var divHtml = document.createElement('div');
                      divHtml.style.display = 'none';
                      divHtml.innerHTML = bodyHtml;
                      editor.setContent(divHtml.innerHTML);
                  }
                  else{
                      editor.showInvalidHtmlFileDialod();
                  }
              }
              reader.onerror = function (evt) {
                  editor.showInvalidHtmlFileDialod();
              }
          }
        };    
        fileSelector.click();
     }
  });