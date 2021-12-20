<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        {{ __('header.work_rules') }} </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar" style="max-height: 75vh;">
    <div class="pl-3 pr-3 pt-2 pb-2">
        <p> {{ __('header.mo_wr_these_are_the_agreements') }} </p>
        @forelse($work_rules as $rule)
            <label> {{ __('header.mo_im_wr_'. $rule->rule) }} </label> <br>
        @empty
            <label> {{ __('header.no_rules_added_yet') }} </label> <br>
        @endforelse
    </div>
</div>
