
function onJsonRep(json){
    console.log(json);
    for(let i =0; i<json.length;i++){
        const item = document.createElement("div");
        item.classList.add("flex-item");
        const imgBlock = document.createElement("img");

        const albumLink = document.createElement('a');
        albumLink.setAttribute('href', json[i].url);
        albumLink.setAttribute('target', "_blank");
        imgBlock.src=json[i].img;

        albumLink.appendChild(imgBlock);

        item.appendChild(albumLink);
        item.dataset.songId =json[i].id_canzone;
        ciccio.appendChild(item);
    }

}
    
    function onResp(response){
    return response.json();
    }
    
    fetch("preferiti.php").then(onResp).then(onJsonRep);
    
    const ciccio = document.querySelector("#preferiti");