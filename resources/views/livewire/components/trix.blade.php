<div
    wire:ignore
    x-data="{
        disabled: @js($disabled)
    }"
    x-init="() => {
        document.querySelector('trix-editor').editor.element.setAttribute('contentEditable', !disabled)
    }"
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    @vite(['resources/sass/trix-custom.scss'])

    <input id="{{ $trix_id }}" type="hidden" name="content" value="{{ $value }}">
    <trix-editor :class="{'trix__disabled': disabled}" input="{{ $trix_id }}"></trix-editor>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        const trixEditor = document.getElementById("{{ $trix_id }}")
        const mimeTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png", "image/svg+xml"];

        addEventListener("trix-change", function(event) {
            @this.set('value', trixEditor.getAttribute('value'))
        })

        addEventListener("trix-file-accept", function(event) {
            if (! mimeTypes.includes(event.file.type) ) {
                alert(`${event.file.type} file type not allowed.`)
                return event.preventDefault();
            }
        });

        addEventListener("trix-attachment-add", function(event){
            uploadEditorTrixPhotos(event.attachment);
        });

        addEventListener("trix-attachment-remove", function(event){
            @this.removeUploadedFile(event.attachment.attachment.attributes.values.filename);
        });

        const uploadEditorTrixPhotos = (attachment) => {
            @this.upload(
                'photos',
                attachment.file,
                (uploadedURL) => {
                    const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;

                    const trixUploadCompletedListener = function(event) {
                        attachment.setAttributes(event.detail);
                        window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    }

                    window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    @this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
                },
                () => {},
                (event)=> {
                    attachment.setUploadProgress(event.detail.progress);
                },
            )
        }
    </script>
</div>
