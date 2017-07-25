/**
 * Created by Jianfeng Li on 2017/4/23.
 */

import React from "react";
import ReactDOMServer from 'react-dom/server';
import PropTypes from "prop-types";
import LoadingComponent from "./loading.component";
import swal from "sweetalert2";

class DataTableComponent extends React.Component {
    constructor(props) {
        super(props);
        this.ctx = document.querySelector("#ctx").getAttribute("content");
        this.token = document.querySelector("#token").getAttribute("content");
        this.state = {
            loading: false
        }
    }

    componentDidMount() {
        console.log("data table: componentDidMount.");
        this.initDataTable();
    }

    /**
     *  Init DataTable.
     */
    initDataTable() {
        let {url, method, params, customUrls, resourceUrl, showDeleteBtn, showEditBtn} = this.props;

        let defColValues = this.initColValues();
        let orderIndex = (customUrls.length > 0 || (resourceUrl && (showDeleteBtn || showEditBtn))) ? defColValues.length - 2 : defColValues.length - 1;

        let that = this;
        this.table = $(this.dataTable).find("table")
            .on('processing.dt', function (e, settings, processing) {
                that.setState({
                    loading: !!processing
                });
            })
            .DataTable({
                serverSide: true,
                processing: false,
                responsive: true,
                deferRender: true,
                columns: defColValues,
                order: [[orderIndex, 'desc']],
                select: true,
                ajax: {
                    url: this.ctx + url,
                    type: method ? method : "post",
                    data: (d) => {
                        for (let property in params) {
                            if (params.hasOwnProperty(property)) {
                                d[property] = params[property];
                            }
                        }
                        d._token = this.token;
                        d.page = d.start / d.length + 1;
                        d.perPage = d.length;
                    },
                    dataFilter: function (data) {
                        let jsonDate = JSON.parse(data);
                        jsonDate.recordsTotal = jsonDate.total;
                        jsonDate.recordsFiltered = jsonDate.total;
                        jsonDate.DT_RowID = jsonDate.id;
                        return JSON.stringify(jsonDate); // return JSON string
                    }
                },
                drawCallback: function (settings) {
                    $(".btn-remove").on("click", function (event) {
                        event.preventDefault();
                        that.destroy($(this).data("id"));
                    });

                    $(".btn-edit").on("click", function (event) {
                        event.preventDefault();
                        let selectedItem = that.table.row($(this).closest("tr")).data();
                        that.edit(selectedItem);
                    });
                },
            });
    }

    /**
     *  Generate actions url.
     */
    generateActionsUrl(data, type, row) {
        const {customUrls, resourceUrl, showEditBtn, showDeleteBtn} = this.props;
        let actions = [];
        if (customUrls.length > 0) {
            actions = customUrls.map((urlObject, index) => {
                return (
                    <li key={"custom-" + index}>
                        <a key={"custom-" + index} href={this.ctx + "/" + urlObject["url"] + "?" + urlObject["query"] + "=" + row["id"]} className="btn btn-default">
                            <i className={"fa fa-pencil fa-fw " + urlObject["iconClass"]}/>
                        </a>
                    </li>
                );
            });
        }

        // if resource url and showEditBtn is true, show the edit button
        if (resourceUrl && showEditBtn) {
            actions.push(
                <li key="edit">
                    <a className="btn btn-primary btn-edit" onClick={() => {
                        this.edit(row);
                    }}>
                        <i className="fa fa-pencil fa-fw"/>
                    </a>
                </li>
            );
        }

        // if resource url and showDeleteBtn is true, show the delete button
        if (resourceUrl && showDeleteBtn) {
            actions.push(
                <li key="delete"><a className="btn btn-danger btn-remove" data-id={row["id"]}><i className="fa fa-trash fa-fw"/></a></li>
            );
        }
        return (
            <ul className="list-inline">
                {actions}
            </ul>
        );

    }

    /**
     *  Init Defined Columns' Values.
     */
    initColValues() {
        let {defCol, resourceUrl, showEditBtn, showDeleteBtn, customUrls} = this.props;

        let defColValues = [];
        for (let text in defCol) {
            if (defCol.hasOwnProperty(text)) {
                // set up the default orderable and searchable as false
                defColValues.push(Object.assign({}, {"orderable": false, "searchable": false}, defCol[text]));
            }
        }

        // set up default columns : "Created At"  and  "Last Updated"
        defColValues.push(
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "updated_at", "orderable": true, "searchable": false},
        );

