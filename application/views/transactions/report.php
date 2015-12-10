<div class="animated fadeIn">
    <div class="block-header">
        <h2>
            Transactions
        </h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>
                Transaction Statistics
            </h2>
        </div>
        <div class="card-body card-padding">
            <div data-bind="with: transactionVM">
                <?php require Kohana::find_file('views/partials/admin','report_filter');?>
            </div>
            <div id="transactions-report" class="am-chart"></div>
        </div>
    </div>
</div>

<div data-bind="with: transactionVM">
    <?php require Kohana::find_file('views/partials/admin','custom_filter');?>
</div>