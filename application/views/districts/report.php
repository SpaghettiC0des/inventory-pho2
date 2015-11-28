<div class="animated fadeIn">
    <div class="block-header">
        <h2>District</h2>
        
    </div>

    <div class="card">
        <div class="card-header">
            <h2>District Offices</h2>
        </div>
        
        <div class="card-body card-padding">
            <div data-bind="with: districtVM">
                <?php require Kohana::find_file('views/partials/admin','report_filter');?>                
            </div>
            
            <?php echo \Carbon\Carbon::now()->subYear()->toDateTimeString(); ?>
            <div id="district-report"></div>
        </div>
    </div>
</div>  
