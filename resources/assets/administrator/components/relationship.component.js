/**
 * Created by Jianfeng Li on 2017/4/23.
 */

import React from "react"
import PropTypes from "prop-types";
import DataTableComponent from "./datatable.component";

class RelationshipComponent extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            primaryTable: null,
        };
    }

    create(dataTable) {
        $(".bs-modal").modal('show');
        this.setState({
            primaryTable: dataTable
        });
    }

    attach(selectedItems, ownerId) {
        const ctx = document.querySelector("#ctx").getAttribute("content");
        const {attachUrl, resourceUrl} = this.props;
        const {primaryTable} = this.state;

        let attachedIds = selectedItems.map((item, index) => {
            return item["id"];
        });
        axios.post(ctx + (attachUrl ? attachUrl : resourceUrl), {
            owner_id: ownerId,
            attach_ids: attachedIds,

        }).then(response => {
            primaryTable.ajax.reload();
        }).catch(errors => console.error(errors));

        $(".bs-modal").modal('hide');
    }

    render() {
        const {url, defCol, params, title, showDeleteBtn, resourceUrl} = this.props;
        const {ownerId, relatedUrl, relatedDefCol, relatedParams, relatedTitle} = this.props;
        return (
            <div>
                <DataTableComponent url={url}
                                    params={params}
                                    defCol={defCol}
                                    title={title}
                                    showCreateBtn={true}
                                    resourceUrl={resourceUrl}
                                    showDeleteBtn={showDeleteBtn}
                                    create={(dataTable) => this.create(dataTable)}
                />

                <div className="modal fade bs-modal" tabIndex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div className="modal-dialog modal-lg" role="document">
                        <div className="modal-header bg-primary">
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 className="modal-title"/>
                        </div>
                        <div className="modal-content">
                            <DataTableComponent url={relatedUrl ? relatedUrl : url}
                                                params={relatedParams}
                                                defCol={relatedDefCol ? relatedDefCol : defCol}
                                                title={relatedTitle ? relatedTitle : title}
                                                showAttachBtn={true}
                                                attach={(selectedItems, dataTable) => {
                                                    this.attach(selectedItems, ownerId);
                                                    dataTable.ajax.reload();
                                                }}
                            />
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

RelationshipComponent.propTypes = {
    // Main table props.
    containerStyle: PropTypes.string,
    defCol: PropTypes.object.isRequired,
    url: PropTypes.string.isRequired,
    params: PropTypes.object,
    customUrls: PropTypes.array,
    title: PropTypes.string,
    method: PropTypes.string,
    resourceUrl: PropTypes.string,
    showDeleteBtn: PropTypes.bool,

    // Related table props.
    ownerId: PropTypes.any.isRequired,
    relatedDefCol: PropTypes.object,
    relatedUrl: PropTypes.string,
    relatedParams: PropTypes.object,
    relatedTitle: PropTypes.string,
    relatedMethod: PropTypes.string,
    attachUrl: PropTypes.string.isRequired,
};

RelationshipComponent.defaultProps = {
    containerStyle: "",
    params: {},
    customUrls: [],
    title: "",
    method: "GET",
    resourceUrl: "",
    showDeleteBtn: false,

    relatedParams: {},
    relatedTitle: "",
    relatedMethod: "GET",
    attachUrl: "",
};

export default RelationshipComponent;