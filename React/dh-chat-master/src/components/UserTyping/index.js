import React from 'react'

const UserTyping = ({ users }) => (
  users.length > 0 && <div className="user-typing">
    {users.map(user => user.username).join(', ')}
    {' '}
    {users.length === 1 ? 'está' : 'están'}
    {' '}
    escribiendo...
  </div>
)

export default UserTyping