import React from 'react'
import ProfilePicture from '../ProfilePicture'

const UserList = ({ users, typing, onUserClick }) => (
  <ul className="user-list">
    {users.map(({ uid, username, picture }) =>
      <li key={uid} onClick={e => onUserClick(uid)}>
        <ProfilePicture picture={picture} />
        <span className={typing.find(u => u.uid === uid) && 'typing'}>
          {username}
        </span>
      </li>
    )}
  </ul>
)

export default UserList