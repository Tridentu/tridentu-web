<x-layout>

<x-slot:title>
 ACL Editor - Edit {{ $modelKey }}
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
<div class="content">
<form method="post" 
    action="{{route('laratrust.roles-assignment.update', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}"
    >
<div class="card">
  <div class="card-header">
    <h1 class="card-title">Edit {{ $modelKey }}</h1>
  </div>
  <div class="card-body">
    
    @csrf
    @method('PUT')
    <label for="userName"><h5>Name</h5></label>
    <input class="form-control" id="userName" name="name" placeholder="this-will-be-the-code-name" value="{{$user->name ?? 'The model doesn\'t have a `name` attribute'}}" readonly autocomplete="off">
    <h5 class="block mt-4">Roles</h5> 
    @foreach ($roles as $role)
      <div class="icheck-primary">
            <input type="checkbox" id="role-{{ $role->name }}"  @if ($role->assigned && !$role->isRemovable) class="form-check" @else class="form-check" @endif name="roles[]"  value="{{$role->getKey()}}" {!! $role->assigned ? 'checked' : '' !!} {!! $role->assigned && !$role->isRemovable ? 'onclick="return false;"' : '' !!}> 
            <label class="{!! $role->assigned && !$role->isRemovable ? 'text-gray-600' : '' !!}" for="role-{{ $role->name }}">
                {{$role->display_name ?? $role->name}}
            </span>
    </div>
    @endforeach
    @if ($permissions)
          <h5 class="block mt-4">Permissions</h5> 
            @foreach ($permissions as $permission)
              <div class="icheck-primary">

                <input
                  type="checkbox"
                  class="form-check"
                  id="perm-{{ $permission->name }}"
                  name="permissions[]"
                  value="{{$permission->getKey()}}"
                  {!! $permission->assigned ? 'checked' : '' !!}
                >
                <label for="perm-{{ $permission->name }}">{{$permission->display_name ?? $permission->name}}</label>
            </div>
            @endforeach
      @endif
  </div>
  <div class="card-footer">
          <a href="{{route("laratrust.roles-assignment.index", ['model' => $modelKey])}}"
            class="btn btn-danger"
          >
            Cancel
        </a>
        <button class="btn btn-primary" type="submit">Save</button>
  </div>
</div>
</form>
</div>
</x-layout>