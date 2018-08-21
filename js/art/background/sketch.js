'use strict';

const ALPHA_BKG = 255;
const JUMP = 10;
// const RECT_L = 6;
// const RECT_H = 6;

function setup()
{
    var canvas = createCanvas(windowWidth, $('#slide-home').height());
    canvas.parent('background-canvas-holder');
    colorMode(RGB);
    noStroke();
    noLoop();
    textSize(5);
}

function drawHelper(width, height)
{
    background(255);
    for (let y = 0; y < height; y += JUMP)
        for (let x = 0; x < width; x += JUMP)
        {
            fill(0, 146, 255, map(y, 0, height, ALPHA_BKG, 0));
            // let n = noise(x / 100, y / 100);
            let r = random();
            if (/*n > .3 && */r > .5)
                text(["❑","❒","⬡","⎔"][floor(random() * 4)], x + random(-JUMP/4, JUMP/4), y + random(-JUMP/3, JUMP/3));
            if (r < .004)
            {
                push();
                textSize(30);
                fill(237, 28, 36, map(y, 0, height, ALPHA_BKG, 0));
                text("⬡", x + random(-JUMP/4, JUMP/4), y + random(-JUMP/3, JUMP/3));
                pop();
            }
        }
}

function draw()
{
    drawHelper(width, height);
}

function windowResized()
{
	resizeCanvas(windowWidth, height);
    drawHelper(width, height);
}
