import React from 'react'
import io from 'socket.io-client'
import uuid from 'node-uuid'
import Messages from '../Messages'
import NewMessage from '../NewMessage'
import UserList from '../UserList'
import UserTyping from '../UserTyping'

class Chatroom extends React.Component {
  state = {
    events: [],
    messages: [],
    users: [],
    typing: []
  }
  componentDidMount () {
    const socket = this.socket = io()
    const uid = uuid.v4()
    const { username, picture } = this.props
    socket.emit('hello', { uid, username, picture })
    socket.on('users', this.handleUserList)
    socket.on('new message', this.handleNewMessage)
    socket.on('user joined', this.handleUserJoined)
    socket.on('user left', this.handleUserLeft)
    socket.on('typing', this.handleTyping)
    socket.on('stop typing', this.handleStopTyping)
  }
  componentWillUnmount () {
    this.socket.disconnect()
  }
  addMessage (message) {
    this.setState(({ messages }) => ({
      messages: [...messages, message]
    }))    
  }
  handleUserList = ({ users }) => {
    this.setState({
      users
    })
  }
  handleNewMessage = (message) => {
    this.addMessage(message)
  }
  handleUserJoined = (user) => {
    this.setState(({ users }) => ({
      users: [...users, user]
    }))
  }
  handleUserLeft = (user) => {
    this.setState(({ users }) => ({
      users: users.filter(u => u.uid !== user.uid)
    }))
  }
  sendMessage = (message) => {
    const id = uuid.v4()
    const { username } = this.props
    const m = { id, username, message }
    this.addMessage(m)
    this.socket.emit('new message', m)
  }
  handleTyping = (user) => {
    this.setState(({ typing }) => ({
      typing: [...typing.filter(u => u.uid !== user.uid), user]
    }))
  }
  handleStopTyping = ({ uid }) => {
    this.setState(({ typing }) => {
      return ({
        typing: typing.filter(u => u.uid !== uid)
      })
    })
  }
  render () {
    const { onLogout } = this.props
    const { messages, typing, users } = this.state
    return (
      <div className="chatroom">
        <button type="button" onClick={onLogout}>Salir</button>
        <main>
          <Messages messages={messages} />
          <UserList users={users} typing={typing}/>
        </main>
        <UserTyping users={typing} />
        <NewMessage
          onTyping={() => this.socket.emit('typing')}
          onStopTyping={() => this.socket.emit('stop typing')}
          onNewMessage={this.sendMessage} />
      </div>
    )
  }
}

export default Chatroom