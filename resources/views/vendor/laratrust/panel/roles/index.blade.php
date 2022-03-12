<x-layout>

<x-slot:title>
  ACL Editor (Roles)
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
          <a href="{{route('laratrust.roles.create')}}" class="btn btn-primary btn-tool"><i class="fas fa-user"></i>New Role</a>
    </div>
  </div>
  <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th class="th" scope="col">ID</th>
                  <th class="th" scope="col">Display Name</th>
                  <th class="th" scope="col">Internal Name</th>
                  @if(config('laratrust.panel.assign_permissions_to_user'))
                    <th class="th" scope="col"># of Permissions</th>
                  @endif
                  <th class="th" scope="col">Actions</th>
                </thead>
                <tbody class="bg-white">
                  @foreach ($roles as $role)
                  <tr>
                      <td class="text-sm  text-gray-900" scope="col">
                        {{$role->getKey()}}
                      </td>
                      <td class="text-sm text-gray-900">
                         {{$role->display_name}}
                      </td>
                      <td class="text-sm text-gray-900">
                          {{$role->name}}
                      </td>
                      @if(config('laratrust.panel.assign_permissions_to_user'))
                        <td class="text-sm  text-gray-900">
                          {{$role->permissions_count}}
                        </td>
                      @else
                        <td class=" text-sm leading-5 text-gray-900">0</td>
                      @endif
                      <td class="d-flex justify-content-end whitespace-no-wrap text-right border-b text-sm  font-medium">
                      @if (\Laratrust\Helper::roleIsEditable($role))
                         <a href="{{route('laratrust.roles.edit', $role->getKey())}}" class="btn btn-primary ml-2">Edit</a>
                      @else
                         <a href="{{route('laratrust.roles.show', $role->getKey())}}" class="btn btn-primary ml-2">Details</a>
                      @endif
                      <form
                        action="{{route('laratrust.roles.destroy', $role->getKey())}}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete the record?');"
                      >
                        @method('DELETE')
                        @csrf
                        <button
                          type="submit"
                          class="{{\Laratrust\Helper::roleIsDeletable($role) ? 'btn btn-danger' : 'btn btn-danger'}} ml-2"
                          @if(!\Laratrust\Helper::roleIsDeletable($role)) disabled @endif
                        >Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
      </div>
  <div class="card-footer">
     {{ $roles->links('laratrust::panel.pagination') }}
   </div>
</div>
</div>
</x-layout>