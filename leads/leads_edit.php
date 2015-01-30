<?php 
require_once "db/leads_edit_functions.php"; 

$lead_id = filter_input(INPUT_GET, "id");
?>

<h1>Edit - <?php echo get_lead_from_id($lead_id, $db); ?></h1>
<form id="edit_lead_form">
<div class="editblock">
	<table cellpadding="5" cellspacing="5" border="0" width="100%">
		<tr>
			<td width="25%">Company Name:</td>
			<td width="50%"><input id="edit_name" /></td>
			<td>Status</td>
			<td><div id="edit_status"></div></td>
		</tr>
		<tr>
			<td>Contact Name:</td>
			<td><input id="edit_contact_name" /></td>
			<td>Lead Type</td>
			<td><div id="edit_type"></div></td>
		</tr>
		<tr>
			<td>Line of Business:</td>
			<td><input id="edit_line_of_business" /></td>
			<td>Stage</td>
			<td><div id="edit_stage"></div></td>
		</tr>
		<tr>
			<td>Contact Number:</td>
			<td><input id="edit_phone" /></td>
			<td>Amount ($):</td>
			<td><input id="edit_amount" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input id="edit_email" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td colspan="3"><input id="edit_address_1" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"><input id="edit_address_2" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td width="30%"><input id="edit_city" /></td>
			<td><div id="edit_state"></div></td>
			<td><input id="edit_zip" /></td>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="button" value="Cancel" id='cancel' /></td>
			<td><input type="button" value="Update" id='update_lead' /></td>
			</td>
		</tr>
	</table>
	<br>
	<div id="notes_container">
	</div>
	<br>
	<textarea id="edit_notes"></textarea>
	<input style="margin: 5px 5px 5px 490px;" type="button" value="Add Note" id='add_note' />
</div>
</form>


<script type="text/javascript" src="js/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxdropdownlist.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxlistbox.js"></script> 
<script type="text/javascript" src="js/jqwidgets/jqxinput.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxdropdownbutton.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxcolorpicker.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxeditor.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxtooltip.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxmaskedinput.js"></script>

