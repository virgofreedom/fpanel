

	<textarea cols="10" id="editor2" name="editor2" rows="10" >
	</textarea>

	<script>
		CKEDITOR.replace( 'editor2', {
			
            filebrowserBrowseUrl: '<?=VIRTUAL_PATH?>ckeditor/plugins/imageuploader/imgbrowser.php',
		} );
        
	</script>
