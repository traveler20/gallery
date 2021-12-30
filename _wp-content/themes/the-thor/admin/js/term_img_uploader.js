jQuery(document).ready(function($){
    var custom_uploader;
    /* 画像選択ボタンがクリックされた場合の処理。*/
    $('#upload_img_button').click(function(e) {
        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media({
            title: '画像を選択',
 
            library: {
                type: 'image'
            },
 
            button: {
                text: '画像を選択'
            },
            multiple: false // falseにすると画像を1つしか選択できなくなる
        });
        custom_uploader.on('select', function() {
            var images = custom_uploader.state().get('selection');
            var date = new Date().getTime();
            images.each(function(file){
                $('#term_meta_img').val(file.toJSON().url);
				$('#term_preview_img').attr('src', file.toJSON().url);

            });
        });
        custom_uploader.open();
    });
	

    
});