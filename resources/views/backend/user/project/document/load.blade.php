<div class="row">
    @foreach($documents as $document)
        <div class="col-md-4" id="document_{{ $document->id }}">
            <div class="shadow card">
                <div class="text-center card-body text-danger">
                    {!! getIcon($document->type) !!}
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <p class="mb-0 doc_name">{{ ($document->name) ? $document->name : '' }}</p>
                        <div class="dropdown ">
                            <button class="bg-transparent text-dark hover-0 btn p-1 pr-2 pl-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fas fa-ellipsis-v"> </i>
                                <div class="ripple-container"></div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{Storage::disk('public')->exists($document->file) ? Storage::disk('public')->url($document->file) : '#' }}" target="_blank">{{ __('header.view_details') }}</a>
                                <a class="dropdown-item important_document" data-id="{{ $document->id }}" href="javascript:;">
                                    {{ ($document->important == 0) ? __('header.mark_important') : __('unmark_important')}}
                                </a>
                                <a class="dropdown-item" href="{{Storage::disk('public')->exists($document->file) ? Storage::disk('public')->url($document->file) : '#'}}" download target="_blank">{{ __('header.download') }}</a>
                                <a class="dropdown-item delete_document" data-id="{{ $document->id }}" href="javascript:;">
                                    {{ __('header.delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
