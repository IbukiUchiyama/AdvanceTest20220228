$(function(){
    $(".form-item-input__date").blur(function(){
        charactersChange($(this));
    });


    charactersChange = function(ele){
        var val = ele.val();
        var han = val.replace(/[０-９．]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)})
          .replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');

        if(val.match(/[０-９．]/g)){
            $(ele).val(han);
        }
    }
});