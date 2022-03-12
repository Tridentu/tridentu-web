<x-layout>
    <x-slot:extrahead>
        <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.css" integrity="sha512-6QxSiaKfNSQmmqwqpTNyhHErr+Bbm8u8HHSiinMEz0uimy9nu7lc/2NaXJiUJj2y4BApd5vgDjSHyLzC8nP6Ng==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot:extrahead>
    <x-slot:title>
        {{ trans('laravel-filemanager::lfm.title-page') }}
    </x-slot:title>
    <x-slot:navbar>
        <li class="nav-item">
            <a href="#" class="nav-link" >
                 
            </a>
        </li>
        <li class="nav-item">
             
        </li>
        <li class="nav-item">
        </li>
        <li class="nav-item ml-auto px-2">
           
        </li>
    </x-slot:navbar>
    <x-slot:sidebar>

    </x-slot:sidebar>
    <div class="content">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title" id="current_folder"> </h3>
                <div class="card-tools">
                    <a id="loading" class="btn btn-tool"><i class="fas fa-spinner fa-spin"></i><span> Loading</span></a>
                    <a class="btn btn-tool" id="to-previous">
                        <i class="fas fa-arrow-left fa-fw"></i>
                        <span class="d-none d-lg-inline">{{ trans('laravel-filemanager::lfm.nav-back') }}</span>
                    </a>
                    <a class="btn btn-tool d-none" id="multi_selection_toggle">
                        <i class="fa fa-check-double fa-fw"></i>
                        <span class="d-none d-lg-inline">{{ trans('laravel-filemanager::lfm.menu-multiple') }}</span>
                    </a>
                    <a class="navbar-toggler collapsed border-0 px-1 py-2 m-0 btn btn-tool" data-toggle="collapse" data-target="#nav-buttons">
                        <i class="fas fa-cog fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                    <div class="collapse navbar-collapse " id="nav-buttons">
                            <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group mr-2">

                                            <a class="btn btn-primary" data-display="grid">
                                                <i class="fas fa-th-large fa-fw"></i>
                                                <span>{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>
                                            </a>
                                            <a class="btn btn-primary" data-display="list">
                                                <i class="fas fa-list-ul fa-fw"></i>
                                                <span>{{ trans('laravel-filemanager::lfm.nav-list') }}</span>
                                            </a>
                                    </div>
                                    <div class="btn-group">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-sort fa-fw"></i>{{ trans('laravel-filemanager::lfm.nav-sort') }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-5 col-sm-2" id="tree">

                    </div>
                    <div class="col-7 col-sm-10" id="main" >
                            <div class="content">

                            </div>
                            <div id="empty" class="d-none">
                                <i class="far fa-folder-open"></i>
                                {{ trans('laravel-filemanager::lfm.message-empty') }}
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="pagination"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="btn-toolbar d-none" id="actions">
                    <a data-action="open" class="btn btn-secondary" data-multiple="false"><i class="fas fa-folder-open"></i>{{ trans('laravel-filemanager::lfm.btn-open') }}</a>
                    <a data-action="preview"  class="btn btn-secondary" data-multiple="true"><i class="fas fa-images"></i>{{ trans('laravel-filemanager::lfm.menu-view') }}</a>
                    <a data-action="use"  class="btn btn-secondary" data-multiple="true"><i class="fas fa-check"></i>{{ trans('laravel-filemanager::lfm.btn-confirm') }}</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" integrity="sha512-IlZV3863HqEgMeFLVllRjbNOoh8uVj0kgx0aYxgt4rdBABTZCl/h5MfshHD9BrnVs6Rs9yNN7kUQpzhcLkNmHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <x-slot:extrascript>
        <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script> 
        <script>
                var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
                var actions = [
                    {
                        name: 'resize',
                        icon: 'arrows-alt',
                        label: lang['menu-resize'],
                        multiple: false
                    },
                    {
                        name: 'rename',
                        icon: 'edit',
                        label: lang['menu-rename'],
                        multiple: false
                    },

                ];
                var sortings = [
                    {
                        by: 'alphabetic',
                        icon: 'sort-alpha-down',
                        label: lang['nav-sort-alphabetic']
                    },
                    {
                        by: 'time',
                        icon: 'sort-numeric-down',
                        label: lang['nav-sort-time']
                    }
                ];
        </script>
    </x-slot:extrascript>
</x-layout>