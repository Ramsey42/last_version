// const defaults = require("nodemon/lib/config/defaults");

function getCall(val) {
    const control = document.getElementById(val);
    const controls = document.getElementsByClassName("controls");
    
    if (controls) {
        Array.prototype.forEach.call(controls, (el) => {
            if (el) {
                el.style.display = "none";
            }
        });
        if (control) {
            control.style.display = "block";
        }
    }



    // require proporties
    var val = document.getElementById('productType').value;
    
    if(val=='DVD' || val == ''  ){
         
        document.getElementById("size").required = true;

    } else {
        document.getElementById("size").required = false;

    }


    if(val=='Book' ){
         
        document.getElementById("weight").required = true;
    } else {
        document.getElementById("weight").required = false;

    }



    if(val=='Furniture'){
         
        document.getElementById("height").required = true;
        document.getElementById("width").required = true;
        document.getElementById("length").required = true;
    } else {
        document.getElementById("height").required = false;
        document.getElementById("width").required = false;
        document.getElementById("length").required = false;

    }


// avoid "e" in input_price
var inputBox_price = document.getElementById("price");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_price.addEventListener("keydown", function price(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});


//    avoid "e" in input_size 
var inputBox_size = document.getElementById("size");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_size.addEventListener("keydown", function size(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});


// avoid "e" in input_weight
var inputBox_weight = document.getElementById("weight");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_weight.addEventListener("keydown", function weight(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});


// avoid "e" in input_height
var inputBox_height = document.getElementById("height");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_height.addEventListener("keydown", function height(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});


// avoid "e" in input_width
var inputBox_width = document.getElementById("width");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_width.addEventListener("keydown", function width(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});

// avoid "e" in input_length
var inputBox_length = document.getElementById("length");

var invalidChars = [
"-",
"+",
"e",
"E",
];

inputBox_length.addEventListener("keydown", function length(e) {
if (invalidChars.includes(e.key)) {
e.preventDefault();
}
});
   


}

