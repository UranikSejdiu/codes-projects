if (typeof jQuery === 'undefined') {
    throw new Error('PassRequirements requires jQuery')
  }
  
  +(function ($) {
  
      $.fn.PassRequirements = function (options) {
  
          /*
           * TODO
           * ====
           * 
           * store regexes in variables so they can be used by users through string 
           * specifications,ex 'number', 'special', etc
           * 
           */
  
          var defaults = {
  //            defaults: true
          };
          
          if(
              !options ||                     //if no options are passed                                  /*
              options.defaults == true ||     //if default option is passed with defaults set to true      * Extend options with default ones
              options.defaults == undefined   //if options are passed but defaults is not passed           */
          ){
              if(!options){                   //if no options are passed, 
                  options = {};               //create an options object
              }
              defaults.rules = $.extend({
                  minlength: {
                      text: "Së paku minLength shkronja",
                      minLength: 8,
                  },
                  containLowercase: {
                      text: "Së paku minLength shkronjë të vogël",
                      minLength: 1,
                      regex: new RegExp('[^a-z]', 'g')
                  },
                  containUppercase: {
                      text: "Së paku minLength shkronjë të madhe",
                      minLength: 1,
                      regex: new RegExp('[^A-Z]', 'g')
                  },
                  containNumbers: {
                      text: "Së paku minLength numër",
                      minLength: 1,
                      regex: new RegExp('[^0-9]', 'g')
                  }
              }, options.rules);
          }else{
              defaults = options;     //if options are passed with defaults === false
          }
  
          
          var i = 0;
          return this.each(function () {
              
              if(!defaults.defaults && !defaults.rules){
                  console.error('You must pass in your rules if defaults is set to false. Skipping this input with id:[' + this.id + '] with class:[' + this.classList + ']');
                  return false;
              }
              
              var requirementList = "";
              $(this).data('pass-req-id', i++);
              $(this).keyup(function () {
                  var that= $(this);
                  Object.getOwnPropertyNames(defaults.rules).forEach(function (val, idx, array) {
                      if (that.val().replace(defaults.rules[val].regex, "").length > defaults.rules[val].minLength - 1) {
                          
                          $('#' + val).css('text-decoration','line-through');
                      } else {
                          $('#' + val).css('text-decoration','none');
                      }
  
                  })
              });
  
              Object.getOwnPropertyNames(defaults.rules).forEach(function (val, idx, array) {
                  requirementList += (("<li id='" + val + "'>" + defaults.rules[val].text).replace("minLength", defaults.rules[val].minLength));
              })
              try{
              $(this).popover({
                  title: 'Fjalekalimi duhet të ketë: ',
                  trigger: options.trigger ? options.trigger : 'focus',
                  html: true,
                  placement: options.popoverPlacement ? options.popoverPlacement : 'bottom',
                  content: '<ul class="list-unstyled">' + requirementList + '</ul>'
                      //                        '<p>The confirm field is actived only if all criteria are met</p>'
              });
              }catch(e){
                  throw new Error('PassRequirements requires Bootstraps Popover plugin');
              }
              $(this).focus(function () {
                  $(this).keyup();
              });
          });
      };
  
  }(jQuery));