        if (customUrls.length > 0 || (resourceUrl && (showDeleteBtn || showEditBtn))) {
            defColValues.push({
                "data": "Actions",
                "width": "160px",
                "orderable": false,
                "searchable": false,
                "render": (data, type, row) => {
                    let actionsUrl = this.generateActionsUrl(data, type, row);
                    actionsUrl = ReactDOMServer.renderToStaticMarkup(actionsUrl);
                    return actionsUrl;
                }
            });
        }
        return defColValues;
    }

    /**
     *  Init Defined Columns' Texts.
     */
    initColTexts() {
        let {defCol, resourceUrl, showEditBtn, showDeleteBtn, customUrls} = this.props;

        let defColTexts = [];

        defColTexts = defColTexts.concat(Object.keys(defCol));
        defColTexts.push("Created At", "Last Updated");

        let defColTextList = defColTexts.map((value, index) => {
            return (
                <th key={index}>
                    {value}
                </th>
            );
        });

        if (customUrls.length > 0 || (resourceUrl && (showDeleteBtn || showEditBtn))) {
            defColTextList.push(
                <th key={defColTextList.length + 1}>
                    Actions
                </th>
            );
        }

        return defColTextList;
    }

    /**
     *  Init buttons tool.
     */
    initButtonTools() {
        const {showCreateBtn, showAttachBtn} = this.props;
        let buttonsTool = null;
        let buttonList = [];
        if (showCreateBtn) {
            buttonList.push(
                <a key="createBtn" className="btn btn-default" onClick={() => this.create()}>
                    <i className="fa fa-plus fa-lg" aria-hidden="true"/>&nbsp;&nbsp;New
                </a>
            );
        }

        if (showAttachBtn) {
            buttonList.push(
                <a key="attachBtn" className="btn btn-default" onClick={() => this.attach()}>
                    <i className="fa fa-link fa-lg" aria-hidden="true"/>&nbsp;&nbsp;Attach
                </a>
            );
        }

        if (buttonList.length > 0) {
            buttonsTool = (
                <div className="row">
                    <div className="col-sm-12">
                        {buttonList}
                    </div>
                </div>
            );
        }

        return buttonsTool;
    }

    /**
     *  "New Button" Create handler.
     */
    create() {
        const {create, resourceUrl} = this.props;
        if (create) {
            create(this.table);
        } else {
            window.location.href = this.ctx + resourceUrl + "/create";
        }
    }

    /**
     *  "Attach Button" handler.
     */
    attach() {
        const {attach} = this.props;
        if (attach) {
            let selectedItems = [];
            let items = this.table.rows('.selected').data();
            for (let i = 0; i < items.length; i++) {
                selectedItems.push(items[i]);
            }
            attach(selectedItems, this.table);
        }
    }

    edit(row) {
        const {edit, resourceUrl} = this.props;
        if (edit) {
            edit(row, this.table);
        } else {
            window.location.href = this.ctx + resourceUrl + "/" + row["id"] + "/edit";
        }
    }

    destroy(rowId) {
        let {resourceUrl} = this.props;
        let ctx = this.ctx;
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    axios.delete(ctx + resourceUrl + "/" + rowId).then((response) => {
                        resolve(response);
                    }).catch((error) => {
                        console.log("destroy error", error);
                        reject("Some wrong.");
                    });
                })
            }
        }).then((response) => {
            swal({
                title: 'Deleted!',
                text: 'Your file has been deleted.',
                type: 'success'
            });
            this.table.ajax.reload();
            this.setState({loading: false});
        }).catch((error) => {
            console.log(error);
            this.setState({loading: false});
        });
    }

    render() {
        console.log("data table: render");
        let {title, containerStyle} = this.props;
        let {loading} = this.state;

        let defColTexts = this.initColTexts();
        let buttonsTool = this.initButtonTools();

        return (
            <div className={"box box-warning " + containerStyle} ref={(dataTable) => {
                this.dataTable = dataTable;
            }}>
                <div className="box-header with-border">
                    <h3 className="box-title">{title}</h3>
                    <div className="box-tools pull-right">
                        <button type="button" className="btn btn-box-tool" data-widget="collapse"><i className="fa fa-minus"/></button>
                    </div>
                </div>
                <div className="box-body">
                    {buttonsTool}
                    <br/>
                    <div className="table-responsive">
                        <table className="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                {defColTexts}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                {defColTexts}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <LoadingComponent show={loading}/>
            </div>
        );
    }
}

DataTableComponent.propTypes = {
    containerStyle: PropTypes.string,
    defCol: PropTypes.object.isRequired,
    url: PropTypes.string.isRequired,
    params: PropTypes.object,
    resourceUrl: PropTypes.string,
    customUrls: PropTypes.array,
    showEditBtn: PropTypes.bool,
    showDeleteBtn: PropTypes.bool,
    showCreateBtn: PropTypes.bool,
    showAttachBtn: PropTypes.bool,
    title: PropTypes.string,
    method: PropTypes.string,
    reload: PropTypes.bool,

    create: PropTypes.func,
    edit: PropTypes.func,
    attach: PropTypes.func,
};

DataTableComponent.defaultProps = {
    containerStyle: "",
    defCol: {},
    params: {},
    customUrls: [],
    showEditBtn: false,
    showDeleteBtn: false,
    showCreateBtn: false,
    showAttachBtn: false,
    method: "GET",
    reload: false,
};

export default DataTableComponent;