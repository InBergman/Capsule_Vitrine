/*                                                                            */
/*                                                 ▄▄▄▄ ▄▄▄                   */
/*                                              ▄▀▀   ▀█   █                  */
/*                                            ▄▀  ▄██████▄ █                  */
/*                                           ▄█▄█▀  ▄ ▄ █▀▀▄                  */
/*                                          ▄▀ ██▄  ▀ ▀ ▀▄ █                  */
/*       pamicel@student.42.fr              ▀▄  ▀ ▄█▄▄  ▄█▄▀                  */
/*       feb 2017                             ▀█▄▄  ▀▀▀█▀ █                   */
/*                                           ▄▀   ▀██▀▀█▄▀                    */
/*       sketch.js                          █  ▄▀▀▀▄█▄  ▀█                    */
/*                                          ▀▄█     █▀▀▄▄▀█                   */
/*                                           ▄▀▀▄▄▄██▄▄█▀  █                  */
/*                                          █▀ █████████   █                  */
/*                                          █  ██▀▀▀   ▀▄▄█▀                  */
/*                                           ▀▀                               */
/*                                                                            */

const MASS = 20;

////////////////////////////    header functions    ////////////////////////////

function ShapeRect(x, y, w, h)
{
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
}

function isInRect(pos, rect)
{
    return (    pos.x > rect.x              &&
                pos.x < rect.x + rect.w     &&
                pos.y > rect.y              &&
                pos.y < rect.y + rect.h      );
}

function fillBuilding(n, rect, canv_w, canv_h)
{
    let partList = [];
    let pos = createVector();

    while (partList.length < (n - 1))
    {
        pos.x = random(canv_w);
        pos.y = random(canv_h);
        if (isInRect(pos, rect))
            partList.push(new TypoParticule(pos.x, pos.y, random(MASS / 2, MASS), pos.copy()));
    }
    return (partList);
}

///////////////////////////    physics functions    ////////////////////////////

const AGITATION = 10;
const FRICTION_COEF = -1;

function applyFriction(objects)
{
    let friction_force;

    for (let i = 0; i < objects.length; i++)
    {
        friction_force = p5.Vector.mult(objects[i].vel, FRICTION_COEF);
        objects[i].applyForce(friction_force);
    }
}

function generalSeperationBehaviour(partList)
{
    if (partList.length > 0)
    {
        for (let i = 1; i < partList.length; i++)
        {
            if (partList[0].separate(partList[i]))
                partList[i].separate(partList[0]);
        }
        generalSeperationBehaviour(partList.slice(1));
    }
}

////////////////////////////////////////////////////////////////////////////////


function Building(rect, partList)
{
    this.rect = rect;
    this.partList = partList;
}

const N_PART = 50;
var buildings = [];
var mouse;

function setup()
{
    let rect;
    createCanvas(500, 500);
    colorMode(HSB, 100);
    background(255);
    mouse = new TypoParticule(0, 0, 30, 0);
    // rect = new ShapeRect(100, 100, 100, 100);
    // buildings.push(new Building(rect, fillBuilding(N_PART, rect, width, height)));
    rect = new ShapeRect(200, 200, 150, 100);
    buildings.push(new Building(rect, fillBuilding(N_PART, rect, width, height)));
}

var behaviours = [  function(part)
                    {
                        part.applyInternalForce(part.arrive(part.anker));
                        part.applyForce(part.agitate(AGITATION));
                    },
                    function(part)
                    {
                        part.applyInternalForce(part.arrive(part.anker));
                        part.applyForce(part.agitate(AGITATION));
                    }];

var displayFunctions = [    function(part)
                            {
                                push();
                                let dist = p5.Vector.dist(part.anker, part.pos);
                                fill((dist + 30) % 100, 100, 100);
                                let x = part.pos.x;
                                let y = part.pos.y;
                                ellipse(x, y, part.mass, part.mass);
                                pop();
                            },
                            function(part)
                            {
                                push();
                                fill(0);
                                let x = part.pos.x;
                                let y = part.pos.y;
                                ellipse(x, y, part.mass, part.mass);
                                pop();
                            }
]
var x = 0;
function draw()
{
    x = (x + .5) % 100;
    noStroke();
    // fill(0, 0, 100, 1);
    // rect(0, 0, width, height);
    mouse.pos.x = mouseX;
    mouse.pos.y = mouseY;
    for (n in buildings)
    {
        let partList = buildings[n].partList;
        generalSeperationBehaviour(partList);
        for (i in partList)
        {
            behaviours[n](partList[i]);
            partList[i].update();
            partList[i].applyInternalForce(partList[i].arrive(mouse.pos));
            displayFunctions[n](partList[i]);
        }
        applyFriction(partList);
    }
}

function mouseClicked()
{
    background(255);
}
