assetLoader('scripts');
assetLoader('links');

function assetLoader(target){
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
  var parameter_a =     //HEADER SCRIPTS
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
      "defer": null,
      "async": null
    },

  ],
    parameter_b = //  HEADER LINKS
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
    {
      "url_primary": "dev-modules/bootstrap/bootstrap-4.1.1/dist/css/bootstrap.min.css",
      "url_cloud": "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css",
      "integrity": "sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB",
      "rel": "stylesheet",  // author, help, icon, license, stylesheet
      "type": "text/css", // MIME-classification
    },
  ];
    parameter_c = //  BODY SCRIPT
  [
    {
      "url_primary": "dev-modules/jquery/jquery-3.3.1/dist/jquery.slim.min.js",
      "url_cloud": "https://code.jquery.com/jquery-3.3.1.slim.min.js",
      "integrity": "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo",
    },
    {
      "url_primary": "dev-modules/popper.js/popper.js-1.14.3/dist/umd/popper.min.js",
      "url_cloud": "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js",
      "integrity": "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49",
    },
    {
      "url_primary": "dev-modules/bootstrap/bootstrap-4.1.1/dist/js/bootstrap.min.js",
      "url_cloud": "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js",
      "integrity": "sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T",
    },
  ];


  // PLEASE DO NOT MODIFY ANYTHING PRECEEDING THIS LINE OF CODE =================

  //DECLARATIONS-------------------------------------------------------------------------
  var temp = '';
      scripts_a = [],
      scripts_b = [],
      links = [],
      address = window.location.origin;

  //LOCAL/WEB CHECK----------------------------------------------------------------------
  if(address.search('127.0.0.1') == -1 || address.search('localhost') == -1){
    address = 'localserver';
  } else{
    address = 'webserver';
  }

  //MARKUP AND ATTRIBUTE BUILDER---------------------------------------------------------

  switch(target){
    case 'scripts':
      for(l=0; l<parameter_a.length; l++){
        // window['script'+l] = document.createElement('script');
        temp = document.createElement('script');
        // temp.type = 'application/javascript';
        scripts_a.push(temp);

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
        if(parameter_a[l]['integrity'] != null){
          temp.integrity = parameter_a[l]['integrity'];
        }
      }

      for(l=0; l<scripts_a.length; l++){
        document.getElementsByTagName('head')[0].insertBefore(scripts_a[l],null);
      }

      break;

    case 'links':
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
        if(parameter_b[l]['integrity'] != null){
          temp.integrity = parameter_b[l]['integrity'];
        }
      }

      for(l=0; l<links.length; l++){
        document.getElementsByTagName('head')[0].insertBefore(links[l],null);
      }

      break;

    case 'endscripts':
      for(l=0; l<parameter_c.length; l++){
        temp = document.createElement('script');
        scripts_b.push(temp);

        if(parameter_c[l]['url_cloud'] != null && address == 'localserver'){
          temp.src = parameter_c[l]['url_primary'];
        } else if(parameter_c[l]['url_cloud'] != null && address == 'webserver'){
          temp.src = parameter_c[l]['url_cloud'];
        } else{
          temp.src = parameter_c[l]['url_primary'];
        }
        if(parameter_c[l]['integrity'] != null){
          temp.integrity = parameter_c[l]['integrity'];
        }
      }

      for(l=0; l<scripts_b.length; l++){
        document.getElementsByTagName('body')[0].insertBefore(scripts_b[l],null);
      }

      break;

    default:
      break;
  }


}

