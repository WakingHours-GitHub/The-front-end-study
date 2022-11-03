// 相当于我们的electron的一个主进程
// 控制我们主要的逻辑, 例如打开窗口等等.




var electron = require('electron')  // 引入我们的electron

var app = electron.app // 引用app

var BrowserWindow = electron.BrowserWindow // 窗口引用.

var mainWindow = null // 声明要打开的主窗口.


// 创建应用:
app.on('ready', () => { // 如果已经准备好了, 则启动. 
    // 然后我们应该设置我们的主要窗口, 通过我们的窗口应用, 其中是以对象的形式进行引用的. 
    mainWindow = new BrowserWindow({
        width: 800,
        height: 800,
        webpreferences: {nodeIntergration: true}, // 启动所有功能, 在我们的渲染进程中.
    })
    mainWindow.loadFile('index.html') // 加载html页面
    // 一个窗口可以理解成为一个主进程. 

    mainWindow.on('closed', () => { // 当我们监听到主窗口关闭时, 我们释放内存, 将主窗口设置为null
        mainWindow = null
    }) 
})
