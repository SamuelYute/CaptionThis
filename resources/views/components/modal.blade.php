<div class="modal animated bounceIn" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:1px">
            <div class="modal-header row" style="height:60px;margin:0px;">
                <div class="modal-title col-md-7 col-xs-10" id="modalLabel"><h4><i class="fa {{$icon}}"></i> {{ $title }}</h4></div>

                <div class="col-md-1 col-md-offset-4 col-xs-2">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>
            </div>
            {{ $slot}}
        </div>
    </div>
</div>
