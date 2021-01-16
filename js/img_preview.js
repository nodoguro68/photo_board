'use strict';

window.addEventListener('DOMContentLoaded',function(){
    
    const imgFile = document.getElementById('imgFile');
    const preview = document.getElementById('preview');

    imgFile.addEventListener('change',function(e){
        // 1枚だけ表示する
        var file = e.target.files[0];

        // ファイルのブラウザ上でのURLを取得する
        var blobUrl = window.URL.createObjectURL(file);
        preview.src = blobUrl;
        preview.classList.add('display-preview');
    });


});