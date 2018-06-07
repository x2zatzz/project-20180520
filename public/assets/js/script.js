function onload(){
  // notice();

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
  var event = [];
  event[0] = document.querySelector('#item_name');
  event[1] = document.querySelector('#item_name1');
  event[2] = document.querySelector('#image2');
  event[3] = document.querySelector('#item_name2');
  event[4] = document.querySelector('#brand_name2');
  event[5] = document.getElementsByClassName('itemupdate');
  event[6] = document.querySelector('#image3');
  event[7] = document.querySelector('#notice-button');


  if(event[0] !== null){
    event[0].addEventListener('change', function(){
      document.querySelector('#quantity').value = 1;

      array = {
        formkey: [
          '_token',
          'namebrand',
        ],
        formvalue: [
          document.querySelector('#modal-checkout').querySelector('input[name="_token"]').value,
          this.value,
        ],
        url: "fetch_itemdetail",
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
          document.querySelector('#item-image').src = "storage/image/"+data[0]['image'];

        })
        .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
        .then(
          console.log('SUCCESS: asynchronous fetch-API function successful!')
        );
    });
  }

  if(event[1] !== null){
    event[1].addEventListener('change', function(){
      document.querySelector('#quantity1').value = 1;

      array = {
        formkey: [
          '_token',
          'namebrand',
        ],
        formvalue: [
          document.querySelector('#modal-checkin').querySelector('input[name="_token"]').value,
          this.value,
        ],
        url: "fetch_itemdetail",
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

        document.querySelector('#item_id1').value = data[0]['item_id'];
        document.querySelector('#purchaseprice1').value = data[0]['value'];
        document.querySelector('#barcode1').value = data[0]['barcode'];
        document.querySelector('#item-image1').src = "storage/image/"+data[0]['image'];

      })
      .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
      .then(
        console.log('SUCCESS: asynchronous fetch-API function successful!')
      );
    });
  }

  if(event[2] !== null){
    event[2].addEventListener('change', function(){
      document.getElementById('item-image2').src = window.URL.createObjectURL(this.files[0]);
    });
  }

  if(event[3] !== null){
    event[3].addEventListener('blur', function(){

      array = {
        formkey: [
          '_token',
          'name',
        ],
        formvalue: [
          document.querySelector('#modal-newitem').querySelector('input[name="_token"]').value,
          this.value,
        ],
        url: "fetch_name",
        method: "POST",
        credentials: "same-origin",
        mode: "no-cors",
      }

      var formData = new FormData();

      for(l = 0; l < array['formkey'].length; l++) {
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
        if(data !== null){
          var span = document.createElement('span');
          span.id = 'tmp-span';
          span.textContent = data;
          span.style = "color:orange; font-size:0.8em;";
          document.querySelector('#modal-newitem').querySelector('label[for="item_name2"]').insertBefore(span, null);
        } else{

        }
      })
      .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
      .then(
        console.log('SUCCESS: asynchronous fetch-API function successful!')
      );
    });

    event[3].addEventListener('focus', function(){
      var span = document.querySelector('#tmp-span');
      if(span !== null){
        document.querySelector('#modal-newitem').querySelector('label[for="item_name2"]').removeChild(span);
      } else{

      }
    });
  }

  if(event[4] !== null){
    event[4].addEventListener('blur', function(){
      array = {
        formkey: [
          '_token',
          'name',
          'brand',
        ],
        formvalue: [
          document.querySelector('#modal-newitem').querySelector('input[name="_token"]').value,
          document.querySelector('#item_name2').value,
          this.value,
        ],
        url: "fetch_brand",
        method: "POST",
        credentials: "same-origin",
        mode: "no-cors",
      }
      var formData = new FormData();

      for(l = 0; l < array['formkey'].length; l++) {
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
        if(data !== null){
          var span = document.createElement('span');
          span.id = 'tmp-span';
          span.textContent = data;
          span.style = "color:red; font-size:0.8em;";
          document.querySelector('#modal-newitem').querySelector('label[for="brand_name2"]').insertBefore(span, null);
          document.querySelector('#modal-newitem').querySelector('button[type="submit"]').setAttribute('disabled', true);
        } else{

        }
      })
      .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
      .then(
        console.log('SUCCESS: asynchronous fetch-API function successful!')
      );

    });

    event[4].addEventListener('focus', function(){
      var span = document.querySelector('#tmp-span');
      if(span !== null){
      document.querySelector('#modal-newitem').querySelector('label[for="brand_name2"]').removeChild(document.querySelector('#modal-newitem').querySelector('label[for="brand_name2"]').children[0]);
      document.querySelector('#modal-newitem').querySelector('button[type="submit"]').removeAttribute('disabled');
      }
    })
  }

  for(l=0; l<event[5].length; l++){
    event[5][l].addEventListener('click', function(){

      array = {
        formkey: [
          '_token',
          'item_id',
        ],
        formvalue: [
          document.querySelector('#modal-newitem').querySelector('input[name="_token"]').value,
          this.id,
        ],
        url: "fetch_itemupdate",
        method: "POST",
        credentials: "same-origin",
        mode: "no-cors",
      }
      var formData = new FormData();

      for(l = 0; l < array['formkey'].length; l++) {
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

        document.querySelector('#item_id3').value = data['id'];
        document.querySelector('#item_name3').value = data['name'];
        document.querySelector('#brand_name3').value = data['brand'];
        document.querySelector('#model_name3').value = data['model'];
        document.querySelector('#description3').value = data['description'];
        document.querySelector('#retailprice3').value = data['retailprice'];
        document.querySelector('#localcode3').value = data['localcode'];
        document.querySelector('#barcode3').value = data['barcode'];
        document.querySelector('#item-image3').src = 'storage/image/' + data['image'];

      })
      .catch(error => console.log('FAILURE: asynchronous fetch-API function failed!'))
      .then(
        console.log('SUCCESS: asynchronous fetch-API function successful!')
      );

    });
  }

  if(event[6] !== null){
    event[6].addEventListener('change', function(){
      document.getElementById('item-image3').src = window.URL.createObjectURL(this.files[0]);
    });
  }


  if(event[7] !== null){
    event[7].addEventListener('click', function(){
      document.querySelector('body').removeChild(document.querySelector('#notice-cover'));
      document.getElementsByTagName('main')[0].style.opacity = 1;
      document.getElementsByTagName('header')[0].style.opacity = 1;
    });
  }
}


function notice(){
  var body = document.getElementsByTagName('body')[0],
      main = document.getElementsByTagName('main')[0],
      header = document.getElementsByTagName('header')[0],
      notice = document.createElement('div');

  notice.id = 'notice-cover';
  notice.style = "z-index:1;";
  notice.innerHTML =
  "<div class=\"container\" id=\"notice-body\" style=\"position: absolute; top:0; left: 0; bottom: 0; right: 0; margin: auto auto; height: 500px; width: 500px;\"><h3>Notice:</h3>" +
  "<div style=\"text-align:justify\">This website was created for demonstration and showcasing a project. Please avoid entering/inputting/providing private information for any purpose on this website. The author is not liable for damages incurred by this website. Thank you.</div>" +
  "<button class=\"btn btn-primary\" id=\"notice-button\">Ok</button>"
  "</div>";

  main.style.opacity = 0.2;
  header.style.opacity = 0.2;
  body.insertBefore(notice,null);

}

