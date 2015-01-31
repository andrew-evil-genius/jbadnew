<h1>Messages</h1>
<div id="messages_table"></div>

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
                { name: 'from', type: 'string' },
                { name: 'subject', type: 'string' },
                { name: 'date', type: 'string' }
            ],
            url: "messages/db_message_list.php"
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

        $("#messages_table").jqxDataTable({
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
                { text: 'ID', dataField: 'id', width: 50, hidden: true },
                { text: 'From', dataField: 'from', width: 200 },
                { text: 'Subject', dataField: 'subject', width: 400 },
                { text: 'Sent', dataField: 'date' }
            ]
        });
		
		$("#messages_table").on("rowDoubleClick", function (event) {
			var row = event.args.row;
			alert("You will be Reading - " + row.subject);
		});
    }
	
	function renderToolbar(toolbar) {
		var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
		var addNewButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Send Message</div></div>");
		container.append(addNewButton);
		toolbar.append(container);
		
		addNewButton.jqxButton({
			height: 20,
			width: 90,
			theme: "<?php echo $widget_style; ?>"
		});
		
		addNewButton.on("click", function (event) {
			alert("We will send a new message!");
			//window.location = "index.php?page=add_contact";
		});
	}
</script>