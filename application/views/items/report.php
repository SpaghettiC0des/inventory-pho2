<div class="animated fadeIn">
    <div class="block-header">
        <h2>
            Items
        </h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>
                All Item Statistics
            </h2>
        </div>
        <div class="card-body card-padding">
            <div data-bind="with: itemVM" class="chart-container" chart-name="allItemsReport" data-href="getItemStatistics">
                <?php require Kohana::find_file('views/partials/admin','report_filter');?>
            </div>
            
            <div id="all-items-report" class="am-chart"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>On Stock Item Statistics</h2>
            <div class="card-body card-padding">
                <div data-bind="with: itemVM" class="chart-container" chart-name="onStockItemsReport" data-href="getOnStockItemStatistics">
                    <?php require Kohana::find_file('views/partials/admin','report_filter');?>
                </div>

                <div id="onstock-items-report" class="am-chart"></div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Expired Items</h2>
            <div class="card-body card-padding">
                <div data-bind="with: itemVM" class="chart-container" chart-name="expiredItemsReport" data-href="getExpiredItemStatistics">
                    <?php require Kohana::find_file('views/partials/admin','report_filter');?>
                </div>

                <div id="expired-items-report" class="am-chart"></div>
            </div>
        </div>
    </div>
</div>

<div data-bind="with: itemVM">
    <?php require Kohana::find_file('views/partials/admin','custom_filter');?>
</div>
