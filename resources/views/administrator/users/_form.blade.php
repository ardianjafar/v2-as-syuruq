<div>
    <!--Field Name -->
    <div class="form-group">
        <label for="input_user_name">Name</label>
        <input type="text" class="form-control" id="input_tag_title" name="name"  value="{{ old('title') }}" placeholder="Enter title">
        <small id="title" class="form-text text-muted">Slug Akan otomatis ke generate dari title yang di masukkan</small>
    </div>

    <!--Field Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input id="input_user_email" value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email"
               autocomplete="email" />
        <!-- error message -->
        @error('email')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>

    <!--Field Role -->
    <div class="form-group">
        <label for="select_user_role">Role</label>
        <select id="select_user_role" name="role" data-placeholder="Wewenang" class="custom-select w-100 @error('role') is-invalid @enderror">
            @if (old('role'))
                <option value="{{ old('role')->id }}" selected>
                    {{ old('role')->name }}
                </option>
            @endif
        </select>
        <!-- error message -->
        @error('role')
        <span class="invalid-feedback">
                {{ $message }}
            </span>
        @enderror
    </div>

    <!--Field Password -->
    <div class="form-group">
        <label for="input_user_password" class="font-weight-bold">
            Password
        </label>
        <input id="input_user_password" value="{{ old('password') }}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password"
               autocomplete="new-password" />
        <!-- error message -->
        @error('password')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
        @enderror
    </div>

    <!--Field Password Confirmation -->
    <div class="form-group">
        <label for="input_user_password_confirmation" class="font-weight-bold">
            Password Confirmation
        </label>
        <input id="input_user_password_confirmation" name="password_confirmation" type="password"
               class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Masukkan Konfirmasi password anda" autocomplete="new-password" />
        <!-- error message -->
        @error('password_confirmation')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
        @enderror
    </div>

</div>

@push('javascript-external')
    {{-- Select 2 --}}
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function(){
            // select2 parent category
            $('#select_user_role').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
    </script>
@endpush
