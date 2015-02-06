<h1>Users</h1>

<!-- This is the div block for the main DataTable -->
<div id="users_table"></div>

<!-- This is the div block for the edit user Window -->
<div id='edit_user'>
    <div>Edit User</div>
    <div id="edit_user_container">
        <form id="edit_user_form">
            <input id="edit_id" type="hidden" />
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <td>
                        <input id="edit_username" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="edit_password" type="password"/>
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
                        <input id="edit_email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id='edit_roles_admin'>
                            Admin?
                        </div>
                        <div id='edit_roles_sales'>
                            Sales?
                        </div>
                        <div id='edit_roles_collections'>
                            Collections?
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Cancel" id='edit_user_cancel' />
                        <input type="button" value="Submit" id='edit_user_submit' />
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
<script type="text/javascript" src="js/jqwidgets/jqxradiobutton.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxpasswordinput.js"></script>

<script type="text/javascript">
    function contentReady() {
        // prepare the data
        var source = {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'integer' },
                { name: 'username', type: 'string' },
                { name: 'first_name', type: 'string' },
                { name: 'last_name', type: 'string' },
                { name: 'email', type: 'string' },
                { name: 'roles', type: 'string' }
            ],
            url: "db/user_list.php"
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

        // Set up the Main User Table
        $("#users_table").jqxDataTable({
            theme: "<?php echo $widget_style; ?>",
            width: 750,
            pageable: true,
            pagerButtonsCount: 10,
            source: dataAdapter,
            columnsResize: true,
            sortable: true,
            showToolbar: checkRole("admin"),
            renderToolbar: renderToolbar,
            altRows: true,
            filterable: true,
            filterMode: "advanced",
            columns: [
                { text: 'ID', dataField: 'id', width: 50, filterable: false, hidden: true },
                { text: 'Userame', dataField: 'username', width: 200 },
                { text: 'Last Name', dataField: 'last_name', width: 100 },
                { text: 'First Name', dataField: 'first_name', width: 100 },
                { text: 'Email', dataField: 'email' },
                { text: 'Role', dataField: 'roles', width: 50 }
            ]
        });
		
        $("#users_table").on("rowSelect", function (event) {
            selectedId = event.args.row.id;
        });

	$("#users_table").on("rowDoubleClick", function (event) {
            var row = event.args.row;
            $('#edit_user').jqxWindow({title: "Edit User - " + row.last_name + ", " + row.first_name});
            $("#edit_id").val(row.id);
            $("#edit_username").val(row.username);
            $("#edit_password").val("");
            $("#edit_first_name").val(row.first_name);
            $("#edit_last_name").val(row.last_name);
            $("#edit_email").val(row.email);
            setRoleRadioButton(row.roles);
            $("#edit_username").focus();
            $('#edit_user').jqxWindow("open");

            // Rules slightly different between adding and editing.
            $("#edit_user_form").jqxValidator({
                rules: [
                    {input: "#edit_username", message: "Username is required.", action: "keyup", rule: "required"},
                    {input: "#edit_password", message: "Password must be from 4-15 characters.", action: "keyup", 
                        rule: function (input, commit) {
                            var value = input.val();
                            if (value === "" || (value.length >= 4 && value.length <= 15)) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    {input: "#edit_last_name", message: "Last Name is required.", action: "keyup", rule: "required"},
                    {input: "#edit_first_name", message: "First Name is required.", action: "keyup", rule: "required"},
                    {input: "#edit_email", message: "Email is required.", action: "keyup", rule: "required"},
                    {input: "#edit_email", message: "Must be a valid email address.", action: "keyup", rule: "email"}
                ],
                onError: function() { flash("All required fields must be filled out correctly."); },
                onSuccess: function() { editUser(); }
            });
        });
        createEditUser();  
    }

    var selectedId = 0;

    function setRoleRadioButton(role) {
        if (role.indexOf("admin") > -1) {
            $("#edit_roles_admin").jqxRadioButton("check");
        } else if (role.indexOf("sales") > -1) {
            $("#edit_roles_sales").jqxRadioButton("check");
        } else {
            $("#edit_roles_collections").jqxRadioButton("check");
        }
    }
    
    function createEditUser() {
        $('#edit_user').jqxWindow({ 
            theme: "<?php echo $widget_style; ?>", 
            width: 320,
            height: 315, 
            resizable: false,
            isModal: true,
            autoOpen: false
        });
        
        $("#edit_username").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Username"
        });

        $("#edit_password").jqxPasswordInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Enter a Password"
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

        $("#edit_email").jqxInput({
            theme: "<?php echo $widget_style; ?>", 
            width: 300,
            height: 25,
            placeHolder: "Email"
        });

        $("#edit_roles_admin").jqxRadioButton({
            theme: "<?php echo $widget_style; ?>", 
            width: 120, 
            height: 25 
        });
        
        $("#edit_roles_sales").jqxRadioButton({
            theme: "<?php echo $widget_style; ?>", 
            width: 120, 
            height: 25 
        });
        
        $("#edit_roles_collections").jqxRadioButton({
            theme: "<?php echo $widget_style; ?>", 
            width: 120, 
            height: 25 
        });

        $("#edit_user_cancel").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_user_submit").jqxButton({ 
            theme: "<?php echo $widget_style; ?>",
            width: '75', 
            height: '25'
        });

        $("#edit_user_cancel").on("click", function (event) {
            $("#edit_user").jqxWindow("close");
        });

        $("#edit_user_submit").on("click", function (event) {
            $("#edit_user_form").jqxValidator("validate");
        });
    }
	
    function renderToolbar(toolbar) {
        var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
        var addNewButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Add New User</div></div>");
        var deleteButton = $("<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 2px; width: 16px; height: 16px;'>Delete User</div></div>");
        container.append(addNewButton);
        container.append(deleteButton);
        toolbar.append(container);

        addNewButton.jqxButton({
            height: 20,
            width: 95,
            theme: "<?php echo $widget_style; ?>"
        });

        deleteButton.jqxButton({
            height: 20,
            width: 80,
            theme: "<?php echo $widget_style; ?>"
        });

        addNewButton.on("click", addNewButtonClick);
        deleteButton.on("click", deleteButtonClick);
    }

    function deleteButtonClick(event) {
        $("#dialog").jqxWindow({ title: "Warning!"});
        $("#dialog_content").html("Are you sure you want to delete this user? " +  
                                    "This action cannot be undone. " + 
                                    "Click OK if you want to delete the user " + 
                                    "and Cancel to back out.");
        $("#dialog").on("close", function(event) { deleteUser(event, selectedId);});
        $("#dialog").jqxWindow("open");
    }

    function addNewButtonClick(event) {
        $('#edit_user').jqxWindow({title: "Add User"});
        $("#edit_username").val("");
        $("#edit_password").val("");
        $("#edit_first_name").val("");
        $("#edit_last_name").val("");
        $("#edit_email").val("");
        $("#edit_roles_sales").jqxRadioButton({checked: true});
        $("#edit_username").focus();
        $("#edit_user_container").show();
        $('#edit_user').jqxWindow("open");

        // Rules slightly different between adding and editing.
        $("#edit_user_form").jqxValidator({
            rules: [
                {input: "#edit_username", message: "Username is required.", action: "keyup", rule: "required"},
                {input: "#edit_password", message: "Password is required.", action: "keyup", rule: "required"},
                {input: "#edit_password", message: "Password must be from 4-15 characters.", action: "keyup", rule: "length=4,15"},
                {input: "#edit_last_name", message: "Last Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_first_name", message: "First Name is required.", action: "keyup", rule: "required"},
                {input: "#edit_email", message: "Email is required.", action: "keyup", rule: "required"},
                {input: "#edit_email", message: "Must be a valid email address.", action: "keyup", rule: "email"}
            ],
            onError: function() { flash("All required fields must be filled out correctly."); },
            onSuccess: function() { addUser(); }
        });
    }

    function addUser() {
        $.ajax({
            url: "db/user_add.php",
            dataType: "json",
            data: {
                username: $("#edit_username").val(),
                password: $("#edit_password").val(),
                first_name: $("#edit_first_name").val(),
                last_name: $("#edit_last_name").val(),
                email: $("#edit_email").val(),
                roles: setRolesValues()
            },
            success: onEditUserSuccess,
            error: onEditUserError,
            complete: onDbActionComplete
        });
    }
    
    function setRolesValues() {
        if ($("#edit_roles_admin").jqxRadioButton("checked")) return "admin";
        if ($("#edit_roles_sales").jqxRadioButton("checked")) return "sales";
        if ($("#edit_roles_collections").jqxRadioButton("checked")) return "collections";
    }

    function editUser() {
        $.ajax({
            url: "db/user_edit.php",
            dataType: "json",
            data: {
                id: $("#edit_id").val(),
                username: $("#edit_username").val(),
                password: $("#edit_password").val(),
                first_name: $("#edit_first_name").val(),
                last_name: $("#edit_last_name").val(),
                email: $("#edit_email").val(),
                roles: setRolesValues()
            },
            success: onEditUserSuccess,
            error: onEditUserError,
            complete: onDbActionComplete
        });
    }

    function deleteUser(event, id) {
        if (id === 0) {
            flash("You must select a User to delete.");
            return;
        }

        if (event.type === "close" && event.args.dialogResult.OK) {
            $.ajax({
                url: "db/user_delete.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: onEditUserSuccess,
                error: onEditUserError,
                complete: onDbActionComplete
            });
        }
        
    }

    function onEditUserSuccess(data, status, xhr) {
        flash(data.msg);
    }

    function onEditUserError(xhr, status, error) {
        flash(status);
    }

    function onDbActionComplete(xhr, status) {
        $("#edit_user").jqxWindow("close");
        $("#users_table").jqxDataTable("updateBoundData");
    }
</script>