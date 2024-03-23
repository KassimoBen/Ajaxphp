const titreSpan=document.querySelectorAll('h1 span');
const btns=document.querySelectorAll('.btns-first');
const l1=document.querySelector('.l1');
const l2=document.querySelector('.l2');
window.addEventListener('load',()=>{
    const TL= gsap.timeline({paused:true});
    TL
    .staggerFrom( titreSpan, 1, {top: -50, opacity:0, ease:"power2.out"}, 0.5)
    .staggerFrom( btns, 1, {top: -50, opacity:0,ease:"power2.out"}, 0.3,'-=1')
    .from(l1,1,{width:0,ease:"power2.out"},'-=2')
    .from(l2,1,{width:0,ease:"power2.out"},'-=2')
    TL.play();
})