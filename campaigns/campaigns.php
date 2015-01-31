<h1>Campaigns</h1>
<div id="campaigns_table"></div>

<!-- This is the div block for the edit user Window -->
<div id='edit_campaign'>
    <div>Edit Campaign</div>
    <div>
        <form id="edit_campaign_form">
            <input id="edit_id" type="hidden" />
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <input id="edit_name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_first_name"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_last_name"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id='edit_admin'>
                            Active?
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id='edit_dare'>
                            Dare?
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Cancel" id='edit_campaign_cancel' />
                        <input type="button" value="Submit" id='edit_campaign_submit' />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- Campaign content javascript -->

<script type="text/javascript" src="js/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxinput.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxcheckbox.js"></script>
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
                { name: 'id', type: 'int' },
                { name: 'name', type: 'string' },
                { name: 'total_sales', type: 'float' },
                { name: 'status', type: 'int' },
                { name: 'dare', type: 'int' }
            ],
            root: "campaigns",
            url: "db/campaign_list.php"
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
                { text: 'id', dataField: 'id', width: 50, filterable: false },
                { text: 'Campaign Name', dataField: 'name', width: 250 },
                { text: 'Status', dataField: 'status', width: 50 },
                { text: 'Dare', dataField: 'dare', width: 50 },
                { text: 'Total Sales', dataField: 'total_sales', cellsFormat: 'c2' },
                
            ]
        });
		
		$("#campaigns_table").on("rowDoubleClick", function (event) {
			var row = event.args.row;
			flash("You will be editing - " + row.name);
		});

        createEditUser();
    }

    var selectedId = 0;

    function createEditUser() {
        $('#edit_campaign').jqxWindow({ 
            theme: "<?php echo $widget_style; ?>", 
            width: 320,
            height: 270, 
            resizable: false,
            isModal: true,
            autoOpen: false
        });
        
        $("#edit_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Username"
        });

        $("#edit_first_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "First Name"
        });

        $("#edit_last_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Last Name"
        });        
        
        $("#edit_admin").jqxCheckBox({
            theme: "<?php echo $widget_style; ?>", 
            width: 120, 
            height: 25 
        });

        $("#edit_dare").jqxCheckBox({
            theme: "<?php echo $widget_style; ?>", 
            width: 120, 
            height: 25 
        });

        $("#edit_campaign_cancel").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_campaign_submit").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_campaign_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Username is required.", action: "keyup", rule: "required"},
                {input: "#edit_last_name", message: "Last Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_first_name", message: "First Name is required.", action: "keyup", rule: "required"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: function() { editUser(); }
        });

        $("#edit_campaign_cancel").on("click", function (event) {
            $("#edit_campaign").jqxWindow("close");
        });

        $("#edit_campaign_submit").on("click", function (event) {
            $("#edit_campaign_form").jqxValidator("validate");
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
