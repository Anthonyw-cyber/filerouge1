

    let film_id = document.getElementById('filmes')
    let btn = document.getElementById('btn')
    let music = document.getElementById('musics')
    btn.addEventListener("click",function envoie(){
            let request = new XMLHttpRequest()
            request.open('POST',"localhost:8888/post.php" )
            request.send("{film_id:"+film_id+",music :"+music+"}");
            request.onload = () => {
            console.log(xhr.responseText);
        }
    })
