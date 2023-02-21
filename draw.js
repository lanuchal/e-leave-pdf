const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

ctx.strokeStyle = "back";
ctx.lineWidth = 4;
ctx.lineJoin = "miter";
ctx.lineCap = "butt";

let isDrawing = false;
let lastX = 0;
let lastY = 0;

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('touchstart', startDrawing);
canvas.addEventListener('touchmove', draw);
canvas.addEventListener('touchend', stopDrawing);

function startDrawing(e) {
  isDrawing = true;
  [lastX, lastY] = getPosition(e);
}

function draw(e) {
  if (!isDrawing) return;
  const [x, y] = getPosition(e);
  ctx.beginPath();
  ctx.moveTo(lastX, lastY);
  ctx.lineTo(x, y);
  ctx.stroke();
  [lastX, lastY] = [x, y];
}

function stopDrawing() {
  isDrawing = false;
}

function getPosition(e) {
  if (e.touches) {
    const { clientX, clientY } = e.touches[0];
    return [clientX, clientY];
  } else {
    return [e.offsetX, e.offsetY];
  }
}

document.getElementById('clear-btn').addEventListener('click', clearCanvas);

function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

document.getElementById('save-btn').addEventListener('click', save);

function save() {
  const base64 = canvas.toDataURL('image/png', 0.5);
  console.log(base64);

}