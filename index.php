<!DOCTYPE html>
<html>

<head>
    <title>Canvas Drawing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #canvas {
            border: 1px solid black;
            touch-action: none;
            -ms-touch-action: none;
            overflow: hidden;
            background: none;
        }
    </style>
</head>

<body>
    <canvas id="canvas" width="300" height="300"></canvas>
    <button id="clear-btn">Clear</button>
    <button id="save-btn">Save</button>

    <script src="draw.js"></script>
</body>

</html>