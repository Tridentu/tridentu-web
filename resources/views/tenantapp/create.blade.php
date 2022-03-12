<x-layout>
    <x-slot:extrahead>

    </x-slot:extrahead>
    <x-slot:title>
        Create new Application
    </x-slot:title>
    <x-slot:navbar>

    </x-slot:navbar>
    <x-slot:sidebar>

    </x-slot:sidebar>
    <x-slot:extrascript>
    </x-slot:extrascript>
    <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <form action="{{ route('tenantmeta:create') }}" method="post">
                        @csrf
                        <div class="card card-success card-outline">
                            <div class="card-header box-outline">
                                <h3 class="card-title">New Application</h3>
                            </div>
                            <div class="card-body box-outline">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="id" placeholder="Application id (must be unique)">
                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="text" class="form-control" name="title" placeholder="Application title">
                                    </div>
                                    <div class="input-group mt-2">
                                        <select class="custom-select" name="application">
                                            <option selected value="wordpress">Wordpress</option>
                                            <option value="drupal">Drupal</option>
                                            <option value="mediawiki">MediaWiki</option>
                                            <option value="phpbb">phpBB</option>

                                        </select>
                                        <div class="input-group-append">
                                            <p class="input-group-text">Application to Install</p>
                                        </div>
                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="password" class="form-control" name="password" placeholder="Application password">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Create App</button>
                                </div>
                            </div>
                        </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</x-layout>
