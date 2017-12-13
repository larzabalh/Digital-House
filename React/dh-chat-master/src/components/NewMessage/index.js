import React from 'react'

const NewMessage = ({ onNewMessage, onTyping, onStopTyping }) => {
  let input
  let typingTimer
  const stopTyping = () => {
    typingTimer = null
    onStopTyping()
  }
  return (
    <form className="new-message" autoComplete="off" onSubmit={e => {
      e.preventDefault()
      onNewMessage(input.value)
      input.value = ''
      clearTimeout(typingTimer)
      stopTyping()
    }}>
      <input
        type="text"
        className="form-control"
        placeholder="Escribe un mensaje..."
        ref={el => input = el}
        onKeyPress={e => {
          if (typingTimer) {
            clearTimeout(typingTimer)
          } else {
            onTyping()
          }
          typingTimer = setTimeout(stopTyping, 3000)
        }}
      />
    </form>
  )
}

export default NewMessage