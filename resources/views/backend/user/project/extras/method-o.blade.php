<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        <span>{{ getFormType($form->type) }}</span>
{{--                        <a href="{{ url('metodo') }}" class="close text-white pull-right" style="top:0" aria-hidden="true"><i class="fa fa-edit"></i></a>--}}
                    </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body">
    <div class="card mb-0 mt-0 pb-0 pt-0">
        <div class="card-body">
            <div id="form_data" hidden>
                <pre>{{ $form->form }}</pre>
            </div>
            <div id="form_data_div">
            </div>
        </div>
    </div>
</div>

<div class="modal-footer mb-0 mt-0 pb-0 pt-0">
    <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">
        Close
    </button>
</div>
