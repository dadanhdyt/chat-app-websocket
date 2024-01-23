import express from "express";
import http from 'http';
import websocket from "./websocket/index.js";
import { WebSocketServer } from "ws";
import { log } from "console";
const app = express();
const server = http.createServer(app);
const wss = websocket(server);

wss.on('connection', (socket,request) => {
    console.log(request.url);
    socket.on('message', (e) => {
        console.log(e.toString());
    })
    wss.clients.forEach(function (e) {
        e.send("Well")
    });
})
server.listen(3000, function () {
    console.log('Berjalan di host:8000');
});
