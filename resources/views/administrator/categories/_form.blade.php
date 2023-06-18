<div>
    <div class="form-group">
        <label for="input_category_title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="input_category_title" name="title"  value="{{ old('title', $categories->title) }}" placeholder="Enter title">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="input_category_slug">Slug</label>
        <input type="text"  class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $categories->slug) }}" name="slug" id="input_category_slug" placeholder="Auto generated" readonly>
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="thumbnail"  value="{{ old('thumbnail') }}" id="input_category_thumbnail" required="" @error('thumbnail') is-invalid @enderror" value="{{ old('thumbnail') }}">
        <label class="custom-file-label" for="input_category_thumbnail">Choose file...</label>
        @error('thumbnail')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mt-2 mb-2">
        <label for="" class="mt-1">Category Parent</label>
        <select id="select_category_parent" name="parent_category" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
            @if (old('parent_category'))
                <option value="{{ old('parent_category')->id }}">
                    {{ old('parent->category')->title }}
                </option>
            @endif
        </select>
    </div>
    <div class="mt-2 mb-3">
        <label class="mb-2" for="input_category_description">Description</label>
        <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $categories->description) }}" maxlength="225" rows="3" placeholder="Description here ...">{{ old('description', $categories->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('javascript-internal')
    <script>
        $(function(){
            // generate slug
            function generateSlug(value){
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            /*
                Event -> slug
            */
            $("#input_category_title").change(function(event) {
                $("#input_category_slug").val(generateSlug(event.target.value))
            });


            // select2 parent category
            $('#select_category_parent').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('categories.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            // event -> input title
            $('#input_category_title').change(function() {
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });

            // event -> select parent category
            $('#select_category_parent').change(function() {
                let title = $('#input_category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });

            // event -> thumbnail
            $('#button_category_thumbnail').filemanager('image');
        });
    </script>
@endpush
