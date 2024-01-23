(function(){
    const socketURL = 'ws://localhost:3000/mywip?id=10';
    const websocket = () =>{
        return new WebSocket(socketURL);
    };

    websocket().onopen = (e) =>{
        console.log(e);
        websocket().onmessage = (message) =>{
            console.log(message.data);
        }
    }


})();
