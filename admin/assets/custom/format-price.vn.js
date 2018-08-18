    var input = document.getElementById('priceVn');
    input.addEventListener('keyup', function(e)
    {
        input.value = format_number(this.value, '(VNĐ) ');
    });
    
    input.addEventListener('keydown', function(event)
    {
        limit_character(event);
    });



    var input2 = document.getElementById('priceWareHouseVn');
    input2.addEventListener('keyup', function(e)
    {
        input2.value = format_number(this.value, '(VNĐ) ');
    });
    
    input2.addEventListener('keydown', function(event)
    {
        limit_character(event);
    });






    var input3 = document.getElementById('priceSaleVn');
    input3.addEventListener('keyup', function(e)
    {
        input3.value = format_number(this.value, '(VNĐ) ');
    });
    
    input3.addEventListener('keydown', function(event)
    {
        limit_character(event);
    });

    
    
    
    /* Function */
    function format_number(number, prefix, thousand_separator, decimal_separator)
    {
        var thousand_separator = thousand_separator || ' ',
            decimal_separator = decimal_separator || ',',
            regex       = new RegExp('[^' + decimal_separator + '\\d]', 'g'),
            number_string = number.replace(regex, '').toString(),
            split     = number_string.split(decimal_separator),
            rest      = split[0].length % 3,
            result    = split[0].substr(0, rest),
            thousands = split[0].substr(rest).match(/\d{3}/g);
        
        if (thousands) {
            separator = rest ? thousand_separator : '';
            result += separator + thousands.join(thousand_separator);
        }
        result = split[1] != undefined ? result + decimal_separator + split[1] : result;
        return prefix == undefined ? result : (result ? prefix + result : '');
    };
    
    function limit_character(event)
    {
        key = event.which || event.keyCode;
        if ( key != 188 // Comma
             && key != 8 // Backspace
             && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
             && (key < 48 || key > 57) // Non digit
             // And many more, such as: del, left arrow dan right arrow, tab, etc...
            ) 
        {
            event.preventDefault();
            return false;
        }
    }







    /* With Prefix */
    // var input2 = document.getElementById('priceEn');
    // input2.addEventListener('keyup', function(e)
    // {
    //     input2.value = format_number(this.value, '$ ');
    // });
    
    // input2.addEventListener('keydown', function(event)
    // {
    //     limit_character(event);
    // });

    // format theo đơn vị tiền tệ
    // <div>Without Prefix</div>
    // <input type="text" id="with-prefix"/>
    // <div>With Prefix $</div>
    // <input type="text" id="without-prefix"/>