/**
 * Created by Jianfeng Li on 2017/5/17.
 */

import React from 'react';
import PropTypes from "prop-types";

const LoadingComponent = ({show}) => {

    if (show) {
        return (
            <div className="overlay">
                <i className="fa fa-refresh fa-spin"/>
            </div>
        );
    } else {
        return null;
    }
};

LoadingComponent.propTypes = {
    show: PropTypes.bool,
};

LoadingComponent.defaultProps = {
    show: false,
};

export default LoadingComponent;