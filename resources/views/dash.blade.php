

<x-layout>
    <x-slot:title>
    @if($resultType) Search Results @else Dashboard @endif
    </x-slot:title>
    <x-slot:extrahead>

    </x-slot:extrahead>
    <x-slot:navbar>

    </x-slot:navbar>
    <x-slot:sidebar>

    </x-slot:sidebar>
    @if($resultType)
        
        <div class="container-fluid">
            <div class="row">
              <div class="col-mb-2">
                @if($resultType == 'user')
                    <h3 class="m-0">Users</h3>
                    @if($results->count() > 0)

                    <div class="list-group">

                        @foreach($results as $user)
                            <a class="list-group-item list-group-item-action" href="#" >{{ $user->name }}</a>
                        @endforeach

                    </div>
                    @else
                        <p>No results found.</p>
                    @endif
                @elseif($resultType == 'role')
                    <h3 class="m-0">Roles</h3>
                    @if($results->count() > 0)

                    <div class="list-group">
                        @foreach($results as $role)
                            <a class="list-group-item list-group-item-action" href="{{ route('laratrust.roles.show', $role->getKey()) }}" >{{ $role->display_name }}</a>
                        @endforeach
                    </div>
                    @else
                        <p>No results found.</p>
                    @endif
                 @elseif($resultType == 'group')
                    <h3 class="m-0">Groups</h3>
                    @if($results->count() > 0)

                    <div class="list-group">
                        @foreach($results as $group)
                            <a class="list-group-item list-group-item-action" href="#" >{{ $group->display_name }}</a>
                        @endforeach
                    </div>
                    @else
                        <p>No results found.</p>
                    @endif
                @endif
            </div>
            </div>  
        </div>
    @else
    
    @endif
    
</x-layout>
