//エラーメッセージの表示
function showErrMsg(target) {
  target.fadeIn();
  setTimeout(function(){
    target.fadeOut();
  }, 3000);
}

//苗字30文字以上エラー
$("#last_name").on("input change", function(){
  if($(this).val().length > 30){
    showErrMsg($("#error-last_name__length"));
  }
});

//苗字nullエラー
$("#last_name").blur("input", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-last_name__null"));
  }
});

//名前30文字以上エラー
$("#first_name").on("input change", function(){
  if($(this).val().length > 30){
    showErrMsg($("#error-first_name__length"));
  }
});

//名前nullエラー
$("#first_name").blur("input", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-first_name__null"));
  }
});

//メール null_or_not-email エラー
$("#email").blur("input", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-email__null"));
  } else if (!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
    showErrMsg($("#error-email__not-email"));
  }
});

//郵便番号 null_or_not-postcode エラー
$("#postcode").blur("input", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-postcode__null"));
  } else if (!$(this).val().match(/^\d{3}-?\d{4}$/)) {
    showErrMsg($("#error-postcode__not-postcode"));
  }
});

//住所nullエラー
$("#address").blur("input", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-address__null"));
  }
});

//ご意見nullエラー
$("#opinion").blur("textarea", function(){
  if($(this).val().length <= 0){
    showErrMsg($("#error-opinion__null"));
  } else if($(this).val().length > 120){
    showErrMsg($("#error-opinion__length"));
  }
});

