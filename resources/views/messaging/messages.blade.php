<x-layout>

<x-slot:title>
  Inbox
</x-slot:title>
<x-slot:extrahead>
</x-slot:extrahead>
<x-slot:navbar>
  
</x-slot:navbar>
<x-slot:sidebar>

</x-slot:sidebar>

<div class="content">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="search" class="form-control" placeholder="Search Messages...">
                        <div class="input-group-append">
                            <div class="btn btn-danger">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-sync-alt"></i>
                    </button>

                    <div class="float-right">
                        {{ $messages->firstItem() ?? 0 }}-{{ $messages->lastItem() ?? 0 }}/{{ $messages->total() }}
                        <div class="btn-group">
                             <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default btn-sm {{ $messages->onFirstPage() ?  'disabled' : '' }}">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                                <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default btn-sm {{ $messages->onLastPage() ?  'disabled' : '' }}">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @if($messages->count() > 0)
                                <?php $indexCount = 0 ?>
                                @foreach($messages as $message)
                                    <?php $indexCount += 1 ?>
                                    <tr>
                                        <td>
                                            <div class="icheck-danger">
                                                <input type="checkbox" class="form-control" id="check{{ $indexCount }}">
                                                <label for="check{{ $indexCount }}"></label>
                                            </div>
                                        </td>
                                        <td class="mailbox-star">
                                            <a href="#">
                                                <i class="fas fa-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="mailbox-name">
                                            <a href="#">{{ $message->user()->name }}</a>
                                        </td>
                                        <td class="mailbox-subject">
                                            <a href="#" class="text-decoration-none">
                                                <strong>{{ $message->subject }}</strong>

                                            </a>
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">{{ $message->created_at->diffForHumans()}}
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-0">
                 <div class="mailbox-controls">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-sync-alt"></i>
                    </button>

                    <div class="float-right">
                        {{ $messages->firstItem() ?? 0 }}-{{ $messages->lastItem() ?? 0 }}/{{ $messages->total() }}
                        <div class="btn-group">
                             <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default btn-sm {{ $messages->onFirstPage() ?  'disabled' : '' }}">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                                <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default btn-sm {{ $messages->onLastPage() ?  'disabled' : '' }}">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
</div>
<x-slot:extrascript>
    </x-slot:extrascript>
</x-layout>