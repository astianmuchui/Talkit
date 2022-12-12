package main

import (
    "fmt"
    "net/http"
)

func main() {
    http.HandleFunc("/websocket", func(w http.ResponseWriter, r *http.Request) {
        ws, err := websocket.Upgrade(w, r, nil, 1024, 1024)
        if err != nil {
            http.Error(w, "Could not open websocket connection", http.StatusBadRequest)
        }

        for {
            // Read a message from the client
            _, msg, err := ws.ReadMessage()
            if err != nil {
                break
            }

            // Send a response back to the client
            if err := ws.WriteMessage(websocket.TextMessage, []byte("Hello, client!")); err != nil {
                break
            }
        }
    })

    fmt.Println("Listening on localhost:8000")
    http.ListenAndServe(":8000", nil)
}
