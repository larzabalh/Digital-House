var http = require('http')
var path = require('path')
var express = require('express')
var socket_io = require('socket.io')

var app = express()
var server = http.createServer(app)
var io = socket_io(server)

var port = process.env.PORT || 3000

server.listen(port, function () {
  console.log('server running on port %d', port)
})

app.use(express.static(path.join(__dirname, 'public')))

var users = []

io.on('connection', function (socket) {
  var __user = null

  socket.on('new message', function (message) {
    socket.broadcast.emit('new message', message)
  })

  socket.on('hello', function (user) {
    if (__user) return
    __user = user

    users.push(user)

    socket.emit('users', { users })
    socket.broadcast.emit('user joined', user)
  })

  socket.on('disconnect', function () {
    users = users.filter(u => u.uid !== __user.uid)
    socket.broadcast.emit('user left', __user)
  })

  socket.on('typing', function () {
    socket.broadcast.emit('typing', __user)
  })

  socket.on('stop typing', function () {
    socket.broadcast.emit('stop typing', __user)
  })
  
})