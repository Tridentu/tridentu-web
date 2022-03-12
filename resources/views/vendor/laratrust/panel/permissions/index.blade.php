<x-layout>
<x-slot:title>
  ACL Editor (Permissions)
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
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Role Assignment</h3>
    <div class="card-tools">
    @if (config('laratrust.panel.create_permissions'))
      <a href="{{route('laratrust.permissions.create')}}" class="btn btn-primary btn-tool"><i class="fas fa-user"></i>New Permission</a>
      @endif
    </div>
  </div>
  <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th class="th" scope="col">ID</th>
                  <th class="th" scope="col">Name/Code:</th>
                  <th class="th" scope="col">Display Name</th>
                  <th class="th" scope="col">Description</th>
                  <th class="th" scope="col">Actions</th>
                </thead>
                <tbody class="bg-white">
                  @foreach ($permissions as $permission)
                    <tr>
                      <td class="td text-sm leading-5 text-gray-900" scope="col">
                        {{$permission->getKey()}}
                      </td>
                      <td class="td text-sm leading-5 text-gray-900">
                        {{$permission->name}}
                      </td>
                      <td class="td text-sm leading-5 text-gray-900">
                        {{$permission->display_name}}
                      </td>
                      <td class="td text-sm leading-5 text-gray-900">
                        {{$permission->description}}
                      </td>
                      <td>
                        <a href="{{route('laratrust.permissions.edit', $permission->getKey())}}" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
      </div>
  <div class="card-footer">
  {{ $permissions->links('laratrust::panel.pagination') }}
   </div>
</div>
</div>
</x-layout>