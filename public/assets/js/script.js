function onload(){
  snackbar();
  events();
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

function events(){
  var event = document.querySelector('.modal-body').querySelector('#item_name'),
      token = document.querySelector('.modal-body').querySelector('input[name="_token"]').value;


  event.addEventListener('change', function(){
    array = {
      formkey: [
        '_token',
        'namebrand',
      ],
      formvalue: [
        token,
        this.value,
      ],
      url: "fetchapi",
      method: "POST",
      credentials: "same-origin",
      mode: "no-cors",
    }

    var formData = new FormData();

    for (l = 0; l < array['formkey'].length; l++) {
      formData.append(array['formkey'][l], array['formvalue'][l]);
    }

    fetch(array['url'], {
      method: array['method'],
      body: formData,
      credentials: array['credentials']
    })
      .then(response => response.text())
      .then(function (response) {
        var data = JSON.parse(response);
        console.log(data);
        /*
          data should be in form of associative array:
          array->sub0->datalist
          array->sub1->datalist
        */


        // for (l = 0; l < data.length; l++) {
        //   for (k = 0; k < data['sub' + l]; k++) {
        //     //actions to datalists
        //   }
        // }


        // ASYNC actions
        //

      })
      .catch(
        console.log('asynchronous fetch-API function failed!')
      );
  })
}