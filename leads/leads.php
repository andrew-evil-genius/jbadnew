<h1>Leads</h1>
<div id="leads_table"></div>

<div id='edit_lead'>
    <div>Edit Lead</div>
    <div id="edit_lead_container" style="display: none">
        <form id="edit_lead_form">
            <input id="edit_id" type="hidden" />
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <input id="edit_name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_contact_name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_line_of_business" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_address_1" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_address_2" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_city" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_state"> </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_zip" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_status"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_type"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_stage"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_assigned_user"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Cancel" id='edit_lead_cancel' />
                        <input type="button" value="Submit" id='edit_lead_submit' />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- Campaign content javascript -->

<script type="text/javascript" src="js/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxdatatable.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxdropdownlist.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxlistbox.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxinput.js"></script>

<script type="text/javascript">
    var selectedId = 0;

    function contentReady() {
        // prepare the data
        var source = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'int' },
                { name: 'company_name', type: 'string' },
                { name: 'contact_name', type: 'string' },
                { name: 'status', type: 'string' },
                { name: 'phone', type: 'string' },
                { name: 'amount', type: 'number', format: "c2" }
            ],
            url: "db/lead_list.php"
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

        $("#leads_table").jqxDataTable({
        	theme: "<?php echo $widget_style; ?>",
            width: 750,
            pageable: true,
            pagerButtonsCount: 10,
            source: dataAdapter,
            columnsResize: true,
            sortable: true,
            showToolbar: checkRole("admin|sales"),
            renderToolbar: renderToolbar,
            altRows: true,
            filterable: true,
			filterMode: "advanced",
            columns: [
                { text: 'ID', dataField: 'id', width: 50, filterable: false, hidden: true },
                { text: 'Company Name', dataField: 'company_name', width: 200 },
                { text: 'Contact Name', dataField: 'contact_name', cellsFormat: 'c', width: 200 },
                { text: 'Phone', dataField: 'phone', width: 150 },
                { text: 'Status', dataField: 'status' },
                { text: 'Amount', dataField: 'amount', width: 100, cellsFormat: "c2", align: "right", cellsAlign: "right" }
            ]
        });

        $("#leads_table").on("rowSelect", function (event) {
            selectedId = event.args.row.id;
        });
		
        $("#leads_table").on("rowDoubleClick", function (event) {
            var row = event.args.row;
            window.location = "index.php?page=leads_edit&side=leads_edit_sidebar&nav=leads&id=" + row.id;
        });

        createEditLead();
    }
	
    function renderToolbar(toolbar) {
        var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
        
        if (checkRole("admin|sales")) {
            var addNewButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Add New Lead</div></div>");
            container.append(addNewButton);
            addNewButton.jqxButton({
                height: 20,
                width: 95,
                theme: "<?php echo $widget_style; ?>"
            });
            addNewButton.on("click", function (event) {
                addNewButtonClick(event);
            });
        } 

        if (checkRole("admin")) {       
            var deleteButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Delete Lead</div></div>");
            container.append(deleteButton);
            deleteButton.jqxButton({
                height: 20,
                width: 85,
                theme: "<?php echo $widget_style; ?>"
            });
            deleteButton.on("click", deleteButtonClick);
        }

        toolbar.append(container);
    }

    function deleteButtonClick(event) {
        $("#dialog").jqxWindow({ title: "Warning!"});
        $("#dialog_content").html("Are you sure you want to delete this lead? " +  
                                    "This action cannot be undone. " + 
                                    "Click OK if you want to delete the lead " + 
                                    "and Cancel to back out.");
        $("#dialog").on("close", function(event) { deleteLead(event, selectedId);});
        $("#dialog").jqxWindow("open");
    }

    function deleteLead(event, id) {
        if (id == 0) {
            flash("You must select a Lead to delete.");
            return;
        }

        if (event.type === "close" && event.args.dialogResult.OK) {
            $.ajax({
                url: "db/lead_delete.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: onEditLeadSuccess,
                error: onEditLeadError,
                complete: onDbActionComplete
            });
        }
        
    }

    function addNewButtonClick(event) {
        $('#edit_lead').jqxWindow({title: "Add Lead"});
        $("#edit_name").val("");
        $("#edit_contact_name").val("");
        $("#edit_line_of_business").val("");
        $("#edit_address_1").val("");
        $("#edit_address_2").val("");
        $("#edit_city").val("");
        $("#edit_zip").val("");
        $("#edit_status").jqxDropDownList("selectItem", 0);
        $("#edit_stage").jqxDropDownList("selectIndex", 0);
        $("#edit_type").jqxDropDownList("selectIndex", 0);
        $("#edit_state").jqxDropDownList("selectIndex", 42);
        $("#edit_name").focus();
        $("#edit_lead_container").show();
        $('#edit_lead').jqxWindow("open");

        // Rules slightly different between adding and editing.
        $("#edit_lead_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Company Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_contact_name", message: "Contact Name is required.", action: "keyup", rule: "required"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: function() { addLead(); }
        });
    }

    function addLead() {
        $.ajax({
            url: "db/lead_add.php",
            dataType: "json",
            data: {
                company_name: $("#edit_name").val(),
                contact_name: $("#edit_contact_name").val(),
                line_of_business: $("#edit_line_of_business").val(),
                address_1: $("#edit_address_1").val(),
                address_2: $("#edit_address_2").val(),
                city: $("#edit_city").val(),
                state: $("#edit_state").val(),
                zip: $("#edit_zip").val(),
                status: $("#edit_status").val(),
                stage: $("#edit_stage").val(),
                type: $("#edit_type").val(),
                assigned_user: $("#edit_assigned_user").val(),
                campaign: <?php echo $_SESSION["curr_campaign_id"]; ?> 
            },
            success: onEditLeadSuccess,
            error: onEditLeadError,
            complete: onDbActionComplete
        });
    }

    function onEditLeadSuccess(data, status, xhr) {
        flash(data.msg);
    }

    function onEditLeadError(xhr, status, error) {
        flash(status);
    }

    function onDbActionComplete(xhr, status) {
        $("#edit_lead").jqxWindow("close");
        $("#leads_table").jqxDataTable("updateBoundData");
    }

    function createEditLead() {
        $('#edit_lead').jqxWindow({ 
            theme: "<?php echo $widget_style; ?>", 
            width: 320,
            height: 460, 
            resizable: false,
            isModal: true,
            autoOpen: false
        });
        
        $("#edit_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Company Name"
        });

        $("#edit_contact_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Contact Name"
        });

        $("#edit_line_of_business").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Line of Business"
        });

        $("#edit_address_1").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Address Line 1"
        });

        $("#edit_address_2").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Address Line 2"
        });

        $("#edit_city").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "City"
        });

        var stateSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'state_name', type: 'string' },
                { name: 'state_abbr', type: 'string' }
            ],
            url: "db/state_list.php"
        };

        var stateDataAdapter = new $.jqx.dataAdapter(stateSource);

        $("#edit_state").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: stateDataAdapter,
            width: 120,
            height: 25,
            displayMember: "state_name",
            valueMember: "id",
            placeHolder: "State"
        });

        $("#edit_zip").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 120,
            height: 25,
            placeHolder: "Zip Code"
        });

        var statusSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'status', type: 'string' }
            ],
            url: "db/leads_status_list.php"
        };

        var statusDataAdapter = new $.jqx.dataAdapter(statusSource);

        $("#edit_status").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: statusDataAdapter,
            width: 120,
            height: 25,
            displayMember: "status",
            valueMember: "id",
            placeHolder: "Status",
            selectedIndex: 0
        });

        var stageSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'stage', type: 'string' }
            ],
            url: "db/leads_stage_list.php"
        };

        var stageDataAdapter = new $.jqx.dataAdapter(stageSource);        

        $("#edit_stage").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: stageDataAdapter,
            width: 120,
            height: 25,
            displayMember: "stage",
            valueMember: "id",
            placeHolder: "Stage"
        });

        var typeSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'type', type: 'string' }
            ],
            url: "db/leads_type_list.php"
        };

        var typeDataAdapter = new $.jqx.dataAdapter(typeSource);

        $("#edit_type").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: typeDataAdapter,
            width: 120, 
            height: 25,
            displayMember: "type",
            valueMember: "id",
            placeHolder: "Type"
        });

        var assignedUserSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'name', type: 'string' }
            ],
            url: "db/user_sales_list.php"
        };

        var assignedUserDataAdapter = new $.jqx.dataAdapter(assignedUserSource);

        $("#edit_assigned_user").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: assignedUserDataAdapter,
            width: 120, 
            height: 25,
            displayMember: "name",
            valueMember: "id",
            placeHolder: "Sales",
            selectedIndex: 0
        });

        $("#edit_lead_cancel").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_lead_submit").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_lead_cancel").on("click", function (event) {
            $("#edit_lead").jqxWindow("close");
        });

        $("#edit_lead_submit").on("click", function (event) {
            $("#edit_lead_form").jqxValidator("validate");
        });
    }
</script>