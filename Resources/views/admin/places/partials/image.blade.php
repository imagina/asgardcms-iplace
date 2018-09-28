<div id="image">
    <div class="bgimg-profile">

        @if(isset($profile->options->mainimage)&&!empty($profile->options->mainimage))
            <img id="mainImage"
                 class="image profile-user-img img-responsive img-circle"
                 width="100%"
                 src="{{url($profile->options->mainimage)}}?v={{$profile->updated_at}}"/>
        @else
            <img id="mainImage"
                 class="image profile-user-img img-responsive img-circle"
                 width="100%"
                 src="{{url('modules/iprofile/img/default.jpg')}}"/>
        @endif
    </div>
    <div class="btn-group bt-upload">
        <label class="btn btn-primary btn-file">
            <i class="fa fa-picture-o"></i> {{trans('iprofile::profiles.form.select photo')}}
            <input
                    type="file" accept="image/*" id="mainimage"
                    name="mainimage"
                    value="mainimage"
                    class="form-control" style="display:none;">

        </label>
    </div>
</div>

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#image').each(function (index) {
                // Find DOM elements under this form-group element
                var $mainImage = $(this).find('#mainImage');
                var $uploadImage = $(this).find("#mainimage");
                var $hiddenImage = $(this).find("#hiddenImage");
                //var $remove = $(this).find("#remove")
                // Options either global for all image type fields, or use 'data-*' elements for options passed in via the CRUD controller
                var options = {
                    viewMode: 2,
                    checkOrientation: false,
                    autoCropArea: 1,
                    responsive: true,
                    preview: $(this).attr('data-preview'),
                    aspectRatio: $(this).attr('data-aspectRatio')
                };


                // Hide 'Remove' button if there is no image saved
                if (!$mainImage.attr('src')) {
                    //$remove.hide();
                }
                // Initialise hidden form input in case we submit with no change
                //$.val($mainImage.attr('src'));

                // Only initialize cropper plugin if crop is set to true

                $uploadImage.change(function () {
                    var fileReader = new FileReader(),
                        files = this.files,
                        file;

                    if (!files.length) {
                        return;
                    }
                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $uploadImage.val("");
                            $mainImage.attr('src', this.result);
                            $hiddenImage.val(this.result);
                            $('#hiddenImage').val(this.result);

                        };
                    } else {
                        alert("Por favor seleccione una imagen.");
                    }
                });

            });
        });
    </script>
@endpush