<h1>Campaigns</h1>
<div id="campaigns_table"></div>

<!-- Campaign content javascript -->

<script type="text/javascript" src="js/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxdatatable.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxdropdownlist.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxlistbox.js"></script> 

<script type="text/javascript">
    function contentReady() {
        // prepare the data
        var source = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'campaign_name', type: 'string' },
                { name: 'total_sales', type: 'float' },
                { name: 'status', type: 'string' }
            ],
            url: "campaigns/db_campaign_list.php"
        };

        var dataAdapter = new $.jqx.dataAdapter(source, {
                formatData: function (data) {
                    $.extend(data, {
                        featureClass: "P",
                        style: "full",
                        username: "jqwidgets",
                        maxRows: 50
                    });

                    return data;
                }
            }
        );

        $("#campaigns_table").jqxDataTable({
        	theme: "<?php echo $widget_style; ?>",
            width: 750,
            pageable: true,
            pagerButtonsCount: 10,
            source: dataAdapter,
            columnsResize: true,
			sortable: true,
			showToolbar: isAdmin,
			renderToolbar: renderToolbar,
			altRows: true,
            filterable: true,
			filterMode: "advanced",
            columns: [
                { text: 'ID', dataField: 'id', width: 50 },
                { text: 'Campaign Name', dataField: 'campaign_name', width: 250 },
                { text: 'Total Sales', dataField: 'total_sales', cellsFormat: 'c', width: 250 },
                { text: 'Status', dataField: 'status' }
            ]
        });
		
		$("#campaigns_table").on("rowDoubleClick", function (event) {
			var row = event.args.row;
			flash("You will be editing - " + row.campaign_name);
		});
    }
	
	function renderToolbar(toolbar) {
		var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
		var addNewButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Add New Campaign</div></div>");
        var toggleActiveButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Toggle Active</div></div>");
		container.append(addNewButton);
        container.append(toggleActiveButton);
		toolbar.append(container);
		
		addNewButton.jqxButton({
			height: 20,
			width: 130,
			theme: "<?php echo $widget_style; ?>"
		});

        toggleActiveButton.jqxButton({
            height: 20,
            width: 90,
            theme: "<?php echo $widget_style; ?>"
        });
		
		addNewButton.on("click", function (event) {
			flash("We will add a new Campaign!");
		});

        toggleActiveButton.on("click", function (event) {
            flash("We will toggle the Campaign!");
        });
	}
</script>
