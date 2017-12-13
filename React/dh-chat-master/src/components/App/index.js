import React from 'react'
import Chatroom from '../Chatroom'
import Login from '../Login'

class App extends React.Component {
  state = {
    username: '',
    picture: '',
    loggedIn: false
  }
  handleLoginSubmit = e => {
    this.setState({
      loggedIn: true
    })
  }
  handleLoginChange = e => {
    this.setState({
      [e.target.name]: e.target.value
    })
  }
  handleLogout = e => {
    this.setState({
      username: '',
      loggedIn: false
    })
  }
  render () {
    const { loggedIn, username, picture } = this.state
    return (
      <div className="container">
        {loggedIn ?
          <Chatroom
            username={username}
            onLogout={this.handleLogout}
          />
          :
          <Login
            username={username}
            picture={picture}
            onChange={this.handleLoginChange}
            onSubmit={this.handleLoginSubmit}
         />}
      </div>
    )
  }
}

export default App