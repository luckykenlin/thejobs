import React from "react";
import ReactDOM from "react-dom";
import DataTableComponent from "../components/datatable.component";

// basic index page business table .
const el = document.querySelector(".job-table");
if (el) {
    const defCol = {
        "job_name": {"data": "job_name", "searchable": true, "orderable": true,},
        "job_contact": {"data": "job_contact", "searchable": true, "orderable": true,},
        "phone": {"data": "phone", "searchable": true},
        "job_salary": {"data": "job_salary", "searchable": true, "orderable": true,},
    };

    ReactDOM.render(
        <DataTableComponent url={"/admin/job"}
                            defCol={defCol}
                            resourceUrl={"/admin/job"}
                            showEditBtn={true}
                            title={"List Job"}
                            showCreateBtn={true}
                            showDeleteBtn={true}
        />,
        el
    );
}
