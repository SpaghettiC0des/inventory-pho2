<!-- Custom Filter Modal -->
<div class="modal fade" id="customFilterModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form data-bind = "submit : getCustomFilter" action="" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Custom Filter</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="filter-start" class="control-label">Start</label>
                        <input data-bind = "dateTimePicker : filterStart, 
                            dateTimePickerOptions:{format:'YYYY-MM-DD'}" type="text" 
                                class="form-control input-mask" data-mask="0000-00-00 00:00" placeholder = "YYYY-MM-DD hh:mm" required>
                    </div>  
                    <div class="form-group">
                        <label for="filter-start" class="control-label">Start</label>
                        <input data-bind = "dateTimePicker : filterEnd, 
                            dateTimePickerOptions:{format:'YYYY-MM-DD'}" type="text" 
                                class="form-control input-mask" data-mask="0000-00-00 00:00" placeholder = "YYYY-MM-DD hh:mm" required>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Get Data</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>