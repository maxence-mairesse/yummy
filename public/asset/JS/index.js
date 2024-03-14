
let app = {
init: function () {
    console.log('test module')
    navigation.init()
    Commentary.init()


},

}
document.addEventListener('DOMContentLoaded',app.init)