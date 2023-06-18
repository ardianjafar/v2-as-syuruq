<div>
    <div class="form-group">
        <label for="input_tag_title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="input_tag_title" name="title"  value="{{ old('title', $tags->title) }}" placeholder="Enter title">
{{--        <small id="title" class="form-text text-muted">Slug Akan otomatis ke generate dari title yang di masukkan</small>--}}
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="input_tag_slug">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $tags->slug) }}" name="slug" id="input_tag_slug" placeholder="Auto generated" readonly>
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }
            /*
                Event -> slug
            */
            $("#input_tag_title").change(function(event) {
                $("#input_tag_slug").val(generateSlug(event.target.value))
            });
        });


    </script>
@endpush
