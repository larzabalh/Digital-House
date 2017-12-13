import React from 'react'

const Messages = ({ messages }) => (
  <ul className="messages">
    {messages.map(({id, message, username}) =>
      <li key={id}>
        <strong>{username}</strong> {message}
      </li>
    )}
  </ul>
)

export default Messages