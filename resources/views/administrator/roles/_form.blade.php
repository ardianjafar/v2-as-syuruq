<div class="card-body">
    <div class="form-group">
        <label for="input_role_name" class="font-weight-bold">
            Name
        </label>
        <input id="input_role_name" value="{{ old('name', $role->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" />
        @error('name')
        <span class="invalid-feedback">
       <strong>{{ $message }}</strong>
   </span>
        @enderror
    </div>
    <!-- permission -->
    <div class="form-group">
        <label for="input_role_permission" class="font-weight-bold">
            Permission
        </label>
        <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror" id="input_role_permission">
            <div class="row">
                <!-- list manage name:start -->
                @foreach ($authorities as $manageName => $permissions)
                    <ul class="list-group mx-1">
                        <li class="list-group-item bg-dark text-white">
                            Manage {{ trans("permissions.{$manageName}") }}
                        </li>
                        @foreach ($permissions as $permission)
                            <li class="list-group-item">
                                <div class="form-check">
                                    @if (old('permissions'))
                                        <input id="{{ $permission }}" class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission }}"
                                            {{ in_array($permission,old('permissions')) ? "checked" : null }}>
                                    @else
                                        <input id="{{ $permission }}" class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission }}">
                                    @endif

                                    <label for="{{ $permission }}" class="form-check-label">
                                        {{ trans("permissions.{$permission}") }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                        <!-- list permission:end -->
                    </ul>
                    <!-- list manage name:end  -->
                @endforeach
            </div>
        </div>
        @error('permissions')
        <span class="invalid-feedback">
       <strong>{{ $message }}</strong>
   </span>
        @enderror
    </div>
</div>
