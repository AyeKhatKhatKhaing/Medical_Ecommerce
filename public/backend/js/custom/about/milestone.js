const ReactDOM = require("../../../plugins/global/plugins.bundle");
const Title = ()=>{
    return (
        "Hello"
    )
}

ReactDOM.render(<Title />, document.querySelector('#title'));
