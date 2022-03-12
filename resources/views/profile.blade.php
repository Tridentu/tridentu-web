<x-layout>
    <x-slot:extrahead>

    </x-slot:extrahead>
    <x-slot:title>
        My Profile
    </x-slot:title>
    <x-slot:navbar>

    </x-slot:navbar>
    <x-slot:sidebar>

    </x-slot:sidebar>
   
    <div class="content">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-outline">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}">
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <x-layout:extrascript>
    </x-layout:extrascript>
</x-layout>
