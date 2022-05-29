function onJsonRep1(json){
console.log(json);
for(let i =0; i<json.length;i++){
    const item = document.createElement("div");
    item.classList.add("flex-item");

    const imgBlock = document.createElement("img");
    imgBlock.src=json[i].img;

    const href = document.createElement('a');
    href.setAttribute('href', json[i].url);
    href.setAttribute('target', "_blank");

    href.appendChild(imgBlock);
    
    item.appendChild(href);
    item.dataset.songId =json[i].id_canzone;
    lastrep.appendChild(item);
}
}

function onResp1(response){
return response.json();
}

fetch("get_ultimi_ascolti.php").then(onResp1).then(onJsonRep1);

const lastrep = document.querySelector("#ultimi_ascolti");