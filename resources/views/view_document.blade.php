
<div class="modal" id="view_document{{$document->id}}" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">{{$document->name}}</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <iframe width='100%' height='700px;'  src="{{url($document->url.'?page=hsn#toolbar=0')}}" title="Access"></iframe>
            </div>
        </div>
    </div>
</div>