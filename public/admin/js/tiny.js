var editor_config = {
    selector: "textarea.my-editor",
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
            'body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document
            .getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files';
                url  = '/laravel-filemanager?editor=tinymce5&type=' + type;

            tinymce.activeEditor.windowManager.openUrl({
                url : url,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
    },

    // document_base_url : "https://diendantuyensinh24h.com/",
    // relative_urls : false,
    // remove_script_host : false,
    image_caption: true,
    formats: {
        h2: { block: 'h2', attributes: { id: (Math.random()).toString(32).substr(2,5) }  },
        h3: { block: 'h3', attributes: { id: (Math.random()).toString(32).substr(2,5) }  }
    },
    allow_html_in_named_anchor: true,
    //link_assume_external_targets: 'https',
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote anchor image quicktable',
    quickbars_insert_toolbar: false,
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    fixed_toolbar_container: '#mytoolbar'
};

tinymce.init(editor_config);
