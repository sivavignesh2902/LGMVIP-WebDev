import './App.css';
import axios from 'axios';
import { Navbar,Nav,Container,Spinner,NavItem } from 'react-bootstrap';
import React, { Component } from 'react';
export default class App extends Component {
    constructor(){
        super();
        this.state = {
            users: [],
            stillloading: false
        };
    }
    
    fetchuser = () =>{
        this.setState({
            stillloading: true
        },
            () => {
            axios.get(`https://reqres.in/api/users?page=1`)
            .then(res =>{
                console.log(res.data.data)
                this.setState({
                    users: res.data.data,
                    stillloading: false
                })
            }
            )
        }
        )
    }
    loadingComponent = () => {
        return (
            <div>
                <Spinner animation="border" variant="success" />
            </div>
        )
    }
    render() {
        return (
            <div className='fetchusers'>
            <Navbar bg="light" expand="lg" sticky='top' >
            <Container>
                <Navbar.Brand href=""  >Fetch Users</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="me-auto">
                    <NavItem href=""><button className='btn btn-success'  onClick={this.fetchuser} >Get Users</button></NavItem>
                </Nav>
                </Navbar.Collapse>
            </Container>
            </Navbar>
            <div>
                {
                    this.state.stillloading === true
                    ?
                    <div>
                        <Spinner animation='border' />
                    </div>
                    :                
                <div className='displayusers'>
                    {this.state.users.map(user => {
                        return(
                            <div>
                            <div className='user' >                            
                                <img src={user.avatar}/>
                                <section className='userdetails'>
                                    <h2>{user.first_name}   {user.last_name}</h2>
                                    <h3>{user.email}</h3>                                
                                </section>
                            </div>
                            </div>
                        )
                })
                }
            </div>
                }
            </div>
            </div>
        )
}
}