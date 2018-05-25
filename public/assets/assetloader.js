//SELF-INVOKED FUNCTION

(function(){
  // PARAMETER INPUTS: =========================================================
    /*----------------------------
    FOR JAVASCRIPT
    {
      "url_primary": null,
      "url_cloud": null,
      "defer": null,
      "async": null
    },
    FOR NON-JAVASCRIPT
    {
      "url_primary": null,
      "url_cloud": null,
      "rel": null,  // author, help, icon, license, stylesheet
      "type": null, // MIME-classification
    },
    ----------------------------*/
  var parameter_a =
  [
    {
      "url_primary": "assets/js/script.js",
      "url_cloud": null,
      "defer": true,
      "async": null
    },
    {
      "url_primary": "assets/js/animation.js",
      "url_cloud": null,
      "defer": true,
      "async": null
    },
    {
      "url_primary": "assets/js/interactive.js",
      "url_cloud": null,
      "defer": true,
      "async": null
    },
    {
      "url_primary": "dev-library-js/partials_copyright.js",
      "url_cloud": "https://raw.githubusercontent.com/mjtalbatana/dev-library-js/master/partials_copyright.js",
      "defer": true,
      "async": null
    },
  ],
    parameter_b =
  [
    {
      "url_primary": "dev-assets/mjta-v01.ico",
      "url_cloud": "https://raw.githubusercontent.com/mjtalbatana/profile-logo/master/mjta-v01.ico",
      "rel": "icon",
      "type": "image/x-icon" // MIME-classification
    },
    {
      "url_primary": "dev-assets/FONTS/NotoSans/NotoSans-Regular.ttf",
      "url_cloud": "https://fonts.googleapis.com/css?family=Noto+Sans",
      "rel": "stylesheet",  // author, help, icon, license, stylesheet
      "type": "application/x-font-truetype", // MIME-classification
    },
    {
      "url_primary": "assets/scss/style.css",
      "url_cloud": null,
      "rel": "stylesheet",  // author, help, icon, license, stylesheet
      "type": "text/css", // MIME-classification
    },
  ]


  // PLEASE DO NOT MODIFY ANYTHING PRECEEDING THIS LINE OF CODE =================

  //DECLARATIONS-------------------------------------------------------------------------
  var temp = '';
      scripts = [],
      links = [],
      address = window.location.origin;

  //LOCAL/WEB CHECK----------------------------------------------------------------------
  if(address.search('127.0.0.1') == -1 || address.search('localhost') == -1){
    address = 'localserver';
  } else{
    address = 'webserver';
  }

  //MARKUP AND ATTRIBUTE BUILDER---------------------------------------------------------
  for(l=0; l<parameter_a.length; l++){
    // window['script'+l] = document.createElement('script');
    temp = document.createElement('script');
    temp.type = 'application/javascript';
    scripts.push(temp);

    if(parameter_a[l]['url_cloud'] != null && address == 'localserver'){
      temp.src = parameter_a[l]['url_primary'];
    } else if(parameter_a[l]['url_cloud'] != null && address == 'webserver'){
      temp.src = parameter_a[l]['url_cloud'];
    } else{
      temp.src = parameter_a[l]['url_primary'];
    }
    if(parameter_a[l]['defer'] != null){
      temp.defer = true;
    }
    if(parameter_a[l]['async'] != null){
      temp.async = true;
    }
  }

  for(l=0; l<scripts.length; l++){
    document.getElementsByTagName('head')[0].insertBefore(scripts[l],null);
  }

  for(l=0; l<parameter_b.length; l++){
    temp = document.createElement('link');
    links.push(temp);

    if(parameter_b[l]['url_cloud'] != null && address == 'localserver'){
      temp.href = parameter_b[l]['url_primary'];
    } else if(parameter_b[l]['url_cloud'] != null && address == 'webserver'){
      temp.href = parameter_b[l]['url_cloud'];
    } else{
      temp.href = parameter_b[l]['url_primary'];
    }

    if(parameter_b[l]['rel'] != null){
      temp.rel = parameter_b[l]['rel'];
    }
    if(parameter_b[l]['type'] != null){
      temp.type = parameter_b[l]['type'];
    }
  }

  for(l=0; l<links.length; l++){
    document.getElementsByTagName('head')[0].insertBefore(links[l],null);
  }


})();

