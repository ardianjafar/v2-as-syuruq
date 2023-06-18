<div class="col-md-8">

    <!-- Field Title -->

    <div class="form-group">
        <label for="title">Title</label>
        <input id="input_post_title" value="{{ old('title', $post->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Title" />
        @error('title')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>

    <!-- Field Slug -->

    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="input_post_slug" value="{{ old('slug', $post->slug) }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Otomatis tergenerate"
               readonly />
        @error('slug')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>

    <!-- Field Thumbnail -->
    <div class="form-group mt-2">
        <label for="input_post_thumbnail" class="font-weight-bold">
            Image
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                        class="btn btn-primary" type="button">
                    Choose
                </button>
            </div>
            <input id="input_post_thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror"
                   placeholder="Search Image ..." readonly />
            @error('thumbnail')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <!-- Field Description -->

    <div class="form-group">
        <label for="input_post_description" class="mt-2">Description</label>
        <textarea id="input_post_description" name="description" placeholder="Masukkan Deskripsi" class="form-control @error('description') is-invalid @enderror" rows="3">
            {{ old('description', $post->description) }}
         </textarea>
        @error('description')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>

    <!-- Field Content -->

    <div class="form-group">
        <label for="input_post_content">Content</label>
        <textarea id="input_post_content" name="content" placeholder="Masukkan Content" class="form-control  @error('content') is-invalid @enderror" rows="20">
            {{ old('content', $post->content) }}
         </textarea>
        @error('content')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>

</div>
    <div class="col-md-4">
        <!-- Field Cateogory -->
        <div class="form-group">
            <label for="input_post_category" class="font-weight-bold">
                Cateogry
            </label>
            <div class="form-control @error('category') is-invalid @enderror overflow-auto" style="height: 886px">
                <!-- List category -->

                    @include('administrator.post._category-list',[
                        'cateories' => $categories,
                        'categoryChecked'   => old('category')
                    ])
                <!-- List category -->
            </div>
            @error('category')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-12">
    <!-- tag -->
    <div class="form-group">
        <label for="select_post_tag" class="font-weight-bold">
            Tag
        </label>
        <select id="select_post_tag" name="tag[]" data-placeholder="Select Tag" class="custom-select w-100 @error('tag') is-invalid @enderror"
                multiple>
            @if (old('tag', $post->tags))
                @foreach (old('tag', $post->tags) as $tag)
                    <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                @endforeach
            @endif
        </select>
        @error('tag')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <!-- status -->
    <div class="form-group">
        <label for="select_post_status" class="font-weight-bold">
            Status
        </label>
        <select id="select_post_status" name="status" class="custom-select @error('status') is-invalid @enderror">
            @foreach ($statuses as $key => $value)
                <option value="{{ $key }}" {{ old('status', $post->status) == $key ? "selected" : NULL }}>{{ $value }}</option>
            @endforeach
        </select>
        @error('status')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>




