let scale = 1;

document.getElementById('zoomzar').addEventListener('click', () => {
    if (scale === 1) {return;}
    scale+=0.1; 
    document.getElementsByTagName('table')[0].style.transform = `scale(${scale})`;
});

document.getElementById('deszoomzar').addEventListener('click', () => {
    scale-=0.1; 
    document.getElementsByTagName('table')[0].style.transform = `scale(${scale})`;
});