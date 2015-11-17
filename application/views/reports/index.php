	<script type="text/javascript">
							
	function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Print Total Purchase Report', 'height=600,width=800');
        mywindow.document.write('<html><head><title>Total Purchase Report</title>');
        //mywindow.document.write('<link rel="stylesheet" href="<?php echo url::site()?>assets/css/bootstrap-overrides.css" type="text/css" />');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }	
						function printCanvas()  
			{  
				var dataUrl = document.getElementById('printPurchases').toDataURL(); //attempt to save base64 string to server using this var  
				var text = $("#text").html();
				var legend = $("#legendDiv1").html();
				var windowContent = '<!DOCTYPE html>';
				windowContent += '<html>'
				windowContent += '<head><title>Print Report</title></head>';
				windowContent += '<body><center>Report for No. of Enrolled Students per '+ text +'</center>'
				windowContent += '<img src="' + dataUrl + '">';
				windowContent += ''+legend+'</body>';
				windowContent += '</html>';
				var printWin = window.open('','');
				printWin.document.open();
				printWin.document.write(windowContent);
				printWin.document.close();
				printWin.focus();
				printWin.print();
				printWin.close();
			}
				</script>
				
<div class="card animated fadeIn">
    <div class="card-header">
        <h2>Reports <h2>
    </div>
    
                        <div class="card-body card-padding">
                            <div role="tabpanel">
                                <ul class="tab-nav" role="tablist">
                                    <li class="active"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="tab">Purchases</a></li>
                                <!--    <li><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">Profile</a></li>
                                    <li><a href="#messages11" aria-controls="messages11" role="tab" data-toggle="tab">Messages</a></li>
                                    <li><a href="#settings11" aria-controls="settings11" role="tab" data-toggle="tab">Settings</a></li> -->
                                </ul>
                              
                                <div class="tab-content" data-bind="with: reportVM">
								
                                    <div role="tabpanel" class="tab-pane active" id="purchases" >
							<form data-bind = "submit : handlePurchaseReport"  action="" class="form-horizontal">
							  <div class="form-group">
                        <div class="col-md-3">
                            <label for="category-description" class="control-label">Month From</label>
                            <div class="fg-line">
                             	  <select data-bind = "value : monthFrom" id="purchasesMonthFrom" required class="form-control">
								<option value="">Month From</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
			  </select>
                            </div>
                        </div>
                
					
						  
                        <div class="col-md-3">
                            <label for="category-description" class="control-label">Month To</label>
                            <div class="fg-line">
                             	  <select data-bind = "value : monthTo" id="purchasesMonthTo" required class="form-control" >
									<option value="">Month To</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
			  </select>
                            </div>
                        </div>
						
						    <div class="col-md-3">
                            <label for="category-description" class="control-label">Year</label>
                            <div class="fg-line">
                             	  <select data-bind = "value : year" required class="form-control" id="purchasesYear">
				<option value="">Year</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
			  </select>
                            </div>
                        </div>
						
                    <button type="submit" class="btn btn-link">Generate</button>
                    <button onclick="printCanvas('#purchasesChart')" class="btn btn-link">Print</button>
              
                    </div>
										
										<div id="printPurchases">
										<div  class="containerPurchases">
										<h4><span id="divTitle"></span></h4>
										</br>
                                  		<canvas id="purchasesChart" width="800" height="400"></canvas>
										</div>
										<div id="legendPurchases"></div>
										</div>
										</form>
                      </div>
						<div role="tabpanel" class="tab-pane" id="profile11">
							<p>2</p>
						</div>
						<div role="tabpanel" class="tab-pane" id="messages11">
							<p>3</p>
						</div>
						<div role="tabpanel" class="tab-pane" id="settings11">
							<p>4</p>
						</div>
					</div>
				</div>
				
			</div>
            
</div>
			<script type="text/javascript">
						function printCanvas()  
			{  
				var dataUrl = document.getElementById('purchasesChart').toDataURL(); //attempt to save base64 string to server using this var  
				var text = $("#divTitle").html();
				var legend = $("#legendPurchases").html();
				var monthFrom = $("#purchasesMonthFrom").val();
				var monthTo = $("#purchasesMonthTo").val();
				var year = $("#purchasesYear").val();
				var windowContent = '<!DOCTYPE html>';
				windowContent += '<html>'
				windowContent += '<head><title>Print Report</title></head>';
				windowContent += '<body><center>Report for Total Purchases from '+monthFrom+' to '+monthTo+' '+year+'</center>'
				windowContent += '<img src="' + dataUrl + '">';
				windowContent += ''+legend+'</body>';
				windowContent += '</html>';
				var printWin = window.open('','');
				printWin.document.open();
				printWin.document.write(windowContent);
				printWin.document.close();
				printWin.focus();
				printWin.print();
				printWin.close();
			}
				</script>
