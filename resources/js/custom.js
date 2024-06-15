function copyFunction(url) {
    var copyText = url;
    let input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.value = copyText;
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    document.body.removeChild(input)
}