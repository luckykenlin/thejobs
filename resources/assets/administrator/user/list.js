import React from "react";
import ReactDOM from "react-dom";
import DataTableComponent from "../components/datatable.component";

// basic index page business table .
const el = document.querySelector(".user-table");
if (el) {
    const defCol = {
        "Name": {"data": "name", "searchable": true, "orderable": true,},
        "email": {"data": "email", "searchable": true, "orderable": true,},
        "phone": {"data": "phone", "searchable": true},
        "nationality": {"data": "nationality", "searchable": true, "orderable": true,},
    };

    ReactDOM.render(
        <DataTableComponent url={"/admin/user"}
                            defCol={defCol}
                            resourceUrl={"/admin/user"}
                            showEditBtn={true}
                            title={"List User"}
                            showCreateBtn={true}
                            showDeleteBtn={true}
        />,
        el
    );
}
