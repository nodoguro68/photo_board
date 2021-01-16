'use strict';

window.addEventListener('DOMContentLoaded',function(){

    // テキストエリアのDOMを取得
    var countText = document.getElementById('comment');
    
    // キーが離れたとき
    countText.addEventListener('keyup',function(){
        // フォームの値の文字数を取得
        var count = this.value.length;

        // カウントの数値のDOMを取得
        var counterNum = document.getElementById('counter');

        // カウントを変更する
        counterNum.innerText = count;

        if(count > 200){
            counterNum.classList.add('err-count');
        }
        
    });




});