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
  var event = document.querySelector('#item_name');

  if(event !== null){

    event.addEventListener('change', function(){
      document.querySelector('#quantity').value = 1;

      array = {
        formkey: [
          '_token',
          'namebrand',
        ],
        formvalue: [
          document.querySelector('input[name="_token"]').value,
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

          document.querySelector('#item_id').value = data[0]['item_id'];
          document.querySelector('#quantity').max = data[0]['quantity'];
          document.querySelector('#soldprice').value = data[0]['value'];
          document.querySelector('#barcode').value = data[0]['barcode'];
          document.querySelector('#item-image').src = data[0]['image'];

        })
        .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
        .then(
        console.log('SUCCESS: asynchronous fetch-API function successful!')
        );
    });
  }
}