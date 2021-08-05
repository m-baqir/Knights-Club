function sendFriendRequest(senderId,receiverId) {
    let xmlHttpRequest = new XMLHttpRequest();

    xmlHttpRequest.onreadystatechange = function (){
        if (this.readyState === 4 && this.status === 200){
            console.log("succeeded to send friend request");
        }
    }
    xmlHttpRequest.open("POST","friend-request.php")
    xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    let data = {
        "senderId":senderId,
        "receiverId":receiverId
    }
    xmlHttpRequest.send(JSON.stringify(data));
}

window.onload = function () {

}