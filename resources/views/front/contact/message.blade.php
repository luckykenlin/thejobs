<div class="modal fade" id="modal-contact" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">Send message</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="subject" class="control-label">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" required>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Message</label>
                    <textarea class="form-control" name="message" id="message-text" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
                <button type="button" id="message-submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>