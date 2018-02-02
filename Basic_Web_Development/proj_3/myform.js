   // Name:Rajaram Vijayamohan 
   // RED Id:822078615

   function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 
        
    function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
        }  
        
    // copied from stackoverflow.com, not checked or validated for correctness.        
    function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }  

    function genderSelected() {
         var selValue = $('input[name=gender]:checked').val();
         if (selValue){
            return true;
         } else {
            return false;
         }
        }

    function experienceSelected() {
         var selValue = $('input[name=Experience]:checked').val();
         if (selValue){
            return true;
         } else {
            return false;
         }
        }

    function catSelected() {
         var selValue = $('input[name=Category]:checked').val();
         if (selValue){
            return true;
         } else {
            return false;
         }
        }

    function isDateValid(){
        var day = document.getElementById("d").value; 
        var month = document.getElementById("m").value;
        var year = document.getElementById("y").value;
    
    // now turn the three values into a Date object and check them
        var checkDate = new Date(year, month-1, day);    
        var checkDay = checkDate.getDate();
        var checkMonth = checkDate.getMonth()+1;
        var checkYear = checkDate.getFullYear();
    
        if(day == checkDay && month == checkMonth && year == checkYear){
            return false;
        } else {
             return true;
        }
    }

    function isFileUpload(){
        var imgVal = $('#user_pic').val(); 
        if(imgVal=='') { 
           return false; 
        } 
        return true;
    }

    function fileSize(){
        var size = document.getElementById('user_pic').files[0].size;
        if(size/1000 > 1000) {
            return false;
        } else {
            return true;
        }
    }
                  
                   
