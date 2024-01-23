import { WebSocketServer } from "ws";

export default (server) =>{
    const wss = new WebSocketServer({server});
    return wss;
};
