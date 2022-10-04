const canvas = document.getElementById('canvas');

const ctx = canvas.getContext('2d');

var rectObjects = [];
let drag = false;
let background = null;

let rect = {};

function Shape(x, y, w, h) {
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
}

let rectBCR = canvas.getBoundingClientRect();

function init() {
    const bgPath = document.getElementById('img_path').innerHTML;
    // const bgPath = window.location.hostname + '/' + document.getElementById('img_path').innerHTML;
    console.log(bgPath);
    background = new Image();
    background.src = bgPath;

    background.onload = function() {
        ctx.drawImage(background, 0, 0, canvas.width, canvas.height);
    };

    canvas.addEventListener('mousedown', mouseDown, false);
    canvas.addEventListener('mouseup', mouseUp, false);
    canvas.addEventListener('mousemove', mouseMove, false);
    
    drawRects();
}

function mouseDown(e) {
    rect.startX = e.pageX - rectBCR.left;
    rect.startY = e.pageY - rectBCR.top;
    drag = true;
}

function mouseUp() { 
    rectObjects.push(new Shape(rect.startX, rect.startY, rect.w, rect.h));
    console.log(rectObjects);
    drag = false; 
}

function mouseMove(e) {
    
    if (drag) {
        ctx.drawImage(background, 0, 0);
        rect.w = (e.pageX - rectBCR.left) - rect.startX;
        rect.h = (e.pageY - rectBCR.top) - rect.startY;
        ctx.strokeStyle = 'red';
        ctx.strokeRect(rect.startX, rect.startY, rect.w, rect.h);
        drawRects();
    }
}

function drawRects() {
    for (let i = 0; i < rectObjects.length; i++) {
        let oRec = rectObjects[i];
        ctx.strokeStyle = 'red';
        ctx.strokeRect(oRec.x, oRec.y, oRec.w, oRec.h);
    }
}
//
init();

// on enter click

