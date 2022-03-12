<x-layout>

<x-slot:title>
  ACL Editor (Roles - Details)
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
<x-slot:extrascript>
    </x-slot:extrascript>
</x-slot:sidebar>
  <div class="content">
  <div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title">Role Details</h3>
    </div>

    <div class="card-body">
      <div class="row">
        <span class="col-6">Name/Code:</span>
        <span class="col-6">{{$role->name}}</span>
      </div>
      <div class="row">
        <span class="col-6">Display Name:</span>
        <span class="col-6">{{$role->display_name}}</span>
      </div>
      <div class="row">
        <span class="col-6">Description:</span>
        <span class="col-6">{{$role->description}}</span>
      </div>
      <div class="row">
        <span class="col-6">Permissions:</span>
        <div class="col-6">
          @foreach ($role->permissions as $permission)
            <span class="badge badge-primary" >{{$permission->display_name ?? $permission->name}}</span>
          @endforeach
        </div>
      </div>
    </div>    
    <div class="card-footer">
        <a
          href="{{route("laratrust.roles.index")}}"
          class="btn btn-danger"
        >
          Back
      </a>
    </div>
  </div>
</div>
</div>
</x-layout>