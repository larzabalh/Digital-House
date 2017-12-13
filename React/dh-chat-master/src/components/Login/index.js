import React from 'react'
import PropTypes from 'prop-types'

const Login = ({ username, picture, onChange, onSubmit }) => (
  <form className="login" autoComplete="off" onSubmit={e => {
    e.preventDefault()
    onSubmit(e)
  }}>
    <div className="form-group">
      <label className="control-label">Usuario</label>
      <input type="text" className="form-control" name="username" value={username} onChange={onChange} autoFocus/>
    </div>
    <div className="form-group">
      <label className="control-label">Imagen</label>
      <input type="text" className="form-control" name="picture" value={picture} onChange={onChange} placeholder="Opcional"/>
    </div>
    <button type="submit" className="btn btn-primary">Login</button>
  </form>
)

Login.propTypes = {
  username: PropTypes.string.isRequired,
  picture: PropTypes.string.isRequired,
  onChange: PropTypes.func.isRequired,
  onSubmit: PropTypes.func.isRequired
}

export default Login