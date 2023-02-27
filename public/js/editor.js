
//商品削除確認
$('#itemDelete').on('click',function(){
  var result = window.confirm('削除して良いですか？');

  if(result ==true){
      window.alert('削除されました。');
      return true;
  }else{
      window.alert('キャンセルしました。');
      return false;
  }
});

//画像イメージプレビュー
$('#inputFile').on('change',function(e){
  var reader = new FileReader();
  reader.onload = function (e) {
      $("#img").attr('src', e.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
});

//画像イメージ名表示
$(document).on('change', ':file', function() {
  var input = $(this),
  numFiles = input.get(0).files ? input.get(0).files.length : 1,
  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.parent().parent().next(':text').val(label);
});

userDelete

//ユーザー削除確認
$('#userDelete').on('click',function(){
  var result = window.confirm('削除して良いですか？');

  if(result ==true){
      window.alert('削除されました。');
      return true;
  }else{
      window.alert('キャンセルしました。');
      return false;
  }
});