var fs = require('fs')

window.onload = function () {
    var btn = this.document.querySelector("#btn")
    var mybaby = this.document.querySelector("#mybaby")

    btn.onclick = funtion(){ // 当我们点击时, 一个回调函数
        fs.readFile("../xiaojiejie.txt", (err, data) => {
            mybaby.innerHTML = data
        })
    }

}