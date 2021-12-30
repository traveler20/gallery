<?php
//////////////////////////////////////////////////
//各種データ用ファイル設定
//////////////////////////////////////////////////
$U = 'NONE';if (get_option('fit_bsUserID_set')){$U = get_option('fit_bsUserID_set');}
$D1 = strstr($U,'Id:X');$C1 = 'D_f-tt';$D2 = strstr($U,'FKN-d');$C2 = 'FTHsW';
if(strpos($D1,$C1)!==false){
  if(strpos($D2,$C2)!==false){
    $example_update_checker = new ThemeUpdateChecker('the-thor','https://fit-theme.com/wp-content/themes/fit-theme/upload/thor.json');
  }
}
