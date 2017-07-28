import React from "react";
import ReactDOM from "react-dom";
import DataTableComponent from "../components/datatable.component";

// basic index page business table .
const el = document.querySelector(".role-table");
if (el) {
    const defCol = {
        "Role": {"data": "role", "searchable": true, "orderable": true,},
        "Permission": {"data": "permission", "searchable": true, "orderable": true,},
    };

    ReactDOM.render(
        <DataTableComponent url={"/admin/role"}
                            defCol={defCol}
                            resourceUrl={"/admin/role"}
                            showEditBtn={true}
                            title={"List Role"}
                            showCreateBtn={true}
                            showDeleteBtn={true}
        />,
        el
    );
}
