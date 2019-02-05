window.onload = function () {

    fetch('http://ktraff.local',
    {
        method: "GET",
        mode: "cors",

    })
    .then(function(res){
        return res.json()
    }).then(data=>{
        console.log(data);
    });
};