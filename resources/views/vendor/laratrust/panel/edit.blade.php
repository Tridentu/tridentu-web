<x-layout>

<x-slot:title>
  {{ $model ? "Edit {$type}" : "New {$type}" }}
</x-slot:title>
<x-slot:extrahead>
</x-slot:extrahead>
<x-slot:navbar>
  <li class="nav-item">
    <a href="{{config('laratrust.panel.go_back_route')}}" class="nav-link">← Go Back</a>
  </li>
  <li class="nav-item">
  <a href="{{ route('laratrust.roles-assignment.index') }}"
     class="ml-4 {{ request()->is('*roles-assigment*') ? 'nav-link active' : 'nav-link' }}"
              >
                Roles & Permissions Assignment
              </a>
  </li>
  <li class="nav-item">
        <a
            href="{{route('laratrust.roles.index')}}"
            class="ml-4 {{ request()->is('*roles') ? 'nav-link active' : 'nav-link' }}"
           >
            Roles
          </a>
  </li>
  <li class="nav-item">
      <a
          href="{{ route('laratrust.permissions.index') }}"
          class="ml-4 {{ request()->is('*permissions*') ? 'nav-link active' : 'nav-link' }}"
        >
        Permissions
      </a>
</li>
</x-slot:navbar>
<x-slot:sidebar>

</x-slot:sidebar>  
  <x-slot:extrascript>
    </x-slot:extrascript>
<form
        x-data="laratrustForm()"
        x-init="{!! $model ? '' : '$watch(\'displayName\', value => onChangeDisplayName(value))'!!}"
        method="POST"
        action="{{$model ? route("laratrust.{$type}s.update", $model->getKey()) : route("laratrust.{$type}s.store")}}"
      >
      @csrf
      @if ($model)
          @method('PUT')
      @endif
<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{ $model ? "Edit {$type}" : "New {$type}" }}</h3>
  </div>
  <div class="card-body">
      <div class="input-group">
          <input
              class="form-control"
              name="name"
              placeholder="Name/Code"
              :value="name"
              readonly
              autocomplete="off"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message}} </div>
            @enderror
      </div>
      <div class="input-group mt-2">
          <input
              class="form-control"
              name="display_name"
              placeholder="Display Name"
              x-model="displayName"
              :value="name"
              autocomplete="off"
            >
      </div>
    <div class="input-group mt-2">
          <textarea
              class="form-control"
              name="description"
              placeholder="Some description for the {{$type}}"
              rows="3"
            >{{ $model->description ?? old('description') }}</textarea>
    </div>
    <h3 class="mt-2">Permissions</h3>
    @if($type == 'role')
          <div class="flex flex-wrap justify-start mb-4">
            @foreach ($permissions as $permission)
              <div class="icheck-primary">
                <input
                        type="checkbox"
                        class="form-check"
                        name="permissions[]"
                        id="perm-{{ $permission->name }}"
                        value="{{$permission->getKey()}}"
                        {!! $permission->assigned ? 'checked' : '' !!}
                      >
                      <label for="perm-{{ $permission->name }}">{{$permission->display_name ?? $permission->name}}</label>
              </div>
            @endforeach
          </div>
    @endif
</div>
  <div class="card-footer d-flex justify-content-end">
          <a
            href="{{route("laratrust.{$type}s.index")}}"
            class="btn btn-danger mr-2"
          >
            Cancel
          </a>
          <button class="btn btn-primary" type="submit">Save</button>
  </div>
</div>
</form>
  <script>
    window.laratrustForm =  function() {
      return {
        displayName: '{{ $model->display_name ?? old('display_name') }}',
        name: '{{ $model->name ?? old('name') }}',
        toKebabCase(str) {
          return str &&
            str
              .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
              .map(x => x.toLowerCase())
              .join('-')
              .trim();
        },
        onChangeDisplayName(value) {
          this.name = this.toKebabCase(value);
        }
      }
    }
  </script>
</x-layout>