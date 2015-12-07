
<button data-bind="click: filter.bind('e',event)" class="btn btn-primary">All</button>

<div class="btn-group">
    <button data-bind="click: filter.bind('e',event)" filter="last-year" class="btn btn-danger ">
        Last Year
    </button>
    <button data-bind="click: filter.bind('e',event)" filter="this-year" class="btn btn-danger ">
        This Year
    </button>
</div>
<div class="btn-group">
    <button data-bind="click: filter.bind('e',event)" filter="last-month" class="btn btn-warning ">
        Last Month
    </button>
    <button data-bind="click: filter.bind('e',event)" filter="this-month" class="btn btn-warning ">
        This Month
    </button>
</div>
<div class="btn-group">
    <button data-bind="click: filter.bind('e',event)" filter="last-week" class="btn btn-primary ">
        Last Week
    </button>
    <button data-bind="click: filter.bind('e',event)" filter="this-week" class="btn btn-primary ">
        This Week
    </button>
</div>

<button data-bind="click: filter.bind('e',event)" filter="custom" class="btn btn-success ">
    Custom Filter
</button>