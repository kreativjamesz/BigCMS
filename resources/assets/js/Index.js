import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';

import Home from './components/Home';
import Blog from './components/Blog';
import Product from './components/Product';
import NavigationBar from './components/Partials/NavigationBar';

export default class Index extends Component {
    render() {
        return (
            <Router>
                <div id="wrapper">
                    <NavigationBar/>
                    <div>
                        <Route path="/" exact component={Home}/>
                        <Route path="/blog" exact component={Blog}/>
                        <Route path="/product" exact component={Product}/>
                    </div>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}
