<!-- Add Request Modal -->
<div data-bind = "with : requestVM" class="modal fade" id="addRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form data-bind = "submit : handleSubmit" action="" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Request</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="purchase-date" class="control-label">Date</label>
                            <input data-bind = "dateTimePicker : datetime, 
                                dateTimePickerOptions:{format:'YYYY-MM-DD hh:mm'}" type="text" 
                                    class="form-control input-mask" data-mask="0000-00-00 00:00" placeholder = "YYYY-MM-DD hh:mm" required>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="purchase-status" class="control-label">Status</label>
                            <select data-bind = "value: status" name="purchase-status" id="purchase-status" class="selectpicker">
                                <option value="Received">Received</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <div class="col-md-6">
                            <label for="request-office" class="control-label">Offices</label>
                            <select data-bind="selectPicker: office_id, 
                                 optionsText: 'name',optionsValue:'id', optionsCaption: 'Select Office',
                                    selectPickerOptions: { optionsArray: $parent.dataObjects.allOffices }" 
                                        name="request-office" id="request-office" class="selectpicker" data-live-search="true">
                             </select>   
                        </div> -->
                        <div class="col-md-6">
                            <label for="request-office-budget" class="control-label">Budget</label>
                            <input data-bind = "value: budget" type="number" class="form-control" disabled="">
                        </div>
                    </div>
                    <div data-bind = "style: canAdd">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="request-item" class="control-label">Items</label>
                                <select data-bind="selectPicker: selected_item, 
                                     optionsText: displayText, optionsCaption: 'Select Item',
                                        selectPickerOptions: { optionsArray: $parent.dataObjects.allItems }" 
                                            name="request-item" id="request-item" data-live-search="true">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Cost</th>
                                        <th>Subtotal</th>
                                        <th class="text-center">Remove</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Grand Total (Php)</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th data-bind = "text: grandTotal"></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody data-bind = "foreach: items">
                                    <tr>
                                        <td data-bind = "text: code"></td>
                                        <td data-bind = "text: name"></td>
                                        <td>
                                            <div class="fg-line">
                                                <input data-bind = "textInput: quantity" type="number" min="1" step="1" class="form-control text-center">    
                                            </div>
                                        </td>
                                        <td data-bind = "text: cost"></td>
                                        <td data-bind = "text: subTotal"></td>
                                        <td class="text-center">
                                            <button data-bind = "click: $parent.removeItem" class="btn btn-danger btn-xs">&times;</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>