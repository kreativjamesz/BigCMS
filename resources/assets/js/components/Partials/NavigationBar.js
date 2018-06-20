import React, { Component } from 'react';
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
    NavLink,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownMenu,
    DropdownItem 
} from 'reactstrap';
import { BrowserRouter as Router, NavLink as RRNavLink, Link, Route } from 'react-router-dom';

export default class NavigationBar extends Component {
    constructor(props) {
        super(props);
        
        this.toggle = this.toggle.bind(this);
        this.state = {
            isOpen: false
        };
    }
    toggle() {
        this.setState({
            isOpen: !this.state.isOpen
        });
    }

    render() {
        return (
            <Navbar className="mb-2" color="dark" dark expand="sm">
                <div className="container">
                    <NavbarBrand to="/" tag={RRNavLink}>BigCMS</NavbarBrand>
                    <NavbarToggler onClick={this.toggle} />
                    <Collapse isOpen={this.state.isOpen} navbar>
                        <Nav className="mr-auto" navbar>
                            <NavItem><NavLink to="/" activeClassName="active" tag={RRNavLink}>Home</NavLink></NavItem>
                            <NavItem><NavLink to="/blog" tag={RRNavLink}>Blog</NavLink></NavItem>
                            <NavItem><NavLink to="/product" tag={RRNavLink}>Product</NavLink></NavItem>
                        </Nav>
                        <Nav className="ml-auto" navbar>
                            <NavItem><NavLink href="/components/">Components</NavLink></NavItem>
                            <NavItem><NavLink href="https://github.com/kreativjamesz" target="_blank">GitHub</NavLink></NavItem>
                            <UncontrolledDropdown nav inNavbar>
                                <DropdownToggle nav caret>
                                    Contact Me
                                </DropdownToggle>
                                <DropdownMenu right>
                                    <DropdownItem>Register</DropdownItem>
                                    <DropdownItem>Login</DropdownItem>
                                    <DropdownItem divider />
                                    <DropdownItem>Logout</DropdownItem>
                                </DropdownMenu>
                            </UncontrolledDropdown>
                        </Nav>
                    </Collapse>
                </div>
            </Navbar>
        );
    }
}