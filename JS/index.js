
let app = {
init: function () {
    console.log('test module')
    navigation.init()
}
}
document.addEventListener('DOMContentLoaded',app.init)