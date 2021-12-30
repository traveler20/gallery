<?php
//////////////////////////////////////////////////
//カスタム投稿タイプ・タクソノミー用パーツインクルード
//////////////////////////////////////////////////
require_once locate_template('inc/custom_post_taxonomy/setting.php');      // カスタム投稿タイプ・タクソノミーのセッティング用ファイル
require_once locate_template('inc/custom_post_taxonomy/post.php');         // カスタム投稿タイプ追加用ファイル
require_once locate_template('inc/custom_post_taxonomy/taxonomy.php');     // カスタムタクソノミー追加用ファイル
require_once locate_template('inc/custom_post_taxonomy/storage_views.php');// カスタムタクソノミーへフロントからアクセス数保存用ファイル(投稿・タグ管理)
require_once locate_template('inc/custom_post_taxonomy/storage_click.php');// カスタムタクソノミーへフロントからクリック数保存用ファイル(タグ管理)
