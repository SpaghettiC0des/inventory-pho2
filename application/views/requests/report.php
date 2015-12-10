<div class="animated fadeIn">
    <div class="block-header">
        <h2>
            Requests
        </h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>
                Requests Statistics
            </h2>
        </div>
        <div class="card-body card-padding">
            <div data-bind="with: requestVM">
                <?php require Kohana::find_file('views/partials/admin','report_filter');?>
            </div>
            <div id="requests-report" class="am-chart"></div>
        </div>
    </div>
</div>

<div data-bind="with: requestVM">
    <?php require Kohana::find_file('views/partials/admin','custom_filter');?>
</div>