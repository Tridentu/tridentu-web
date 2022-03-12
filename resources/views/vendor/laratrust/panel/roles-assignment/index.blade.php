<x-layout>

<x-slot:title>
  ACL Editor (Role Assignment)
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
<div class="content">
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Role Assignment</h3>
    <div class="card-tools">
          
    </div>
  </div>
  <div class="card-body">
      <div
        x-data="{ model: @if($modelKey) '{{$modelKey}}' @else 'initial' @endif }"
        x-init="$watch('model', value => value != 'initial' ? window.location = `?model=${value}` : '')"
      >
          
          <label class="block w-3/12">
            <span class="text-gray-700">User model to assign roles/permissions</span>
            
          </label>
          <select class="form-select block w-full mt-1" x-model="model">
              <option value="initial" disabled selected>Select a user model</option>
              @foreach ($models as $model)
                <option value="{{$model}}">{{ucwords($model)}}</option>
              @endforeach
            </select>
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th class="th" scope="col">ID</th>
                  <th class="th" scope="col">Name</th>
                  <th class="th" scope="col"># of Roles</th>
                  @if(config('laratrust.panel.assign_permissions_to_user'))
                    <th class="th" scope="col"># of Permissions</th>
                  @endif
                  <th class="th" scope="col">Actions</th>
                </thead>
                <tbody class="bg-white">
                  @foreach ($users as $user)
                  <tr>
                      <td class="td text-sm leading-5 text-gray-900" scope="col">
                        {{$user->getKey()}}
                      </td>
                      <td class="td text-sm leading-5 text-gray-900">
                        {{$user->name ?? 'The model doesn\'t have a `name` attribute'}}
                      </td>
                      <td class="td text-sm leading-5 text-gray-900">
                        {{$user->roles_count}}
                      </td>
                      @if(config('laratrust.panel.assign_permissions_to_user'))
                        <td class="td text-sm leading-5 text-gray-900">
                          {{$user->permissions_count}}
                        </td>
                      @else
                        <td class="td text-sm leading-5 text-gray-900">0</td>
                      @endif
                      <td>
                        <a href="{{route('laratrust.roles-assignment.edit', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}"
                          class="btn btn-primary"
                        >Edit</a>
                      </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

  </div>
  <div class="card-footer">
        @if ($modelKey)
          {{ $users->appends(['model' => $modelKey])->links('laratrust::panel.pagination') }}
        @endif
   </div>
</div>
</div>
<x-layout:extrascript>
    </x-layout:extrascript>
</x-layout>