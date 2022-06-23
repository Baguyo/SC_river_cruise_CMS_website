
    
    


    //REMOVE RED LINE
    function changePlaceholder(element){
        var type = element.type;
        switch (type) {
            case "text":
                checkError(element,"Full name");
                break;
            case "email":
                checkError(element,"example@gmail.com");
                break;
            case "number":
                if(element.className.includes("contact_number")){
                    checkError(element,"Contact number");    
                }else{
                    checkError(element,"Number of guest");
                }
                break;
            case "date":
                checkError(element);
                break;
            default:
                break;
        }
    }
    function checkError(element,value){
        if(element.className.includes("has-error")){
            element.setAttribute("placeholder",value);
            element.classList.remove("has-error");
        }else{
            console.log("error.");
        }
    }

    
    function isValidEmail(element){
        var re = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if(re.test(element.val())){
            return true;
        }else {
            element.attr("placeholder", "invalid input");
            element.addClass("has-error");
            return false;
        }
    }

    function isValid(element){
        if($.trim(element.val()) == ""){
            element.attr("placeholder", "invalid input");
            element.addClass("has-error");
            return false;
        }else{
            return true;
        }
    }
    // function nameChecker(element){
        
    //     if(element.val() < 4)
    //         {
    //             element.css('border', "3px solid blue");
                
                
    //             return false;
    //     }else{
    //             return true;
    //         }
    // }
    


