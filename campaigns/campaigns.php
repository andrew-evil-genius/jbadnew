<h1>Campaigns</h1>
<div id="campaigns_table"></div>

<!-- This is the div block for the edit user Window -->
<div id='edit_campaign'>
    <div>Edit Campaign</div>
    <div id="edit_campaign_container">
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
                        <div id="edit_start_date"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="edit_end_date"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id='edit_status'>
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

<div id="file_upload">
    <div>Edit Campaign</div>
    <div>
        <form id="upload" method="post" action="db/upload_csv.php" enctype="multipart/form-data">
             Select File: <input id="file_upload" name="file_upload" type="file" />
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
<script type="text/javascript" src="js/jqwidgets/jqxdatetimeinput.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="js/jqwidgets/globalization/globalize.js"></script> 
<script type="text/javascript" src="js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="js/jquery/jquery.fileupload.js"></script>

<script type="text/javascript">
    var selectedId = 0;
    
    function contentReady() {
        // prepare the data
        var source = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'int' },
                { name: 'name', type: 'string' },
                { name: 'total_sales', type: 'float' },
                { name: 'status', type: 'int' },
                { name: 'dare', type: 'int' },
                { name: 'startdate', type: 'string' },
                { name: 'enddate', type: 'string' }
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
        });

        $("#campaigns_table").jqxDataTable({
            theme: "<?php echo $widget_style; ?>",
            width: 750,
            pageable: true,
            pagerButtonsCount: 10,
            source: dataAdapter,
            columnsResize: true,
            sortable: true,
            showToolbar: true,
            renderToolbar: renderToolbar,
            altRows: true,
            filterable: true,
            filterMode: "advanced",
            columns: [
                { text: 'id', dataField: 'id', width: 50, filterable: false },
                { text: 'Campaign Name', dataField: 'name', width: 250 },
                { text: 'Status', dataField: 'status', width: 50 },
                { text: 'Dare', dataField: 'dare', width: 50 },
                { text: 'Start Date', dataField: 'startdate', width: 100 },
                { text: 'End Date', dataField: 'enddate', width: 100 },
                { text: 'Total Sales', dataField: 'total_sales', cellsFormat: 'c2' }
                
            ]
        });
        
        $("#campaigns_table").on("rowSelect", function (event) {
            selectedId = event.args.row.id;
        });
		
        $("#campaigns_table").on("rowDoubleClick", function (event) {
            var row = event.args.row;
            $('#edit_campaign').jqxWindow({title: "Edit Campaign - " + row.name});
            $("#edit_id").val(row.id);
            $("#edit_name").val(row.name);
            getCampaignDates(row.id);
            $("#edit_status").jqxCheckBox({checked: row.status === 1 });
            $("#edit_dare").jqxCheckBox({checked: row.dare === 1 });
            $("#edit_name").focus();
            $('#edit_campaign').jqxWindow("open");

            // Rules slightly different between adding and editing.
            $("#edit_campaign_form").jqxValidator({
                rules: [
                    {input: "#edit_name", message: "Name is required.", action: "keyup", rule: "required"}
                ],
                onError: function() { flash("All required fields must be filled out correctly."); },
                onSuccess: editCampaign 
            });
        });

        createEditCampaign();
        createFileUpload();

        $('#upload').fileupload({
            // This function is called when a file is added to the queue;
            // either via the browse button, or via drag/drop:
            add: function (e, data) {
                // Automatically upload the file once it is added to the queue
                var jqXHR = data.submit();
            },

            fail: function(e, data){
                // Something has gone wrong!
                data.context.addClass('error');
            },

            done: function(e, data) {
                importCampaignFromFile();
            }

        });
    }

    var selectedId = 0;
    
    function getCampaignDates (id) {
        $.ajax({
            url: "db/campaign_get_dates.php",
            dataType: "json",
            type: "POST",
            data: {
                id: id
            },
            success: function (data, status, xhr) {
                $("#edit_start_date").jqxDateTimeInput("setDate", new Date(data.start_date));
                $("#edit_end_date").jqxDateTimeInput("setDate", new Date(data.end_date));
            }
        });
    }

    function createEditCampaign() {
        $('#edit_campaign').jqxWindow({ 
            theme: "<?php echo $widget_style; ?>", 
            width: 320,
            height: 230, 
            resizable: false,
            isModal: true,
            autoOpen: false
        });
        
        $("#edit_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Campaign Name"
        });

        $("#edit_start_date").jqxDateTimeInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25
        });

        $("#edit_end_date").jqxDateTimeInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25
        });        
        
        $("#edit_status").jqxCheckBox({
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

        $("#edit_campaign_cancel").on("click", function (event) {
            $("#edit_campaign").jqxWindow("close");
        });

        $("#edit_campaign_submit").on("click", function (event) {
            $("#edit_campaign_form").jqxValidator("validate");
        });
    }

    function createFileUpload() {
        $('#file_upload').jqxWindow({ 
            theme: "<?php echo $widget_style; ?>", 
            width: 320,
            height: 230, 
            resizable: false,
            isModal: true,
            autoOpen: false
        });
    }
	
    function renderToolbar(toolbar) {
        var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
        
        if (checkRole("admin")) {
            var addNewButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Add New</div></div>");
            var deleteButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Delete</div></div>");
            var createFromExistingButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Copy</div></div>");
            var importFromFileButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Import</div></div>");
            var toggleActiveButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Toggle Active</div></div>");
            
            container.append(addNewButton);
            container.append(createFromExistingButton);
            container.append(importFromFileButton);
            container.append(deleteButton);
            container.append(toggleActiveButton);
        
            addNewButton.jqxButton({
                height: 20,
                width: 65,
                theme: "<?php echo $widget_style; ?>"
            });
            
            createFromExistingButton.jqxButton({
                height: 20,
                width: 45,
                theme: "<?php echo $widget_style; ?>"
            });

            importFromFileButton.jqxButton({
                height: 20,
                width: 55,
                theme: "<?php echo $widget_style; ?>"
            });

            deleteButton.jqxButton({
                height: 20,
                width: 50,
                theme: "<?php echo $widget_style; ?>"
            });

            toggleActiveButton.jqxButton({
                height: 20,
                width: 100,
                theme: "<?php echo $widget_style; ?>"
            });
            
            addNewButton.on("click", addNewButtonClick);
            createFromExistingButton.on("click", createFromExistingButtonClick);
            deleteButton.on("click", deleteButtonClick);
            importFromFileButton.on("click", importFromFileButtonClick);
            toggleActiveButton.on("click", toggleActiveButtonClick);
        }
	
        var toggleCurrentButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Set Current</div></div>");
	
        container.append(toggleCurrentButton);
	    toolbar.append(container);

        toggleCurrentButton.jqxButton({
            height: 20,
            width: 80,
            theme: "<?php echo $widget_style; ?>"
        });
		
	   toggleCurrentButton.on("click", setActiveCampaign);
    }

    function toggleActiveButtonClick(event) {
        var rows = $("#campaigns_table").jqxDataTable("getSelection");
        var row = rows[0];

        $.ajax({
            url: "db/campaign_toggle_active.php",
            dataType: "json",
            type: "POST",
            data: {
                id: selectedId,
                status: row.status
            },
            success: function (data, status, xhr) {
                $("#campaigns_table").jqxDataTable('updateBoundData');
            }
        });
    }
    
    function addNewButtonClick(event) {
        $('#edit_campaign').jqxWindow({title: "Add Campaign"});
        $("#edit_name").val("");
        $("#edit_status").jqxCheckBox({checked: false});
        $("#edit_dare").jqxCheckBox({checked: false});
        $("#edit_name").focus();
        $("#edit_campaign_container").show();
        $('#edit_campaign').jqxWindow("open");

        // Rules slightly different between adding and editing.
        $("#edit_campaign_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Name is required.", action: "keyup", rule: "required"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: addCampaign 
        });
    }
    
    function createFromExistingButtonClick(event) {
        if (selectedId == 0) {
            flash("You must select a campaign.");
            return;
        }

        $('#edit_campaign').jqxWindow({title: "Add Campaign"});
        $("#edit_name").val("");
        $("#edit_status").jqxCheckBox({checked: false});
        $("#edit_dare").jqxCheckBox({checked: false});
        $("#edit_name").focus();
        $("#edit_campaign_container").show();
        $('#edit_campaign').jqxWindow("open");

        $("#edit_campaign_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Name is required.", action: "keyup", rule: "required"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: addFromExistingCampaign 
        });
    };

    function importFromFileButtonClick(event) {
        $('#file_upload').jqxWindow({title: "Import Campaign"});
        $('#file_upload').jqxWindow("open");
    };
    
    function addCampaign() {
        $.ajax({
            url: "db/campaign_add.php",
            dataType: "json",
            type: "POST",
            data: {
                name: $("#edit_name").val(),
                start_date: $("#edit_start_date").jqxDateTimeInput("getText"),
                end_date: $("#edit_end_date").jqxDateTimeInput("getText"),
                status: $("#edit_status").jqxCheckBox("checked"),
                dare: $("#edit_dare").jqxCheckBox("checked")
            },
            success: onAddSuccess,
            error: onAddError,
            complete: onDbActionComplete
        });
    }

    function addFromExistingCampaign() {
        $.ajax({
            url: "db/campaign_create_from_existing.php",
            dataType: "json",
            type: "POST",
            data: {
                name: $("#edit_name").val(),
                start_date: $("#edit_start_date").jqxDateTimeInput("getText"),
                end_date: $("#edit_end_date").jqxDateTimeInput("getText"),
                status: $("#edit_status").jqxCheckBox("checked"),
                dare: $("#edit_dare").jqxCheckBox("checked"),
                source_campaign: selectedId
            },
            success: onAddSuccess,
            error: onAddError,
            complete: onDbActionComplete
        });
    };

    function importCampaignFromFile() {
        $('#file_upload').jqxWindow("close");

        $('#edit_campaign').jqxWindow({title: "Add Campaign"});
        $("#edit_name").val("");
        $("#edit_status").jqxCheckBox({checked: false});
        $("#edit_dare").jqxCheckBox({checked: false});
        $("#edit_name").focus();
        $("#edit_campaign_container").show();
        $('#edit_campaign').jqxWindow("open");

        // Rules slightly different between adding and editing.
        $("#edit_campaign_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Name is required.", action: "keyup", rule: "required"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: importCampaign 
        });
    };

    function importCampaign() {
        $.ajax({
            url: "db/campaign_import_from_file.php",
            dataType: "json",
            type: "POST",
            data: {
                name: $("#edit_name").val(),
                start_date: $("#edit_start_date").jqxDateTimeInput("getText"),
                end_date: $("#edit_end_date").jqxDateTimeInput("getText"),
                status: $("#edit_status").jqxCheckBox("checked"),
                dare: $("#edit_dare").jqxCheckBox("checked")
            },
            success: function (data, status, xhr) {
                $("#campaigns_table").jqxDataTable('updateBoundData');
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
            complete: function (xhr, status) {
                $("#edit_campaign").jqxWindow("close");
            }
        });
    }
    
    function onAddSuccess(data, status, xhr) {
        flash(data.msg);
    }

    function onAddError(xhr, status, error) {
        flash(status);
    }

    function onDbActionComplete(xhr, status) {
        $("#edit_campaign").jqxWindow("close");
        $("#campaigns_table").jqxDataTable("updateBoundData");
    }
    
    function setActiveCampaign() {
        $.ajax("db/set_active_campaign.php",{
            data: { campaign_id: selectedId },
            type: "POST",
            error: handleSetActiveCampaignError,
            success: handleSetActiveCampaignSuccess
        });
    }
    
    function handleSetActiveCampaignError(xhr, textStatus, error) {
        flash(error);
    }
    
    function handleSetActiveCampaignSuccess(data, textStatus, xhr) {
        var response = $.parseJSON(data);
        if (response.success) {
            $("#campaigns_table").jqxDataTable('updateBoundData');
            $("#current_campaign").text(response.campaign);
        }
    }
    
    function deleteButtonClick(event) {
        $("#dialog").jqxWindow({ title: "Warning!"});
        $("#dialog_content").html("Are you sure you want to delete this campaign? " +  
                                    "This action cannot be undone. " + 
                                    "Click OK if you want to delete the user " + 
                                    "and Cancel to back out.");
        $("#dialog").on("close", function(event) { deleteCampaign(event, selectedId);});
        $("#dialog").jqxWindow("open");
    }
    
    function deleteCampaign(event, id) {
        if (id === 0) {
            flash("You must select a Campaign to delete.");
            return;
        }

        if (event.type === "close" && event.args.dialogResult.OK) {
            $.ajax({
                url: "db/campaign_delete.php",
                dataType: "json",
                type: "POST",
                data: {
                    campaign_id: id
                },
                success: onAddSuccess,
                error: onAddError,
                complete: onDbActionComplete
            });
        }   
    }
    
    function editCampaign() {
        $.ajax({
            url: "db/campaign_edit.php",
            dataType: "json",
            type: "POST",
            data: {
                id: $("#edit_id").val(),
                name: $("#edit_name").val(),
                start_date: $("#edit_start_date").jqxDateTimeInput("getText"),
                end_date: $("#edit_end_date").jqxDateTimeInput("getText"),
                status: $("#edit_status").jqxCheckBox("checked"),
                dare: $("#edit_dare").jqxCheckBox("checked")
            },
            success: onAddSuccess,
            error: onAddError,
            complete: onDbActionComplete
        });
    }
</script>
