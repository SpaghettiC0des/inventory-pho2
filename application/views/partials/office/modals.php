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
                            <label for="request-date" class="control-label">Date</label>
                            <input data-bind = "dateTimePicker : datetime, 
                                dateTimePickerOptions:{format:'YYYY-MM-DD hh:mm'}" type="text" 
                                    class="form-control input-mask" data-mask="0000-00-00 00:00" placeholder = "YYYY-MM-DD hh:mm" required>
                        </div>
                        <div class="col-md-8">
                            <label for="request-ref-no" class="control-label">Reference Number</label>
                            <input data-bind = "textInput: reference_no" type="text" class="form-control input-mask" data-mask="A0-000-0000" placeholder="A0-000-0000"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="request-office-budget" class="control-label">Budget</label>
                            <input data-bind = "value: budget" type="number" class="form-control" readonly="">
                        </div>
                    </div>
                    <div>
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

<!-- Add Budget Request Modal -->
<div data-bind = "with : budgetRequestVM" class="modal fade" id="addBudgetRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form data-bind = "submit : handleSubmit" action="" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Budget Request</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="budget-request-year" class="control-label">Year</label>
                            <input data-bind = "dateTimePicker : year, 
                                dateTimePickerOptions:{format:'YYYY'}" type="text" 
                                    class="form-control input-mask" data-mask="0000-00-00" placeholder = "YYYY" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Request Amount (Php)</label>
                            <input data-bind="textInput: amount" type="number" class="form-control text-center" placeholder="Php 0.00">
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


<!-- email -->

<div data-bind = "with : messageVM" class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" data-bind="submit : emailSending" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Message</h4>
                </div>
                <div class="modal-body">
				 <label for="user-name" class="control-label">To: <span data-bind="text : receiverName"></span></label>
				</br>
				</br>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="fg-line">
                                <input data-bind = "value : subject" id="email-subject" name="email-subject" type="text" class="form-control" placeholder="Subject *" required>
                            </div>
                        </div>
                    </div>
					
			      <div class="form-group">
				  <div class="col-md-12">
                                <div class="fg-line">
                                    <textarea class="form-control" data-bind="value : content" rows="5" placeholder="Type your Message *" id="email-content" name="email-content" required></textarea>
                                </div>
                                </div>
                            </div>
					
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Reply Email -->

<div data-bind = "with : messageVM" class="modal fade" id="replyEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" data-bind="submit : replyEmailSending" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Reply Message</h4>
                </div>
                <div class="modal-body">
				 <label for="user-name" class="control-label">Reply To: <span data-bind="text : receiverName"></span></label>
				</br>
				</br>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="fg-line">
                                <input data-bind = "value : subject" id="email-subject" name="email-subject" type="text" class="form-control" placeholder="Subject *" required>
                            </div>
                        </div>
                    </div>
					
			      <div class="form-group">
				  <div class="col-md-12">
                                <div class="fg-line">
                                    <textarea class="form-control" data-bind="value : content" rows="5" placeholder="Type your Message *" id="email-content" name="email-content" required></textarea>
                                </div>
                                </div>
                            </div>
					
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>