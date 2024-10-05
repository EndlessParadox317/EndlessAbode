

document.addEventListener('mousemove', (event) => {
  const mouseX=event.clientX;
  const mouseY=event.clientY;
  const anchor=document.getElementById('anchor');
  const rekt=anchor.getBoundingClientRect();
  const anchorX=rekt.left+rekt.width/2;
  const anchorY=rekt.top+rekt.height/2;
  const angleDeg=angle(mouseX,mouseY,anchorX,anchorY);
  const eye=document.getElementById('eye');
  eye.style.transform= `rotate(${90+angleDeg}deg)`;
});

function angle(cx,cy,ex,ey){
    const dy=ey-cy;
    const dx=ex-cx;
    const rad=Math.atan2(dy,dx);
    const deg=rad*180/Math.PI;
    return deg;
}
