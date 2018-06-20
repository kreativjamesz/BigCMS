import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Link } from 'react-router-dom';

export default class Blog extends Component {
    constructor() {
        super();
        this.state = {
            blogs:[]
        }
        console.log(super());
    }
    componentWillMount() {
        axios.get('/api/blog').then(response => {
            this.setState({
                blogs: response.data
            });
        }).catch(error => {
            console.log(errors)
        })
    }
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12">
                        {this.state.blogs.map(blog => 
                            <div className="card mb-2">
                                <div className="card-body" key={blog.id}>
                                    <Link to={"/blog/" + blog.id}>{blog.title}</Link>
                                    <p>{blog.body}</p>
                                    <small>{this.state.blogs.map(blog => <small>{blog.body}</small>)}</small>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        );
    }
}

// No need for this since this will be the one whos been called by parent component
// if (document.getElementById('blog')) {
//     ReactDOM.render(<Blog />, document.getElementById('blog'));
// }