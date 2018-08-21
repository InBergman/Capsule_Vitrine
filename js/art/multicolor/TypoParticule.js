/*                                                                            */
/*                                                 ▄▄▄▄ ▄▄▄                   */
/*                                              ▄▀▀   ▀█   █                  */
/*                                            ▄▀  ▄██████▄ █                  */
/*                                           ▄█▄█▀  ▄ ▄ █▀▀▄                  */
/*                                          ▄▀ ██▄  ▀ ▀ ▀▄ █                  */
/*       pamicel@student.42.fr              ▀▄  ▀ ▄█▄▄  ▄█▄▀                  */
/*       feb 2017                             ▀█▄▄  ▀▀▀█▀ █                   */
/*                                           ▄▀   ▀██▀▀█▄▀                    */
/*       TypoParticule.js                   █  ▄▀▀▀▄█▄  ▀█                    */
/*                                          ▀▄█     █▀▀▄▄▀█                   */
/*                                           ▄▀▀▄▄▄██▄▄█▀  █                  */
/*                                          █▀ █████████   █                  */
/*                                          █  ██▀▀▀   ▀▄▄█▀                  */
/*                                           ▀▀                               */
/*                                                                            */

/*
** Visual debugguing for vectors
*/

/*
function show_vect(vect, offset_vect)
{
    push();
    stroke(0);
    strokeWeight(1);
    translate(offset_vect.x, offset_vect.y);
    line(0, 0, vect.x, vect.y);
    pop();
}
*/

// Inherits from Vehicle

TypoParticule.prototype = Object.create(Vehicle.prototype);

/*
** A TypoParticule is a physicle object (Vehicle) with an added position vector
** (anker) defined at construction
**
** Constructor :
** @params      x, y are numbers
**              mass is a positive number
**              anker is a 2D P5.Vector
*/

function TypoParticule(x, y, mass, anker)
{
    Vehicle.call(this, x, y, mass);
    this.maxSpeed = 3;
    this.maxForce = 2;
    this.anker = anker;
    this.personnalSpace = mass;
}

/*
** agitate : Very dull random agitation
*/

TypoParticule.prototype.agitate = function(agitation)
{
    let x = random(-agitation, agitation);
    let y = random(-agitation, agitation);
    return (createVector(x, y));
}

/*
** arrive : uses the vehicle steering behaviour to go to a target and
**      decelerate upon arrival at a certain distance from that target
**      (this.personnalSpace)
*/

TypoParticule.prototype.arrive = function(target)
{
    var desire;
    var dist;

    desire = p5.Vector.sub(target, this.pos);
    dist = desire.mag();
    if (dist < this.personnalSpace)
        desire.setMag(map(dist, 0, this.personnalSpace, 0, this.maxSpeed));
    else
        desire.setMag(this.maxSpeed);
    return (this.calculateSteering(desire));
}

/*
** Seperate applies a seperation force between this and other if they
** are too close to each other
**
** @params  other : a TypoParticule object
** @return  0 if they were not close enough to apply a force, 1 otherwise
*/

TypoParticule.prototype.separate = function(other)
{
    let desire, dist;

    desire = p5.Vector.sub(this.pos, other.pos);
    dist = desire.mag();
    if (dist < this.personnalSpace)
    {
        desire.setMag(map(dist, 0, this.personnalSpace, 0, this.maxSpeed));
        this.applyInternalForce(this.calculateSteering(desire));
        return (1);
    }
    return (0);
}

/*
** spring : f = -k.d
*/

TypoParticule.prototype.spring = function(target, k)
{
    let dist_vect

    dist_vect = p5.Vector.sub(this.pos, target);
    return (p5.Vector.mult(dist_vect, -k));
}

/*
** Function to use in the draw loop
*/

TypoParticule.prototype.draw = function(agitation, color)
{
    this.update();
    this.show(color);
    this.showConnections(color);
}
