import React from "react";
import ReactDOM from "react-dom";
import DataTableComponent from "../components/datatable.component";

// basic index page business table .
const el = document.querySelector(".company-table");
if (el) {
    const defCol = {
        "name": {"data": "name", "searchable": true, "orderable": true,},
        "category": { "data": "categories.name", "defaultContent": "", "searchable": true},
        "phone": {"data": "phone", "searchable": true},
    };

    ReactDOM.render(
        <DataTableComponent url={"/admin/company"}
                            defCol={defCol}
                            resourceUrl={"/admin/company"}
                            showEditBtn={true}
                            title={"List Company"}
                            showCreateBtn={true}
                            showDeleteBtn={true}
        />,
        el
    );
}
