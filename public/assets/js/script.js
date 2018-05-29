function onload(){
  snackbar();
}

function snackbar(){
  var snackbar = document.getElementById('snackbar'),
      body = document.getElementsByTagName('body')[0],
      tl = new TimelineMax({repeat:0});

  if(snackbar.children[0].textContent === ''){
    body.removeChild(snackbar);
  } else{
    tl.to(snackbar, 0, {height:'auto', fontSize:'auto'})
      .to(snackbar, 0, {color:'rgba(0,0,0,0)', delay: 3})
      .to(snackbar, 1, {height:0, fontSize:0, ease:Power3.easeOut});
  }


}