
<div class="modal" id="public_forms" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Public Forms</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table table-striped table-bordered table-hover tables">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($public_forms as $form)
                                    @foreach($form['attachments'] as $attachment)
                                    @php
                                        if($attachment['type'] == 'pdf_copy')
                                        {
                                            $attachment_final = $attachment['attachment'];
                                        }
                                    @endphp
                                    @endforeach
                                    <tr>
                                        <td><a href='{{"https://edms.wsystem.online/".$attachment_final}}' target='_blank'>{{$form['title']}}</a></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>