$(document).ready( function() {

    // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $('.alert').hide();

    var errorStatusHandle = $('#message_line');
    var elementHandle = new Array(15);
    elementHandle[0] = $('[name="fname"]');    
    elementHandle[1] = $('[name="lname"]');
    elementHandle[2] = $('[name="address"]');
    elementHandle[3] = $('[name="city"]');
    elementHandle[4] = $('[name="state"]');
    elementHandle[5] = $('[name="zip"]');
    elementHandle[6] = $('[name="area_phone"]');
    elementHandle[7] = $('[name="prefix_phone"]');
    elementHandle[8] = $('[name="phone"]');
    elementHandle[9] = $('[name="email"]');
    elementHandle[10] = $('[name="gender"]');
    elementHandle[11] = $('[name="user_pic"]');
    elementHandle[12] = $('[name="Experience"]');
    elementHandle[13] = $('[name="Category"]');
    elementHandle[14] = $('[name="month"]');
         
    function isValidData() {

        if(!isFileUpload()){
            elementHandle[11].addClass("error");
            errorStatusHandle.text("please select the File");
            elementHandle[11].focus();
            return false;
        }


        if(!fileSize()){
            elementHandle[11].addClass("error");
            errorStatusHandle.text("File size exceeding 1MB");
            elementHandle[11].focus();
            return false;
        }

        if(isEmpty(elementHandle[0].val())) {
            elementHandle[0].addClass("error");
            errorStatusHandle.text("Please enter your first name");
            elementHandle[0].focus();
            return false;
            }
        if(isEmpty(elementHandle[1].val())) {
            elementHandle[1].addClass("error");
            errorStatusHandle.text("Please enter your last name");
            elementHandle[1].focus();            
            return false;
            }
        if(!genderSelected()){
            elementHandle[10].addClass("error");
            errorStatusHandle.text("please select the gender");
            return false;
        }
        if(isDateValid()){
            elementHandle[14].addClass("error");
            errorStatusHandle.text("invalid date");
            elementHandle[14].focus();
            return false;
        }
        if(isEmpty(elementHandle[2].val())) {
            elementHandle[2].addClass("error");
            errorStatusHandle.text("Please enter your address");
            elementHandle[2].focus();            
            return false;
            }
        if(isEmpty(elementHandle[3].val())) {
            elementHandle[3].addClass("error");
            errorStatusHandle.text("Please enter your city");
            elementHandle[3].focus();            
            return false;
            }
        if(isEmpty(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("Please enter your state");
            elementHandle[4].focus();            
            return false;
            }
        if(!isValidState(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("The state appears to be invalid, "+
            "please use the two letter state abbreviation");
            elementHandle[4].focus();            
            return false;
            }
        if(isEmpty(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("Please enter your zip code");
            elementHandle[5].focus();            
            return false;
            }
        if(!$.isNumeric(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[5].focus();            
            return false;
            }
        if(elementHandle[5].val().length != 5) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code must have exactly five digits")
            elementHandle[5].focus();            
            return false;
            }
        if(isEmpty(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("Please enter your area code");
            elementHandle[6].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[6].focus();            
            return false;
            }
        if(elementHandle[6].val().length != 3) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[6].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[7].focus();            
            return false;
            }           
        if(!$.isNumeric(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            elementHandle[7].focus();            
            return false;
            }
        if(elementHandle[7].val().length != 3) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[7].focus();            
            return false;
            }
        if(isEmpty(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("Please enter your phone number");
            elementHandle[8].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number appears to be invalid, "+
            "numbers only please. ");
            elementHandle[8].focus();            
            return false;
            }
        if(elementHandle[8].val().length != 4) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits")
            elementHandle[8].focus();            
            return false;
            }  
        if(isEmpty(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("Please enter your email address");
            elementHandle[9].focus();            
            return false;
            }            
        if(!isValidEmail(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The email address appears to be invalid,");
            elementHandle[9].focus();            
            return false;
            }                
        if(!experienceSelected()){
            elementHandle[12].addClass("error");
            errorStatusHandle.text("please select the Experience");
            return false;
        }  
        if(!catSelected()){
            elementHandle[13].addClass("error");
            errorStatusHandle.text("please select the Category");
            return false;
        }


        return true;
        }       

   elementHandle[0].focus();
   
    elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        $(".alert").hide();
        });

    elementHandle[1].on('blur', function() {
        if(isEmpty(elementHandle[1].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        $(".alert").hide();
        });

    elementHandle[2].on('blur', function() {
        if(isEmpty(elementHandle[2].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        $(".alert").hide();
        });

    elementHandle[3].on('blur', function() {
        if(isEmpty(elementHandle[3].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        $(".alert").hide();
        });
     
    elementHandle[4].on('blur', function() {
        if(isEmpty(elementHandle[4].val()))
            return;
        if(isValidState(elementHandle[4].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
            }
        });   

    elementHandle[5].on('blur', function() {
        if(isEmpty(elementHandle[5].val()))
            return;
        if(!$.isNumeric(elementHandle[5].val())) {
            return;
            }
        if(elementHandle[5].val().length == 5){
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
        }

        }); 

    elementHandle[6].on('blur', function() {
        if(isEmpty(elementHandle[6].val()))
            return;
        if(!$.isNumeric(elementHandle[6].val())) {
            return;
            }
        if(elementHandle[6].val().length == 3){
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
        }

        }); 

    elementHandle[7].on('blur', function() {
        if(isEmpty(elementHandle[7].val()))
            return;
        if(!$.isNumeric(elementHandle[7].val())) {
            return;
            }
        if(elementHandle[7].val().length == 3){
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
        }

        });

    elementHandle[8].on('blur', function() {
        if(isEmpty(elementHandle[7].val()))
            return;
        if(!$.isNumeric(elementHandle[7].val())) {
            return;
            }
        if(elementHandle[7].val().length == 5){
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
        }

        });

    elementHandle[9].on('blur', function() {
        if(isEmpty(elementHandle[9].val()))
            return;
        if(isValidEmail(elementHandle[9].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
            }
        });          

    elementHandle[4].on('keyup', function() {
        elementHandle[4].val(elementHandle[4].val().toUpperCase());
        });
        
    elementHandle[6].on('keyup', function() {
        if(elementHandle[6].val().length == 3)
            elementHandle[7].focus();
            });
            
    elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length == 3)
            elementHandle[8].focus();
            });            

   
    $(':submit').on('click', function() {
        for(var i=0; i < 10; i++)
            elementHandle[i].removeClass("error");
            errorStatusHandle.text("");
            $(".alert").show();
            return isValidData();
        });
        
    $(':reset').on('click', function() {
        for(var i=0; i < 10; i++)
            elementHandle[i].removeClass("error");
            errorStatusHandle.text("");
            $(".alert").hide();
        });                                       
 });