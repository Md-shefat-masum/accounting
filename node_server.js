const express = require('express');
const app = express();

const http = require('http');
const socketio = require('socket.io');

const server = http.createServer();

const io = socketio(server);


app.get('/', (req, res) => {
    // res.send('Hello World!');
    res.sendFile(__dirname + '/public/test.html');
})

io.on('connection', (socket) => {
    console.log('a user connected');

    // socket.broadcast.emit('hi');
    // socket.on('disconnect', () => {
    //     console.log('user disconnected');
    // });
    // socket.on('chat message', (msg) => {
    //     io.emit('chat message', msg);
    //     console.log('message: ' + msg);
    // });
});


server.listen(8080, () => {
    console.log('listening on *:3000');
});
