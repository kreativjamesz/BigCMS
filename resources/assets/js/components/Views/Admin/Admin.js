import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';

import NavigationBar from './components/Partials/NavigationBar';

export default class Admin extends Component {
    render() {
        return (
            <Router>
                <div id="wrapper">
                    <NavigationBar/>
                    <div>
                        <h1>Welcome to Admin Page</h1>
                    </div>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('admin')) {
    ReactDOM.render(<Admin />, document.getElementById('admin'));
}
