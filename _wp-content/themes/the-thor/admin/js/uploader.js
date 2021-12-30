jQuery(document).ready(function ($) {
	// カウントアップでオリジナルIDにする
    $('.input__img').each(function(i){
        $(this).attr('id','uploade' + (i+1) + '_url');
    });
	$('.add_upload_media').each(function(i){
        $(this).attr('data-targetId','uploade' + (i+1));
    });
	$('.remove_upload_media').each(function(i){
        $(this).attr('data-targetId','uploade' + (i+1));
    });
	$('.previewBox').each(function(i){
        $(this).attr('id','uploade' + (i+1) + '_preview');
    });
	$('.menuBuilderTable__tbody').on('click', '.button-add', function(){
		$('.input__imgadd').each(function(i){
			$(this).attr('id','uploadeadd' + (i+1) + '_url');
		});
		$('.add_upload_mediaadd').each(function(i){
			$(this).attr('data-targetId','uploadeadd' + (i+1));
		});
		$('.remove_upload_mediaadd').each(function(i){
			$(this).attr('data-targetId','uploadeadd' + (i+1));
		});
		$('.previewBoxadd').each(function(i){
			$(this).attr('id','uploadeadd' + (i+1) + '_preview');
		});
	});

});



jQuery(document).ready(function () {
 
    function buildMedia(self)
    {
        return wp.media({
            title: self.attr('data-title'),
            library: {type: self.attr('data-library')},
            frame: self.attr('data-frame'),
            button: {text: self.attr('data-button')},
            multiple: self.attr('data-multiple')
        });
    }

 
    var setMedia = [];
    jQuery(document).on("click", ".add_upload_media", function (event) {
        event.preventDefault();
 
        var self = jQuery(this);
        var targetId = self.attr('data-targetId');
 
        // キャッシュを表示する
        if (setMedia[targetId]) {
            setMedia[targetId].open();
            return;
        }
 
        // ビルド
        setMedia[targetId] = buildMedia(self);
 
        //ファイル選択時の動作
        setMedia[targetId].on('select', function() {
            var media = setMedia[targetId].state().get('selection').first().toJSON();
            jQuery('#' + targetId +  '_url').val(media.url);
            jQuery('#' + targetId +  '_id').val(media.id);
            jQuery('#' + targetId +  '_text').text(media.url);
 
            // プレビュー画像を表示したい場合
            if(self.attr('data-preview') == 'true'){
                var img = jQuery('<img style="width:100px">').attr('src', media.url);
                jQuery('#' + targetId +  '_preview').html(img);
            }
        });
 
        //モーダルを展開
        setMedia[targetId].open();
    });
	
	// 削除イベント
	jQuery(document).on('click','.remove_upload_media',function(event){
        event.preventDefault();
 
        var self = jQuery(this);
        var targetId = self.attr('data-targetId');
 
            jQuery('#' + targetId +  '_url').val('');
            jQuery('#' + targetId +  '_id').val('');
            jQuery('#' + targetId +  '_text').text('');

    });
 
});