<script type="text/javascript">
	function contentReady() {
		createForm();
		initForm();
        getNotes();
	}

	function initForm() {
		$.ajax({
            url: "db/lead_get.php",
            dataType: "json",
            data: {
            	lead_id: <?php echo $lead_id; ?>
            },
            success: function (data, status, xhr) {
            	if (data.success) {
            		var lead = data.lead;
            		var state = $("#edit_state");
            		var status = $("#edit_status");
            		var stage = $("#edit_stage");
            		var type = $("#edit_type");
            		$("#edit_name").val(lead.company_name);
	            	$("#edit_contact_name").val(lead.contact_name);
	            	$("#edit_line_of_business").val(lead.line_of_business);
	            	$("#edit_phone").val(lead.phone);
	            	$("#edit_email").val(lead.email);
	            	$("#edit_amount").val(lead.amount);
	            	$("#edit_address_1").val(lead.line_1);
	            	$("#edit_address_2").val(lead.line_2);
	            	$("#edit_city").val(lead.city);
	            	$("#edit_zip").val(lead.zip);
	            	state.jqxDropDownList("selectItem", state.jqxDropDownList("getItemByValue", lead.state_id));
	            	status.jqxDropDownList("selectItem", status.jqxDropDownList("getItemByValue", lead.status_id));
	            	stage.jqxDropDownList("selectItem", stage.jqxDropDownList("getItemByValue", lead.stage_id));
	            	type.jqxDropDownList("selectItem", type.jqxDropDownList("getItemByValue", lead.type_id));
	            	setValidator();
            	} else {
            		flash("Could not retrieve Lead.");
            	}
            },
            error: function () {
            	window.location = "index.php?page=leads";
            }
        });
	}

	function setValidator() {
		$("#edit_lead_form").jqxValidator({
            rules: [
                {input: "#edit_name", message: "Company Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_contact_name", message: "Contact Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_email", message: "Email is required.", action: "keyup", rule: "email"},
                {input: "#edit_phone", message: "Phone is required.", action: "keyup", rule: "phone"},
                {input: "#edit_amount", message: "Amount must be numeric.", action: "keyup", 
                	rule: function (input, commit) {
                		if ($.isNumeric(input.val())) {
                			return true;
                		}
                		return false;
                	}}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: function() { updateLead(); }
        });
	}

	function createForm() {
		$("#edit_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "90%",
            height: 25,
            placeHolder: "Company Name"
        });

        $("#edit_contact_name").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "90%",
            height: 25,
            placeHolder: "Contact Name"
        });

        $("#edit_line_of_business").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "90%",
            height: 25,
            placeHolder: "Line of Business"
        });

        $("#edit_phone").jqxMaskedInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "90%",
            height: 25,
            mask: "(###)###-####"
        });

        $("#edit_amount").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "99%",
            height: 25,
            placeHolder: "0.00",
            rtl: true
        });

        $("#edit_email").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "90%",
            height: 25,
            placeHolder: "Email"
        });

        var statusSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'status', type: 'string' }
            ],
            url: "db/leads_status_list.php",
            async: false
        };

        var statusDataAdapter = new $.jqx.dataAdapter(statusSource);

        $("#edit_status").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: statusDataAdapter,
            width: 120,
            height: 25,
            dropDownHeight: 350,
            displayMember: "status",
            valueMember: "id",
            placeHolder: "Status"
        });

        var stageSource = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'stage', type: 'string' }
            ],
            url: "db/leads_stage_list.php",
            async: false
        };

        var stageDataAdapter = new $.jqx.dataAdapter(stageSource);        

        $("#edit_stage").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: stageDataAdapter,
            width: 120,
            height: 25,
            dropDownHeight: 150,
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
            url: "db/leads_type_list.php",
            async: false
        };

        var typeDataAdapter = new $.jqx.dataAdapter(typeSource);

        $("#edit_type").jqxDropDownList({
            theme: "<?php echo $widget_style; ?>", 
            source: typeDataAdapter,
            width: 120, 
            height: 25,
            dropDownHeight: 150,
            displayMember: "type",
            valueMember: "id",
            placeHolder: "Type"
        });

        $("#edit_address_1").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "100%",
            height: 25,
            placeHolder: "Address Line 1"
        });

        $("#edit_address_2").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "100%",
            height: 25,
            placeHolder: "Address Line 2"
        });

        $("#edit_city").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: "100%",
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
            url: "db/state_list.php",
            async: false
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

        $('#edit_notes').jqxEditor({
            theme: "<?php echo $widget_style; ?>",
            height: "200px",
            width: '100%',
            tools: "bold italic underline | left center right | clean"
        });

        $("#add_note").jqxButton({ 
        	theme: "<?php echo $widget_style; ?>", 
        	width: '150', 
        	height: '25'
        });
        
        $("#update_lead").jqxButton({ 
        	theme: "<?php echo $widget_style; ?>", 
        	width: '120', 
        	height: '25'
        });

        $("#cancel").jqxButton({ 
        	theme: "<?php echo $widget_style; ?>", 
        	width: '120', 
        	height: '25'
        });

        $("#add_note").on("click", addNote);
        $("#update_lead").on("click", function () {$("#edit_lead_form").jqxValidator("validate")});
        $("#cancel").on("click", function () { window.location = "index.php?page=leads";});		
	}

	function updateLead() {
		$.ajax({
            url: "db/lead_update.php",
            dataType: "json",
            data: {
            	lead_id: <?php echo $lead_id; ?>,
            	company_name: $("#edit_name").val(),
            	contact_name: $("#edit_contact_name").val(),
            	line_of_business: $("#edit_line_of_business").val(),
            	phone: $("#edit_phone").val(),
            	amount: $("#edit_amount").val(),
            	email: $("#edit_email").val(),
            	status: $("#edit_status").val(),
            	type: $("#edit_type").val(),
            	stage: $("#edit_stage").val(),
            	address_1: $("#edit_address_1").val(),
            	address_2: $("#edit_address_2").val(),
            	city: $("#edit_city").val(),
            	state: $("#edit_state").val(),
            	zip: $("#edit_zip").val()
            },
            success: updateLeadSuccess,
            error: updateLeadError
        });
	}

	function updateLeadSuccess(data, status, xhr) {
		window.location = "index.php?page=leads";
	}

	function updateLeadError(xhr, status, error) {
		flash(error.message);
	}

	function addNote() {
		$.ajax({
            url: "db/lead_note_add.php",
            dataType: "json",
            data: {
            	lead_id: <?php echo $lead_id; ?>,
            	note: $("#edit_notes").val()
            },
            success: addNoteSuccess,
            error: getNotesError
        });
        $("#edit_notes").val("");
	}

	function addNoteSuccess(data, status, xhr) {
		getNotes();
	}

	function getNotes() {
		$.ajax({
            url: "db/lead_note_list.php",
            dataType: "json",
            data: {
            	lead_id: <?php echo $lead_id; ?>
            },
            success: setNotes,
            error: getNotesError
        });
	}

	function setNotes(data, status, xhr) {
		var note_format = "";
		$("#notes_container").html("");
		for (x = 0; x < data.length; x++) {
			note_format = "<blockquote>" +
				"<h3>" + data[x]["created"] + "</h3>" +
				"<hr>" + data[x]["note"] + "</blockquote>";
			$("#notes_container").append(note_format);
		}
	} 

	function getNotesError(xhr, status, error) {
		flash("There was a problem adding your note.  Please, try again.");
	}
</script>