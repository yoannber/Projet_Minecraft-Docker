var elt = document.getElementById('players');
var monTexte = elt.textContent;
var percent = (eval(monTexte))

window.onload = function onLoad() {
  var progressBar = 
    new ProgressBar.Circle('#progress', {
      color: '#00CFD4',
      strokeWidth: 3,
      duration: 1800, // milliseconds
      trailColor: '#f4f4f4',
      trailWidth: 1,
      easing: 'easeInOut'
     
    });
  progressBar.animate(percent); // percent
};