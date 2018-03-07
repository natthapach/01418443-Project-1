function onClickViewProof(path){
    console.log(path);
    var myWindow = window.open("", "MsgWindow", "width=500px,height=500px");
    myWindow.document.write("<img width='500px'src='" + "../../service/slip/" + path + "'>");
}