const canvas = document.getElementById('canvas');

const ctx = canvas.getContext('2d');

var rectObjects = [];
let drag = false;
let background = null;

let rect = {};

function Shape(x, y, w, h, category_id, category_name) {
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
    this.category_id = category_id;
    this.category_name = category_name;
}

let rectBCR = canvas.getBoundingClientRect();

const getAllShapes = () => {
    $.ajax({
        url: '/controllers/MainController.php',
        type: 'POST',
        data: {
            action: 'GetAllShapes',
            payload: {
                id_picture: document.getElementById('img_id').innerHTML
            }
        },
        success: function(data) {
            data = JSON.parse(data);
            rectObjects = data;
            drawRects();
        }
    });
}

function init() {
    const bgPath = document.getElementById('img_path').innerHTML;
    console.log(bgPath);
    background = new Image();
    background.src = bgPath;

    background.onload = function() {
        ctx.drawImage(background, 0, 0, canvas.width, canvas.height);
    };

    canvas.addEventListener('mousedown', mouseDown, false);
    canvas.addEventListener('mouseup', mouseUp, false);
    canvas.addEventListener('mousemove', mouseMove, false);
    
    getAllShapes();
}

function mouseDown(e) {
    rect.startX = e.pageX - rectBCR.left;
    rect.startY = e.pageY - rectBCR.top;
    drag = true;
}

function mouseUp() { 
    let selected_category_id = $('#category_select').val();
    let selected_category_name = $( "#category_select option:selected" ).text();

    rectObjects.push(new Shape(rect.startX, rect.startY, rect.w, rect.h, selected_category_id, selected_category_name));
    console.log(rectObjects);

    drawRects();

    add_objects();
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

        ctx.lineWidth = 1;
        ctx.strokeStyle = 'red';
        ctx.font="24px Georgia";
        ctx.textAlign="center"; 
        ctx.textBaseline = "middle";
        ctx.fillStyle = "red";
        ctx.fillText(oRec.category_name, parseInt(oRec.x)+(parseInt(oRec.w/2)), parseInt(oRec.y)+(parseInt(oRec.h/2)));
    }
}

const add_objects = () =>{

    let selected_category_id = $('#category_select').val();

    if (selected_category_id && rectObjects.length > 0) {
        $.ajax({
            url: '/controllers/MainController.php',
            type: 'POST',
            data: {
                action: 'AddObjects',
                payload: {
                    objects: rectObjects,
                    id_picture: document.getElementById('img_id').innerHTML
                }
            },
            success: function() {
                console.log('success');
            }
        });
    }
}


init();
