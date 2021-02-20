fetch("https://api.github.com/users/benrobo")
.then((res)=>res.json())
.then((data)=>console.log(data))