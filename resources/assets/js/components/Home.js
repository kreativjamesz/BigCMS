import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Blog from './Blog';

export default class Home extends Component {
	render(){
		return (
			<div className="container">
				<div className="row">
					<div className="col-md-12">
						<div className="jumbotron">
	                        <h1 className="display-3">Welcome to this Sample Page</h1>
	                        <p className="lead">Created using Frontend ReactJs Preset for fast and easy loading content</p>
	                        <hr className="m-y-md"/>
	                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	                        <p className="lead">
	                            <a className="btn btn-secondary flat btn-lg" href="#" role="button">Learn more</a>
	                        </p>
	                    </div>
                    </div>
                </div>
                <div className="row">
                	<div className="col-md-12">
                		<Blog/>
                	</div>
                </div>
			</div>
		)
	};
}