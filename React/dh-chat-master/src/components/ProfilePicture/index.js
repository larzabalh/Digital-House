import React from 'react'

const ProfilePicture = ({ picture }) => {
  const style = {
    width: '32px',
    height: '32px',
    objectFit: 'cover',
    borderRadius: '100%'
  }
  const url = picture || 'https://www.menon.no/wp-content/uploads/person-placeholder.jpg'
  return (
    <img src={url} style={style} />
  )
}

export default ProfilePicture